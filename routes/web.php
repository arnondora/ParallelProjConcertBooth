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

Route::get('/', ['middleware' => 'guest' , 'uses' => 'UserController@login']);

Route::get('/login', ['middleware' => 'guest' , 'uses' => 'UserController@login']);
Route::post('/login', 'UserController@doLogin');
Route::get('/logout', 'UserController@doLogout');

Route::get('/dashboard/show', ['middleware' => 'auth', 'uses' => 'DashboardController@showShowDashboard']);
Route::get('/dashboard/user', ['middleware' => 'auth', 'uses' => 'DashboardController@showUserDashboard']);
Route::get('/dashboard/ticket', ['middleware' => 'auth', 'uses' => 'DashboardController@showTicketDashboard']);

Route::get('/show/add', ['middleware' => 'auth', 'uses' => 'ShowController@newShow']);
Route::post('/show/add', ['middleware' => 'auth', 'uses' => 'ShowController@doNewShow']);
Route::delete('/show/delete', ['middleware' => 'auth', 'uses' => 'ShowController@doDeleteShow']);
Route::get('/show/{id}/edit', ['middleware' => 'auth', 'uses' => 'ShowController@editShow']);

Route::get('/show/{id}/time/add', ['middleware' => 'auth', 'uses' => 'ShowtimeController@newShowtime']);
Route::post('/show/time/add', ['middleware' => 'auth', 'uses' => 'ShowtimeController@doNewShowtime']);
Route::get('/show/{id}/time', ['middleware' => 'auth', 'uses' => 'ShowtimeController@availableTicket']);

Route::get('/ticket/add', ['middleware' => 'auth', 'uses' => 'TicketController@newTicket']);
Route::post('/ticket/add', ['middleware' => 'auth', 'uses' => 'TicketController@doNewTicket']);
Route::post('/ticket/add/finalise', ['middleware' => 'auth', 'uses' => 'TicketController@doNewTicketFinalise']);

Route::get('/ticket/type', ['middleware' => 'auth', 'uses' => 'TicketTypeController@show']);
Route::get('/ticket/type/add', ['middleware' => 'auth', 'uses' => 'TicketTypeController@newType']);
Route::post('/ticket/type/add', ['middleware' => 'auth', 'uses' => 'TicketTypeController@doNewType']);

Route::get('/user/add', ['middleware' => 'auth', 'uses' => 'UserController@newUser']);
Route::get('/user/edit/password', 'UserController@changePassword');
Route::post('/user/edit/password', 'UserController@doChangePassword');
Route::post('/user/add', ['middleware' => 'auth', 'uses' => 'UserController@doNewUser']);
Route::delete('/user/delete', ['middleware' => 'auth', 'uses' => 'UserController@doDeleteUser']);
