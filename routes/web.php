<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Verb    Path                        Action  Route Name
//GET     /users                      index   users.index
//GET     /users/create               create  users.create
//POST    /users                      store   users.store
//GET     /users/{user}               show    users.show
//GET     /users/{user}/edit          edit    users.edit
//PUT     /users/{user}               update  users.update
//DELETE  /users/{user}               destroy users.destroy
Route::get('/','HomeController@index');
Route::get('/threads','ThreadController@index');
Route::post('/threads','ThreadController@store');
Route::get('/threads/create','ThreadController@create');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Route::post('/threads/{channel}/{thread}/replies','ReplyController@store');

//Route::resource('threads','ThreadController');
Route::get('test', function () {
    return view('test');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
