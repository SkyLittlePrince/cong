<?php
use Gregwar\Captcha\CaptchaBuilder;

class MessagePageController extends BaseController {

	public function notification()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$numOfItemsPerPage = 10;
		$messages = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 2)->paginate($numOfItemsPerPage);
		$numOfTotalItems = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 2)->count();

		return View::make('tradingCenter.mynews.notification', array("messages" => $messages, "numOfTotalItems" => $numOfTotalItems));
	}

	public function setting()
	{
		if(Sentry::check())
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('tradingCenter.mynews.setting');
	}

	public function tradingReminder()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$messages = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 1)->get();

		return View::make('tradingCenter.mynews.trading-reminder', array("messages" => $messages));
	}
}
