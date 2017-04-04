<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{


  public function index(Request $request, $id)
  {
  	
  


  	$user = User::find($id);
  	return view('postie.user.index',compact('user'));








  }




























}
