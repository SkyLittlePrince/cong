<?php
use Gregwar\Captcha\CaptchaBuilder;

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

		$myShop = Shop::where("user_id", "=", $user_id)->with('tags','products')->first();

		if(!isset($myShop))
		{
			return View::make('errors.haveNoStore');
		}

		$shop = $myShop->toArray();

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
