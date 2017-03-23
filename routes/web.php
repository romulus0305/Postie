<?php
use App\Post;
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

Route::get('/home', 'HomeController@index');

Route::get('/',['as'=>'postie.index','uses'=>'UserPostController@index']);

Route::resource('/postie','UserPostController');

//Funkcija  za randumpost koji ce da izlazi na sidebaru
Route::get('id',function ()
{
    $ids =  Post::randumPost();

   echo $ids->title;
});



// Route::get('/master',['as'=>'master.rand','uses'=>'UserPostController@randPost']);
