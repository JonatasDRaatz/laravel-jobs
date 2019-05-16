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

Auth::routes();

Route::prefix('admin')->group(function(){ 
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::resource('jobs', 'JobsController') ; 
    Route::resource('sections', 'SectionsController');
    Route::get('/candidates/{candidates}', 'CandidatesController@candidates')->name('candidates');

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/job/{job}', 'HomeController@job')->name('home.job');
Route::get('/create_candidate', 'HomeController@create_candidate')->name('create.candidate'); 

Route::resource('profiles', 'ProfilesController');

Route::get('/profiles/candidates/{profile}', 'ProfilesController@candidates')->name('profiles.candidate'); 