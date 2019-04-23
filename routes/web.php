<?php

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/tickets/personal', 'TicketController@getPersonal');
