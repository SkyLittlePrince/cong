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
				return Redirect::guest('user/login');
			}
		} else 
		{
			$user_id = Input::get("user_id");
		}

		$friends = Friend::where("user_id", "=", $user_id)->paginate(10);;
		$friendsArray = [];
		foreach ($friends as $friend) {
			$friendsArray[] = $friend->info;
		}

		$user = User::find($user_id);
		$user["workExperiences"] = $user->workExperiences;
		$user["eduExperiences"] = $user->eduExperiences;
		$user["awards"] = $user->awards;
		$user["shop"] = $user->shop;
		$user["about"] = $user->about;
		$user["friends"] = $friendsArray;
		$user["friend_links"] = $friends;

		if(isset($user->shop) && count($user->shop->tags))
			$user["shop"]["tags"] = $user->shop->tags;

		return View::make('tradingCenter.account.user-info', $user);
	}

	public function card()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$user = User::find($user_id);
		$user["description"] = $user->description;
		
		return View::make('tradingCenter.account.card', $user);
	}
}
