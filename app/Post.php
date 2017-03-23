<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



	protected $fillable = [

	'title',
	'body'



	];



	//Uzima randum post iz baze 
	public static function randumPost()
	{	//Ukupno postova
		$max = count(self::select('id')->get());
		//nasumicni broj
		$id = rand(1,$max);
		 
		foreach (self::whereId($id)->get() as $randPost) {
		 	return $randPost;
		 }

	}








   public function user()
   {
   
   
   	return $this->belongsTo('App\User');
   
   
   }
}
