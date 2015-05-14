<?php
use Gregwar\Captcha\CaptchaBuilder;

class BuyerPageController extends BaseController {
	public function index()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$indents = Indent::where("user_id", "=", $user_id)->get();

		foreach ($indents as $key => $indent) 
		{
			$indent->product = $indent->product;
		}

		return View::make('tradingCenter.buyer-center.index', array("indents" => $indents));
	}

	public function tradingList()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$indents = Indent::where("user_id", "=", $user_id)->get();

		foreach ($indents as $key => $indent) 
		{
			$indent->product = $indent->product;
		}

		return View::make('tradingCenter.buyer-center.trading-manage.trading-list', array("indents" => $indents));
	}
}
