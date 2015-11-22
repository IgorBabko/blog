<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

// Blog pages
// get('/', function () {
//     return redirect('/posts');
// });

// get('/bio', 'PagesController@showBio');
// get('/posts', 'PagesController@showIndex');
// get('/ask', 'PagesController@showDiscussion');
// get('/email', 'PagesController@showEmail');

get('/', 'BlogController@index');
get('/admin', "AdminController@index");

// post('search/{model}', ['as' => 'search', 'uses' => 'SomeController@search']);

// Logging in and out
get('/auth/login', 'Auth\AuthController@getLogin');
post('/auth/login', 'Auth\AuthController@postLogin');
get('/auth/logout', 'Auth\AuthController@getLogout');

// Add the following routes
// get('admin/upload', 'AdminController@index');
// post('admin/upload/file', 'AdminController@uploadFile');
// delete('admin/upload/file', 'AdminController@deleteFile');
// post('admin/upload/folder', 'AdminController@createFolder');
// delete('admin/upload/folder', 'AdminController@deleteFolder');

Route::group(['middleware' => 'ajax'], function () {

    get('/posts', ['as' => 'showPosts', 'uses' => 'BlogController@showPosts']);
    get('/post/{id}', ['as' => 'showPost', 'uses' => 'BlogController@showPost']);

    get('/comments/{postId}', ['as' => 'showComments', 'uses' => 'BlogController@showComments']);

    get('/questions', ['as' => 'showQuestions', 'uses' => 'BlogController@showQuestions']);
    get('/question/{id}', ['as' => 'showQuestion', 'uses' => 'BlogController@showQuestion']);

    get('/answers/{questionId}', ['as' => 'showAnswers', 'uses' => 'BlogController@showAnswers']);

    get('/search/{for}/{query}', ['as' => 'search', 'uses' => 'BlogController@search']);

    //-------------------------- Admin -----------------------------

    // posts
    get('/admin/post/create', ['as' => 'createPost', 'uses' => 'AdminController@createPost']);
    post('/admin/post/store', ['as' => 'storePost', 'uses' => 'AdminController@storePost']);
    get('/admin/post/edit', ['as' => 'editPost', 'uses' => 'AdminController@editPost']);
    put('/admin/post/update', ['as' => 'updatePost', 'uses' => 'AdminController@updatePost']);
    delete('/admin/post/delete', ['as' => 'deletePost', 'uses' => 'AdminController@deletePost']);

    // tags
    get('/admin/tag/create', ['as' => 'createTag', 'uses' => 'AdminController@createTag']);
    post('/admin/tag/store', ['as' => 'storeTag', 'uses' => 'AdminController@storeTag']);
    get('/admin/tag/edit', ['as' => 'editTag', 'uses' => 'AdminController@editTag']);
    put('/admin/tag/update', ['as' => 'updateTag', 'uses' => 'AdminController@updateTag']);
    delete('/admin/tag/delete', ['as' => 'deleteTag', 'uses' => 'AdminController@deleteTag']);

    // uploads
    post('/admin/upload/file', ['as' => 'uploadFile', 'uses' => 'AdminController@uploadFile']);
    delete('/admin/upload/file', ['as' => 'deleteFile', 'uses' => 'AdminController@deleteFile']);
    post('/admin/upload/folder', ['as' => 'uplodaFolder', 'uses' => 'AdminController@uploadFolder']);
    delete('/admin/upload/folder', ['as' => 'uplodaFile', 'uses' => 'AdminController@deleteFolder']);
});
