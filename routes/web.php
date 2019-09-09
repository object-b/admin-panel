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

// Checking if the environment is debug, because we don't want to disable cache in production
$middleware = [];
if (Config::get('app.debug')) {
	$middleware['middleware'] = 'clearcache';
}

// The route group that will pass every request to a Middleware
Route::group($middleware, function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('/objects', 'CrudController@objects')->name('objects');
    Route::get('/objects/{id}/edit', 'CrudController@editObject')->name('editObject');
    Route::post('/objects/{id}/update', 'CrudController@updateObject')->name('updateObject');
    Route::get('/objects/{id}/delete', 'CrudController@deleteObject')->name('deleteObject');

    Route::get('/users', 'CrudController@users')->name('users');
    Route::get('/users/{id}/edit', 'CrudController@editUser')->name('editUser');
    Route::post('/users/{id}/update', 'CrudController@updateUser')->name('updateUser');
});