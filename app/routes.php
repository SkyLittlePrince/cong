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

Route::get('/bounty-hunter', function()
{
	return View::make('bounty-hunter');
});

Route::get('/reward-task/{step?}', function($step = null) 
{
	if($step == null) {
		return View::make('rewardtasks.step-1');
	} else {
		return View::make('rewardtasks.' . $step);
	}
});

Route::get('/auction/{step?}', function($step = null) 
{
	if($step == null) {
		return View::make('auctions.step-1');
	} else {
		return View::make('auctions.' . $step);
	}
});


