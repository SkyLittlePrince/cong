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
// Route::get('test',function()
// {
// 	return View::make('test');
// });
//Route::get('test','TestController@getAscore');
//Route::post('test','UserController@getCheckRegister');

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
		Route::post('deleteSkill','SkillController@deleteSkill');
		Route::post('addWorkExperience','UserController@addWorkExperience');
		Route::post('updateWorkExperience','UserController@updateWorkExperience');
		Route::post('deleteWorkExperience','UserController@deleteWorkExperience');
		Route::post('addEduExperience','UserController@addEduExperience');
		Route::post('updateEduExperience','UserController@updateEduExperience');
		Route::post('deleteEduExperience','UserController@deleteEduExperience');
		Route::post('addAward','UserController@addAward');
		Route::post('updateAward','UserController@updateAward');
		Route::post('deleteAward','UserController@deleteAward');
		Route::post('updateAbout','UserController@updateAbout');
		Route::post('updateContact','UserController@updateContact');
	});
});

//邀请好友模块
Route::group(array('prefix' => 'invitation','before' => 'auth.user.isIn'),function()
{
	Route::post('sendEmail','InvitationController@sendEmail');
});

//评论模块
Route::group(array('prefix' => 'comment','before' => 'auth.user.isIn'),function()
{
	Route::post('addComment','CommentController@addComment');
	Route::get('deleteComment','CommentController@deleteComment');
	Route::get('getComment','CommentController@getComment');
});

//店铺模块
Route::group(array('prefix' => 'shop','before' => 'auth.user.isIn'),function()
{
	Route::post('addShop','ShopController@addShop');
	Route::post('updateShop','ShopController@updateShop');
	Route::post('addTag','ShopController@addTag');
	Route::post('deleteTag','ShopController@deleteTag');
	Route::get('deleteShop','ShopController@deleteShop');	
});

//产品模块
Route::group(array('prefix' => 'product','before' => 'auth.user.isIn'),function()
{
	Route::post('addProduct','ProductController@addProduct');
	Route::post('updateProduct','ProductController@updateProduct');
	Route::get('deleteProduct','ProductController@deleteProduct');
	Route::get('getSortedProductsBySellNum','ProductController@sortProductBySellNum');
	Route::get('getSortedProductsByFavorNum','ProductController@sortProductByFavorNum');
	Route::post('addPicture','PictureController@addPicture');
	Route::get('deletePicture','PictureController@deletePicture');
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
		Route::get('get-num-of-unread-messages', 'MessageController@getNumOfUnreadMessages');
		Route::post('set-config','MessageController@changeMessageConfig');
		Route::get('get-config','MessageController@getMessageConfig');
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

Route::group(array('prefix' => 'seller-authentication'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::post('create','SellerAuthenticationController@create');
		Route::post('fail','SellerAuthenticationController@fail');
		Route::post('update','SellerAuthenticationController@update');
		Route::post('pass','SellerAuthenticationController@pass');
	});
});

Route::group(array('prefix' => 'friend'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::post('add','FriendController@add');
		Route::post('delete','FriendController@delete');
		Route::get('getMyFriends','FriendController@getMyFriends');
		Route::get('checkIsFriend','FriendController@checkIsFriend');
	});
});

Route::group(array('prefix' => 'qiniu'),function()
{
	Route::group(array('before' => 'auth.user.isIn'), function() 
	{
		Route::get('getUpToken','UploadController@getUpToken');
	});
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
		Route::get('notification', 'MessagePageController@notification');

		// Route::get('setting', 'MessagePageController@setting');

		Route::get('trading-reminder', 'MessagePageController@tradingReminder');
	});

	// 买家中心
	Route::group(array('prefix' => 'buyer'),function()
	{
		Route::get('/', 'BuyerPageController@index');

		Route::get('trading-list', 'BuyerPageController@tradingList');

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
		Route::get('invite','InvitationPageController@inviteFriends');
	});

	// 账号设置
	Route::group(array('prefix' => 'account'),function()
	{
		Route::group(array('before' => 'auth.user.isIn'), function() 
		{
			Route::get('/', 'AccountPageController@index');

			Route::get('authentication', 'AccountPageController@authentication');
		
			Route::get('bind-weibo', function()
			{
				return View::make('tradingCenter.account.bind-weibo');
			});

			Route::get('change-password', function()
			{
				return View::make('tradingCenter.account.change-password');
			});
			
			Route::get('pay-account', function()
			{
				return View::make('tradingCenter.account.pay-account');
			});

			Route::get('base-info', 'AccountPageController@baseInfo');

			Route::get('card', 'AccountPageController@card');
		});
		
		Route::get('user-info', 'AccountPageController@userInfo');
	});

	Route::group(array('prefix' => 'seller'),function()
	{
		Route::group(array('before' => 'auth.user.isIn'), function() 
		{
			Route::get('register', 'SellerPageController@register');
			
			Route::get('wait-check', function()
			{
				return View::make('tradingCenter.seller-center.wait-check');
			});

			Route::get('my-store', 'SellerPageController@myStore');

			Route::get('my-indents', 'SellerPageController@myIndents');

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
});

// for admin
Route::group(array('prefix' => 'admin'),function()
{
	Route::get('user-manager','AdminPageController@userManager');
	Route::get('product-manager','AdminPageController@productManager');
	Route::get('indent-manager','AdminPageController@IndentManager');
	Route::get('product-report','AdminPageController@productReport');
});


Route::group(array('prefix' => 'categories'),function()
{
	Route::get('all','CategoryController@indexCategory');
});

/*--------------------------</页面模版路由>------------------------------*/




