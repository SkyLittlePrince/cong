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
/*------------------------<接口路由>------------------------------*/
//测试模块
Route::get('test',function()
{
	return View::make('test');
});
Route::post('test','UserController@getCheckRegister');

// 用户模块
Route::group(array('prefix' => 'user'),function()
{
	Route::get('captcha','UserController@captcha');
	Route::post('checkCaptcha','UserController@checkCaptcha');
	Route::get('getCheckRegister','UserController@getCheckRegister');
	Route::post('checkRegister','UserController@checkRegister');
	Route::get('register','UserController@getRegister');
	Route::post('register','UserController@postRegister');
	Route::post('login','UserController@postLogin');
	Route::get('login','UserController@getLogin');
	Route::post('checkEmail','UserController@checkEmail');

	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::get('logout','UserController@getLogout');
		Route::post('update','UserController@postUpdate');
		Route::post('changePassword','UserController@postChangePassword');
		Route::get('information','UserController@getInformation');
		Route::post('descrption','UserController@editDescription');
		Route::post('addSkill','SkillController@addSkill');
		Route::get('deleteSkill','SkillController@deleteSkill');
		Route::post('addWorkExperience','UserController@addWorkExperience');
		Route::post('updateWorkExperience','UserController@updateWorkExperience');
		Route::get('deleteWorkExperience','UserController@deleteWorkExperience');
		Route::post('addEduExperience','UserController@addEduExperience');
		Route::post('updateEduExperience','UserController@updateEduExperience');
		Route::get('deleteEduExperience','UserController@deleteEduExperience');
		Route::post('addAward','UserController@addAward');
		Route::post('updateAward','UserController@updateAward');
		Route::get('deleteAward','UserController@deleteAward');
		Route::post('updateAbout','UserController@updateAbout');
		Route::post('updateContact','UserController@updateContact');
	});
});

//店铺模块
Route::group(array('prefix' => 'shop','before' => 'auth.user.isIn'),function()
{
	Route::post('addShop','ShopController@addShop');
});

// 消息模块
Route::group(array('prefix' => 'message'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::post('create','MessageController@create');
		Route::get('get','MessageController@getMessageContent');
		Route::post('read','MessageController@read');
		Route::post('delete','MessageController@delete');
		Route::post('clear','MessageController@clear');
		Route::get('get-my-messages','MessageController@getMyMessages');
	});
});

// 订单模块
Route::group(array('prefix' => 'indent'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::post('create','IndentController@create');
		Route::post('cancel','IndentController@cancel');
		Route::get('get-info','IndentController@getIndent');
		Route::get('get-my-indents','IndentController@getMyIndents');
	});
});

// 任务模块
Route::group(array('prefix' => 'task'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::post('create','TaskController@create');
		Route::post('cancel','TaskController@cancelPublish');
	});

	Route::get('get-published-tasks-by-user','TaskController@getTasksByUser');
	Route::get('get-info','TaskController@getTaskInfo');

});
/*------------------------</接口路由>------------------------------*/


// 需要登录验证才能操作的接口
Route::group(array('before' => 'auth'), function()
{
    Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@getLogout']);
});


/*--------------------------<页面模版路由>------------------------------*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/shopping-cart', function()
{
	return View::make('shopping-cart');
});

Route::get('/shopping-cart-clearning', function()
{
	return View::make('shopping-cart-clearning');
});

// 赏金猎人
Route::group(array('prefix' => 'bounty-hunter'),function()
{
	Route::get('/', function()
	{
		return View::make('bountyHunter.index');
	});

	// 悬赏任务
	Route::get('reward-task', function($step = null)
	{
		$step = Input::get("step");

		if($step == null) {
			return View::make('bountyHunter.rewardTasks.step-1');
		} else {
			return View::make('bountyHunter.rewardTasks.step-' . $step);
		}
	});

	// 倒价竞拍
	Route::get('auction', function($step = null)
	{
		$step = Input::get("step");

		if($step == null) {
			return View::make('bountyHunter.auctions.step-1');
		} else {
			return View::make('bountyHunter.auctions.step-' . $step);
		}
	});
});

// 交易中心
Route::group(array('prefix' => 'trading-center'),function()
{
	// 我的消息
	Route::group(array('prefix' => 'mynews'),function()
	{
		Route::get('/', function()
		{
			return View::make('tradingCenter.mynews.notification');
		});
		Route::get('notification', function()
		{
			return View::make('tradingCenter.mynews.notification');
		});
		Route::get('setting', function()
		{
			return View::make('tradingCenter.mynews.setting');
		});
		Route::get('history', function()
		{
			return View::make('tradingCenter.mynews.history');
		});
		Route::get('trading-reminder', function()
		{
			return View::make('tradingCenter.mynews.trading-reminder');
		});
	});

	// 买家中心
	Route::group(array('prefix' => 'buyer'),function()
	{
		Route::get('/', function()
		{
			return View::make('tradingCenter.buyer-center.index');
		});
		Route::get('trading-list', function()
		{
			return View::make('tradingCenter.buyer-center.trading-manage.trading-list');
		});
		Route::get('trading-comment', function()
		{
			return View::make('tradingCenter.buyer-center.trading-manage.trading-comment');
		});
		Route::get('mybook', function()
		{
			return View::make('tradingCenter.buyer-center.my-book.my-book');
		});
		Route::get('comment-manage', function()
		{
			return View::make('tradingCenter.buyer-center.comment-manage.comment-manage');
		});
		Route::get('report-manage', function()
		{
			return View::make('tradingCenter.buyer-center.report-manage.index');
		});
		Route::get('launch-report', function()
		{
			return View::make('tradingCenter.buyer-center.report-manage.launch-report');
		});
		Route::get('receive-report', function()
		{
			return View::make('tradingCenter.buyer-center.report-manage.receive-report');
		});
		Route::get('invite', function()
		{
			return View::make('tradingCenter.buyer-center.invite-friends');
		});
	});

	// 账号设置
	Route::group(array('prefix' => 'account'),function()
	{
		Route::get('/', function()
		{
			return View::make('tradingCenter.account.index');
		});
		Route::get('base-info', function()
		{
			return View::make('tradingCenter.account.base-info');
		});
		Route::get('contact', function()
		{
			return View::make('tradingCenter.account.contact');
		});
		Route::get('address', function()
		{
			return View::make('tradingCenter.account.address');
		});
		Route::get('card', function()
		{
			if(!Input::has("user_id")) {
				if(Sentry::check()) {
					$user_id = Sentry::getUser()->id;
				} else {
					App::abort(404);
				}
			} else {
				$user_id = Input::get("user_id");
			}
			$user = User::find($user_id);
			$user["description"] = $user->description;
			return View::make('tradingCenter.account.card', $user);
		});
		
		Route::get('user-info', 'AccountPageController@userInfo');

		Route::get('bind-phone', function()
		{
			return View::make('tradingCenter.account.bind-phone');
		});
		Route::get('bind-email', function()
		{
			return View::make('tradingCenter.account.bind-email');
		});
		Route::get('bind-weibo', function()
		{
			return View::make('tradingCenter.account.bind-weibo');
		});
		Route::get('authentication', function()
		{
			return View::make('tradingCenter.account.authentication');
		});
		Route::get('change-password', function()
		{
			return View::make('tradingCenter.account.change-password');
		});
		Route::get('protect-login', function()
		{
			return View::make('tradingCenter.account.protect-login');
		});
		Route::get('protect-password', function()
		{
			return View::make('tradingCenter.account.protect-password');
		});
		Route::get('pay-account', function()
		{
			return View::make('tradingCenter.account.pay-account');
		});
	});

	Route::group(array('prefix' => 'seller'),function()
	{
		Route::get('register', function()
		{
			return View::make('tradingCenter.seller-center.register');
		});
		Route::get('wait-check', function()
		{
			return View::make('tradingCenter.seller-center.wait-check');
		});
		Route::get('my-store', function()
		{
			return View::make('tradingCenter.seller-center.my-store');
		});

		Route::get('my-indents', function()
		{
			return View::make('tradingCenter.seller-center.my-indents');
		});

		Route::get('authentication', function()
		{
			return View::make('tradingCenter.seller-center.authentication');
		});

		Route::get('indent-evaluation', function()
		{
			return View::make('tradingCenter.seller-center.indent-evaluation');
		});
		Route::get('seller-store', function()
		{
			return View::make('tradingCenter.seller-center.seller-store');
		});
		Route::get('product-detail', function()
		{
			return View::make('tradingCenter.seller-center.seller-product-detail');
		});
	});
});

// for admin

Route::group(array('prefix' => 'categories'),function()
{
	Route::get('all','CategoryController@indexCategory');
});

/*--------------------------</页面模版路由>------------------------------*/




