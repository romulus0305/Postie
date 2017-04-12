<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Auth::routes();
// Route::get('/home',['as'=>'postie.index']);
Route::get('/postie/about',['as'=>'postie.about','uses'=>'UserPostController@about']);
Route::get('/',['as'=>'postie.index','uses'=>'UserPostController@index']);
Route::get('/postie/archive',['as'=>'postie.archive','uses'=>'UserPostController@archives']);
Route::resource('/postie','UserPostController');
Route::resource('/postie/comments','PostCommentController');
Route::get('/user/{id}',['as'=>'user.index','uses'=>'UserController@index']);




