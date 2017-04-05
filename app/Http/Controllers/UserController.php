<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


  public function index($id)
  {
  	
  


  	$data['user'] = User::find($id);

  	$data['users_last_post'] = $data['user']
  	->posts()
  	->orderBy('created_at','desc')
  	->first();

  	$data['users_posts'] = $data['user']->posts->all();
  	
  	

  
  	return view('postie.user.index',compact('data'));








  }




























}
