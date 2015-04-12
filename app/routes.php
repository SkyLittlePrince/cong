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
// Route::get('captcha', 'SessionsController@captcha');
Route::get('login', 'SessionsController@login');
Route::post('login', 'SessionsController@login');

// 需要登录验证才能操作的接口
Route::group(array('before' => 'auth'), function()
{
    Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@getLogout']);
});

Route::get('/register', function()
{
	return View::make('register');
});

// 赏金猎人
Route::get('/bounty-hunter', function()
{
	return View::make('bountyHunter.index');
});

Route::get('bounty-hunter/reward-task', function($step = null) 
{
	$step = Input::get("step");

	if($step == null) {
		return View::make('bountyHunter.rewardTasks.step-1');
	} else {
		return View::make('bountyHunter.rewardTasks.step-' . $step);
	}
});

Route::get('bounty-hunter/auction', function($step = null) 
{
	$step = Input::get("step");
	
	if($step == null) {
		return View::make('bountyHunter.auctions.step-1');
	} else {
		return View::make('bountyHunter.auctions.step-' . $step);
	}
});

// 交易中心-我的消息
Route::get('/mynews/{step?}', function($step = null) 
{
	if($step == null) {
		return View::make('tradingCenter.mynews.index');
	} else {
		return View::make('tradingCenter.mynews.' . $step);
	}
});

// 交易中心-雇主首页
Route::get('/employer/{step?}', function($step = null) 
{
	if($step == null) {
		return View::make('tradingCenter.employer.index');
	} else {
		return View::make('tradingCenter.employer.' . $step);
	}
});

// 交易中心－账号设置
Route::get('/account', function()
{
	return View::make('tradingCenter.account.index');
});
Route::get('/account/base-info', function()
{
	return View::make('tradingCenter.account.base-info');
});
Route::get('/account/contact', function()
{
	return View::make('tradingCenter.account.contact');
});
Route::get('/account/address', function()
{
	return View::make('tradingCenter.account.address');
});
Route::get('/account/card', function()
{
	return View::make('tradingCenter.account.card');
});
Route::get('/account/user-info', function()
{
	return View::make('tradingCenter.account.user-info');
});
Route::get('/account/bind-phone', function()
{
	return View::make('tradingCenter.account.bind-phone');
});
Route::get('/account/bind-email', function()
{
	return View::make('tradingCenter.account.bind-email');
});
Route::get('/account/bind-weibo', function()
{
	return View::make('tradingCenter.account.bind-weibo');
});
Route::get('/account/authentication', function()
{
	return View::make('tradingCenter.account.authentication');
});
Route::get('/account/change-password', function()
{
	return View::make('tradingCenter.account.change-password');
});
Route::get('/account/protect-login', function()
{
	return View::make('tradingCenter.account.protect-login');
});
Route::get('/account/protect-password', function()
{
	return View::make('tradingCenter.account.protect-password');
});
Route::get('/account/pay-account', function()
{
	return View::make('tradingCenter.account.pay-account');
});

