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

		// $recentSellers = array();
		// $sellerNames = array();
		$numOfItemsPerPage = 3;
		$indents = Indent::where("user_id", $user_id)->with('products','products.shop.user')->paginate($numOfItemsPerPage);

		$sellers = DB::table('users')
			->join('shops','users.id','=','shops.user_id')
			->join('products','shops.id','=','products.shop_id')
			->join('indent_product','products.id','=','indent_product.product_id')
			->join('indents','indent_product.indent_id','=','indents.id')
			->select('users.id','users.username','users.avatar')
			->orderBy('indents.id','desc')
			->take(5)
			->distinct()
			->remember(5)
			->get();

		// $sellers = User::whereHas('products',function($q) use ($user_id)
		// 	{
		// 		$q->whereHas('indents',function($q) use ($user_id)
		// 			{
		// 				$q->where('user_id',$user_id);
		// 			});
		// 	})
		// 	->remember(10)
		// 	->take(5)->get();

		$numOfTotalItems = $indents->getTotal();
		$array = array('id' => 0,'name' => '商品已下架','price' => 0);
		foreach ($indents as $key => $indent) 
		{
			if(count($indent->products) == 0)
			{
				$indent->product = $array;
			}
			else
			{
				$indent->product = $indent->products[0];
				// $seller = $indent->product->shop->user;
				// if(!in_array($seller->username, $sellerNames) && count($sellerNames) < 5)
				// {
				// 	array_push($recentSellers, $seller);
				// 	array_push($sellerNames, $seller->username);
				// }
			}
		}

		return View::make('tradingCenter.buyer-center.index', array("indents" => $indents, "numOfTotalItems" => $numOfTotalItems, "recentSellers" => $sellers));
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
