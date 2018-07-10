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

Route::get('/', function () {
    return view('home');
});

Route::resource('tickets', 'TicketController');

Route::resource('comments', 'CommentController')->only(
    'store'
);

Route::get('about', [
    'as' => 'about',
    'uses' => 'PageController@about'
]);

Route::get('contact', [
    'as' => 'contact',
    'uses' => 'PageController@contact'
]);

