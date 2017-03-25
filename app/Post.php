<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{



	protected $fillable = [

	'title',
	'body'



	];



	

public static function checkOwner($postId)
{
	$post = self::find($postId);

// dd($post);


	if ($post->user_id == Auth::user()->id) {
		return true;
	}
	return false;
}







   public function user()
   {
   
   
   	return $this->belongsTo('App\User');
   
   
   }
}
