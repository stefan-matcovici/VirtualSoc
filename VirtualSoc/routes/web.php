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

Auth::routes();

Route::group(['prefix' => 'home/messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});


Route::group(['prefix' => 'home/requests'], function () {
    Route::get('/', ['as' => 'requests', 'uses' => 'RequestsController@indexRequests']);
    Route::post('/', ['as' => 'requests.store', 'uses' => 'RequestsController@store']);
    Route::post('/delete', ['as' => 'requests.destroy', 'uses' => 'RequestsController@destroy']);
    Route::post('/send', ['as' => 'requests.accept', 'uses' => 'RequestsController@accept']);
    Route::get('/incoming', ['as' => 'requests.incoming', 'uses' => 'RequestsController@indexRequesting']);
});

Route::group(['prefix' => 'home/posts'], function () {
    Route::get('/', ['as' => 'posts', 'uses' => 'PostsController@index']);
    Route::post('/', ['as' => 'posts.store', 'uses' => 'PostsController@create']);
    Route::get('/{id}/like', ['as' => 'posts.like', 'uses' => 'PostsController@like']);
    Route::get('/{id}/dislike', ['as' => 'posts.dislike', 'uses' => 'PostsController@dislike']);
    Route::get('/{id}/unlike', ['as' => 'posts.unlike', 'uses' => 'PostsController@unlike']);
    Route::get('/{id}/undislike', ['as' => 'posts.undislike', 'uses' => 'PostsController@undislike']);
    Route::get('/{id}/share','PostsController@share')->name('share');
});

Route::group(['prefix' => 'home/users'], function () {
    Route::get('/{id}/posts', ['as' => 'user.posts', 'uses' => 'UsersController@posts']);
    Route::get('/{id}/posts/destroy', ['as' => 'user.posts.delete', 'uses' => 'UsersController@postsDestroy']);
    Route::get('/{id}/profile', ['as' => 'user.profile', 'uses' => 'UsersController@profile']);
    Route::get('/friends', ['as' => 'user.friends', 'uses' => 'UsersController@friends']);
    Route::get('/friends/delete/{id}', ['as' => 'user.friends.delete', 'uses' => 'UsersController@friendsDestroy']);
});

Route::get('/home/profile','ProfilesController@index')->name('profile');

Route::post('/home/profile/update','ProfilesController@update')->name('profile.update');

//misc

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/search','UsersController@search');

Route::get('/home', 'HomeController@index');