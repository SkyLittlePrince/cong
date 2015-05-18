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
		$indents = Indent::where("user_id", "=", $user_id)->with('products')->paginate($numOfItemsPerPage)->toArray();
		//$numOfTotalItems = Indent::where("user_id", "=", $user_id)->count();
		$numOfTotalItems = $indents['total'];
		// $array = array();
		// foreach ($indents as $key => $indent) 
		// {
		// 	$indent->product = $indent->products[0];
		// }
		$indents = $indents['data'];
		$array = array('id' => 0,'name' => '商品已下架','price' => 0);
		foreach ($indents as $key => $indent) {
			if(count($indent['products']) == 0)
				$indents[$key]['products'][0] = $array;
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
			$indent->product = $indent->products[0];
		}

		return View::make('tradingCenter.buyer-center.trading-manage.trading-list', array("indents" => $indents, "numOfTotalItems" => $numOfTotalItems));
	}

	public function inviteFriends()
	{
		$user = Sentry::getUser();

		$url = Config::get('app.url') . '/user/register?invitationCode=' . $user->id;

		return View::make('tradingCenter.buyer-center.invite-friends',array('url' => $url));
	}
}
