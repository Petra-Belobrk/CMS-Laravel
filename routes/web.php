<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
//Route::get('/admin', function () {
//    return view('admin.index');
//});

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::get('/category/{id}', ['as'=>'category.post','uses'=>'AdminCategoriesController@show']);

Route::post('/post/search', 'HomeController@searchResults');


Route::group(['middleware' => 'admin'], function() {
    Route::get('/admin', 'AdminController@index');

    Route::resource('/admin/users', 'AdminUsersController');
    Route::resource('/admin/posts', 'AdminPostsController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::get('/admin/media/upload',[
        'as'=>'media.upload',
        'uses'=>'AdminMediasController@upload'
    ]);

    Route::delete('admin/delete/media',[
        'as'=>'delete.media',
        'uses'=>'AdminMediasController@deleteMedia'
    ]);
    Route::resource('/admin/media', 'AdminMediasController');


    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/comment/replies', 'CommentRepliesController');
   });

Route::group(['middleware' => 'auth'], function() {



Route::post('comment/reply', 'CommentRepliesController@createReply');

});

