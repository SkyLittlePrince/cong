<?php
use Gregwar\Captcha\CaptchaBuilder;

class SellerPageController extends BaseController {

	public function authentication()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else
		{
			return Redirect::guest('user/login');
		}

		$authentication = SellerAuthentication::where("user_id", "=", $user_id)->get();

		if(count($authentication) == 0)
		{
			$authentication = ["isExist" => false];
			$authentication["name"] = "";
			$authentication["credit_id"] = "";
			$authentication["gender"] = 1;
			$authentication["address"] = "";
			$authentication["phone"] = "";
		}
		else
		{
			$authentication = $authentication[0];
			$authentication["isExist"] = true;
		}

		return View::make('tradingCenter.seller-center.authentication', $authentication);
	}

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

	public function register()
	{
		$builder = new CaptchaBuilder;
		$builder->build();

		$phrase = $builder->getPhrase();
		$_SESSION['phrase'] = $phrase;

		return View::make('tradingCenter.seller-center.register')->with('captcha', $builder);
	}
}
