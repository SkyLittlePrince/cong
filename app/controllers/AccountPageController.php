<?php

class AccountPageController extends BaseController {

	public function userInfo()
	{
		if(!Input::has("user_id")) 
		{
			if(Sentry::check()) 
			{
				$user_id = Sentry::getUser()->id;
			} 
			else 
			{
				return Redirect::to('user/login');
			}
		} else 
		{
			$user_id = Input::get("user_id");
		}

		$user = User::find($user_id);
		$user["workExperiences"] = $user->workExperiences;
		$user["eduExperiences"] = $user->eduExperiences;
		$user["awards"] = $user->awards;
		$user["shop"] = $user->shop;
		$user["about"] = $user->about;

		if(isset($user->shop) && count($user->shop->tags))
			$user["shop"]["tags"] = $user->shop->tags;

		return View::make('tradingCenter.account.user-info', $user);
	}

	public function card()
	{
		if(!Input::has("user_id")) 
		{
			if(Sentry::check()) 
			{
				$user_id = Sentry::getUser()->id;
			} 
			else 
			{
				App::abort(404);
			}
		} 
		else 
		{
			$user_id = Input::get("user_id");
		}

		$user = User::find($user_id);
		$user["description"] = $user->description;
		
		return View::make('tradingCenter.account.card', $user);
	}
}
