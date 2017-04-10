<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


  public function index($id)
  {
  	
  


  	$data['user'] = User::find($id);
    $data['comments'] = $data['user']->comments;
    // dd($data['comments']);
  	$data['users_last_post'] = $data['user']
  	->posts()
  	->orderBy('created_at','desc')
  	->first();

  	$data['users_posts'] = $data['user']->posts->all();
  	
  	

  
  	return view('postie.user.index',compact('data'));








  }




























}
