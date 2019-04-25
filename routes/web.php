<?php


Route::view('/login', 'auth.login');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('tickets', 'TicketController@index');

Route::post('tickets/all', 'TicketController@getAll');

Route::post('tickets/personal', 'TicketController@getPersonal');

Route::post('tickets/create', 'TicketController@createTicket');

Route::post('tickets/project/{id}', 'TicketController@getByProjectId');

Route::post('tickets/toggle/{id}', 'TicketController@toggleRunning');

Route::post('tickets/{id}', 'TicketController@getTicketById');

Route::get('projects', 'ProjectController@index');

Route::post('projects/all', 'ProjectController@getAll');

Route::post('projects/create', 'ProjectController@createProject');

Route::get('projects/{id}', 'ProjectController@detail');

Route::post('projects/{id}/delete', 'ProjectController@deleteProject');

Route::post('users/{id}/name', 'HomeController@getUsernameById');
