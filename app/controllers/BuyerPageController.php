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
		$indents = Indent::where("user_id", "=", $user_id)->with('products')->paginate($numOfItemsPerPage);
		$numOfTotalItems = $indents->getTotal();
		$array = array('id' => 0,'name' => '商品已下架','price' => 0);
		foreach ($indents as $key => $indent) {
			if(count($indent->products) == 0)
				$indent->product = $array;
			else
				$indent->product = $indent->products[0];
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
		$indents = Indent::where("user_id", "=", $user_id)->with('products')->paginate($numOfItemsPerPage);
		$numOfTotalItems = $indents->getTotal();

		$array = array('id' => 0,'name' => '商品已下架','price' => 0);
		foreach ($indents as $key => $indent) {
			if(count($indent->products) == 0)
				$indent->product = $array;
			else
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
