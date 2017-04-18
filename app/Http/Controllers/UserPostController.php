<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests\OwnerEditRequest;
use Carbon\Carbon;
use App\Comment;
class UserPostController extends Controller
{




    /*
     *
     *  Middleware Auth
     *
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','archives','show']]);
    }



    /**
     * @param obj $posts
     * @param str $month
     * @param arr $monthNum
     * @param str $year
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest();

        if ($month = request('month')) {
            $monthNum = date_parse($month);
            $posts->whereMonth('created_at','=',$monthNum['month']);
        }

        if ($year = request('year')) {
             $posts->whereYear('created_at','=',$year);
        }

        $posts= $posts->paginate(3);

        return view('postie.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postie.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  App\Http\Requests\CreatePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $user = $request->user();

        $inputs = [
        'title'=>$request->title,
        'body'=>$request->body
        ];

        $user->posts()->create($inputs);
        session()->flash('created_post','Post '.$inputs['title'] . ' created!' );
        return redirect('/');

    }

    /**
     * Display the specified post
     * if user has ownership
     * @param  int  $id
     * @param  arr  $data
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        if (!$data['post'] = Post::find($id))
        {
            return redirect()->back();
        }
        else
        {

            $data['comments'] = $data['post']->comments()->latest()->get();
            $data['edit_button'] = Post::checkOwner($data['post']->id);
            
            return view('postie.show',compact('data'));

        }


    }



    /**
     * Show the form for editing the specified resource.
     * @param  \Illuminate\Http\Request\PostEditRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PostEditRequest $request, $id)
    {


        if (!$post = Post::find($id))
        {
            return redirect()->back();
        }
        else
        {
            return view('postie.edit',compact('post'));
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\OwnerEditRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerEditRequest $request, $id)
    {
       // dd($id);
       $inputs = [
        'title'=>$request->title,
        'body'=>$request->body
        ];
        $post = Auth::user()->posts()->whereId($id)->first();
        $post->update($inputs);
        session()->flash('post_update','Post Updated!');
        return redirect(route('postie.show',$id));


    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request\PostEditRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostEditRequest $request, $id)
    {
       Post::find($id)->delete();
       return redirect('/');
    }


    






















}
