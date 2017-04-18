<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Auth::routes();

Route::get('/postie/about',['as'=>'postie.about','uses'=>'UserController@about']);
Route::get('/',['as'=>'postie.index','uses'=>'UserPostController@index']);
Route::get('/postie/archive',['as'=>'postie.archive','uses'=>'UserPostController@archives']);
Route::resource('/postie','UserPostController');
Route::resource('/postie/comments','PostCommentController');
Route::get('/user/{id}',['as'=>'user.index','uses'=>'UserController@index']);
Route::patch('/user/{id}/edit',['as'=>'user.edit','uses'=>'UserController@editInfo']);
Route::delete('/user/delete_account/{id}',['as'=>'user.destroy','uses'=>'UserController@deleteAccount']);




