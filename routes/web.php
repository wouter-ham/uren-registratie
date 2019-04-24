<?php


Route::view('/login', 'auth.login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('tickets', 'TicketController@index');

Route::post('tickets/all', 'TicketController@getAll');

Route::post('tickets/personal', 'TicketController@getPersonal');

Route::post('tickets/create', 'TicketController@createTicket');

Route::post('tickets/project/{id}', 'TicketController@getByProjectId');

Route::post('tickets/{id}', 'TicketController@getTicketById');

Route::post('projects/all', 'ProjectController@getAll');
