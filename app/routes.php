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

// 用户登录
// 验证码
Route::get('captcha', 'SessionsController@captcha');
Route::get('login', 'SessionsController@getLogin');
Route::post('login', 'SessionsController@postLogin');

// 需要登录验证才能操作的接口
Route::group(array('before' => 'auth'), function()
{
    Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@getLogout']);
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

Route::get('/employer/{step?}', function($step = null) 
{
	if($step == null) {
		return View::make('employer.home');
	} else {
		return View::make('employer.' . $step);
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


