<?php

Route::group(['middleware' => 'auth'], function () {
    Route::get('index', 'Admin\IndexController@index')->name('admin.index');
    Route::resource('users', 'Admin\UserController');
    Route::resource('courses/quizzes', 'Admin\Course\QuizController');


});