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

get('/', function () {
    return redirect('/posts');
});

get('/bio', 'PagesController@showBio');
get('/posts', 'PagesController@showPosts');
get('/ask', 'PagesController@showDiscussion');
get('/email', 'PagesController@showEmail');

get('/posts/{slug}', 'PagesController@showPost');