<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreatePostRequest;
class UserPostController extends Controller
{






    public function __construct()
    {
        $this->middleware('auth',['except'=>'index']);
    }






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Randum post iz modela ali je proble kada se ode na drtugu strano
        //zato sto je inkludovan sidebar u layouts.master
        $postie = Post::randumPost();
        $posts = Post::all();
      
     
        return view('postie.index',compact('posts','postie'));
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
    public function show(Post $postie)
    {


 
        //  $post = Post::find($id);
       

        if (!$postie) 
        {
            return redirect()->back();    
        }
        else
        {
            return view('postie.show',compact('postie'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('postie.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    // public function randPost()
    // {
    //      $postie = Post::randumPost();
    //      return view('layouts.master',compact('postie'));
    // }




}
