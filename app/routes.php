<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/register', function()
{
	return View::make('register');
});

Route::get('/rewardtask', function()
{
	return View::make('rewardtask');
});

Route::get('/rewardtask2', function()
{
	return View::make('rewardtask2');
});

Route::get('/rewardtask3', function()
{
	return View::make('rewardtask3');
});

Route::get('/rewardtask4', function()
{
	return View::make('rewardtask4');
});

