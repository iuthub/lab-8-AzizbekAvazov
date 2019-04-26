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

/*Route::get('/', function () {
    return view('blog.index');
});

Route::get('/blog/post/{id}', function ($id) {
    return view('blog.post', ['id'=>$id]);
});*/

Route::get('/', [
    'uses' => 'BlogController@getIndex',
    'as' => 'blog.index'
]);
Route::get('post/{id}', [
    'uses' => 'BlogController@getPost',
    'as' => 'blog.post'
]);
Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::group(['prefix' => 'admin'], function() {
    Route::get('', [
        'uses' => 'BlogController@getAdminIndex',
        'as' => 'admin.index'
    ]);
    Route::get('create', [
        'uses' => 'BlogController@getAdminCreate',
        'as' => 'admin.create'
    ]);
    Route::post('create', [
        'uses' => 'BlogController@postAdminCreate',
        'as' => 'admin.create'
    ]);
    Route::get('edit/{id}', [
        'uses' => 'BlogController@getAdminEdit',
        'as' => 'admin.edit'
    ]);
    Route::post('edit', [
        'uses' => 'BlogController@postAdminUpdate',
        'as' => 'admin.update'
    ]);
});

