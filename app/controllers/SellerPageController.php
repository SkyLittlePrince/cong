<?php

class SellerPageController extends BaseController {

	public function myStore()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$myShop = Shop::where("user_id", "=", $user_id)->get();

		if(!isset($myShop) || count($myShop) == 0)
		{
			return View::make('errors.haveNoStore');
		}

		$shop = $myShop[0];
		$myshop = Shop::find($shop->id);
		$shop["tags"] = $myshop->tags;
		$shop["products"] = $myshop->products;

		return View::make('tradingCenter.seller-center.my-store', $shop);
	}
}
