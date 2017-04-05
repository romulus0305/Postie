<?php
use App\Post;
use Illuminate\Http\Request;
use App\Mail\PostieMail;
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

Route::get('/postie/about',['as'=>'postie.about','uses'=>'UserPostController@about']);
Route::get('/',['as'=>'postie.index','uses'=>'UserPostController@index']);
Route::get('/postie/archive',['as'=>'postie.archive','uses'=>'UserPostController@archives']);
Route::resource('/postie','UserPostController');

Route::resource('/postie/comments','PostCommentController');


Route::get('/user/{id}',['as'=>'user.index','uses'=>'UserController@index']);




//Slanje maila
Route::get('/mail', function () {
    // send an email to "batman@batcave.io"
    Mail::to('fazlic.mr.goran@gmail.com')->send(new PostieMail);

    return view('welcome');
});







Route::get('/test',function ()
{
	
// $archive = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')->groupBy('year','month')->get()->toArray();

//    foreach ($archive as $my) {
//    echo $my['month'] . " " .  $my['year'] . " #" . $my['published'] . "<br>";
//    }
});

