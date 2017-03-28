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
class UserPostController extends Controller
{






    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','about','archives']]);
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::latest();

        // if ($month = request('month')) {


        //      $posts->whereMonth('created_at', Carbon::parse($month)->month);
             
        // }

        // if ($year = request('year')) {

            
        //      $posts->whereYear('created_at',$year);
          
        // }


        $posts= $posts->paginate(3);
 
        // $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
        // ->groupBy('year','month')
        // ->orderByRaw('min(created_at)desc')
        // ->get()
        // ->toArray();

        
     // $posts = Post::orderBy('created_at','desc')
       
      
     
        return view('postie.index',compact('posts','archives'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $user = Auth::user();

        $inputs = [
        'title'=>$request->title,
        'body'=>$request->body
        ];


        $user->posts()->create($inputs);
        return redirect('/');







    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Route-Model Binding
    //Bitno je da wildcard u ruti ima isti naziv
    //kao i promenjiva u parametrima funkcije
    public function show($id)
    {

        $postie = Post::find($id);
        $userId = Auth::user()->id;
        


        if (!$postie) 
        {
            return redirect()->back();    
        }
        else
        {
            $isOwner = Post::checkOwner($postie->id);
            return view('postie.show',compact('postie','isOwner'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
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
     * @param  \Illuminate\Http\Request  $request
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
        return redirect(route('postie.show',$id));
         

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostEditRequest $request, $id)
    {
       Post::find($id)->delete();
       return redirect('/');
    }


    public function about()
    {
        return view('postie.about');
    }


    
    public function archives()
    {
        $posts = Post::latest();

        if ($month = request('month')) {


             $posts->whereMonth('created_at', Carbon::parse($month)->month);
             
        }

        if ($year = request('year')) {

            
             $posts->whereYear('created_at',$year);
          
        }


        $posts= $posts->paginate(3);



        return view('postie.archives',compact('posts'));


    }






















}
