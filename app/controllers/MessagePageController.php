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
		$numOfTotalItems = $messages->getTotal();

		$messageLinks = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 2)->paginate($numOfItemsPerPage);

		foreach ($messages as $message) {
			$message->receiverName = User::find($message->receiver)->username;
			$message->senderName = User::find($message->sender)->username;
		}

		return View::make('tradingCenter.mynews.notification', array("messages" => $messages, "numOfTotalItems" => $numOfTotalItems, "messageLinks" => $messageLinks));
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

		$numOfItemsPerPage = 10;
		$messages = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 1)->paginate($numOfItemsPerPage);
		$numOfTotalItems = $messages->getTotal();

		$messageLinks = DB::table('messages')->where("receiver", "=", $user_id)->where("type", "=", 2)->paginate($numOfItemsPerPage);

		foreach ($messages as $message) {
			$message->receiverName = User::find($message->receiver)->username;
			$message->senderName = User::find($message->sender)->username;
		}

		return View::make('tradingCenter.mynews.trading-reminder', array("messages" => $messages, "numOfTotalItems" => $numOfTotalItems));
	}
}
