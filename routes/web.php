<?php
use App\Post;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

// Route::get('/home', 'HomeController@index');



Route::get('/postie/about',['as'=>'postie.about','uses'=>'UserPostController@about']);

Route::get('/',['as'=>'postie.index','uses'=>'UserPostController@index']);

Route::get('/postie/archive',['as'=>'postie.archive','uses'=>'UserPostController@archives']);

//Sve sto stavim ispod terace na login
Route::resource('/postie','UserPostController');





Route::get('/test',function ()
{
	

});

