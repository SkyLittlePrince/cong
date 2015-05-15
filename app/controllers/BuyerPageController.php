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

		$numOfItemsPerPage = 3;
		$indents = Indent::where("user_id", "=", $user_id)->paginate($numOfItemsPerPage);
		$numOfTotalItems = Indent::where("user_id", "=", $user_id)->count();

		foreach ($indents as $key => $indent) 
		{
			$indent->product = $indent->product;
		}

		return View::make('tradingCenter.buyer-center.index', array("indents" => $indents, "numOfTotalItems" => $numOfTotalItems));
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

		$numOfItemsPerPage = 5;
		$indents = Indent::where("user_id", "=", $user_id)->paginate($numOfItemsPerPage);
		$numOfTotalItems = Indent::where("user_id", "=", $user_id)->count();

		foreach ($indents as $key => $indent) 
		{
			$indent->product = $indent->product;
		}

		return View::make('tradingCenter.buyer-center.trading-manage.trading-list', array("indents" => $indents, "numOfTotalItems" => $numOfTotalItems));
	}
}
