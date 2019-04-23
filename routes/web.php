<?php

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('tickets', 'TicketController@index');

Route::get('tickets/all', 'TicketController@getAll');

Route::get('tickets/{id}', 'TicketController@getTicketById');

Route::get('tickets/project/{id}', 'TicketController@getByProjectId');

Route::get('tickets/personal', 'TicketController@getPersonal');
