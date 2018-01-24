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
Route::get('/runtest','TestController@ind');
Route::post('/runtest','TestController@store');
Route::get('/','HomeController@index');
Route::get('/threads','ThreadController@index');
Route::post('/threads','ThreadController@store');
Route::post('/threads/{thread}','ThreadController@destroy');
Route::get('/threads/create','ThreadController@create');
Route::get('/threads/{channel}','ThreadController@index');
Route::get('/threads/{channel}/{thread}','ThreadController@show');
Auth::routes();
Route::post('/threads/{channel}/{thread}/replies', 'ReplyController@store');
Route::post('/replies/{reply}/favourite', 'FavouriteController@store');
//Route::resource('threads','ThreadController');
Route::get('test', function () {
    return view('test');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user}', 'ProfileController@show')->name('home');
