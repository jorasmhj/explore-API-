<?php

Route::group([
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('signup', 'AuthController@signUp');
    Route::get('getUser/{id}', 'api\UserController@getUser');
    Route::post('post', 'PostController@createPost');
    Route::post('post/{id}', 'PostController@removePost');
    Route::get('post', 'PostController@getPost');
});
