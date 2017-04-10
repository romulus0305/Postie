<?php
use App\Post;
Use App\User;
Use App\Comment;
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







Route::get('/hasManyTrough',function ()
{


/* 


Sta se ovde desava?
Ovako...
$user - kog izaberem
vraca sa posta izabranog $user-a
id - komentara 
id_post-a usera
body - komentare
user_name - imena korisnika koji su komentarisali
--------------------------------------------------------------------------------------------------------
Neodgovara mi zato sto ja hocu da dobijem id iz user modela a ova kombinacija 
mi vraca sve komentare korisnika kosi u komentarisali odredjeni post tj post korisnika User::find('94');

*/




	
$user = User::find('94');
// dd($user->name);

foreach ($user->comment as $user) {
echo $user->id . "<br>";	
echo $user->post_id . "<br>";
echo $user->body. "<br>";
echo $user->user_name. "<br>";
echo "<hr>";

	
}


});

