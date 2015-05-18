<?php

class AccountPageController extends BaseController 
{
	public function baseInfo()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		$user = Sentry::getUser();
		$birthdayArray = explode("-", $user->birthday);
		
		if(count($birthdayArray) == 3)
		{
			$user["birthdayYear"] = $birthdayArray[0];
			$user["birthdayMonth"] = $birthdayArray[1];
			$user["birthdayDay"] = $birthdayArray[2];
		}
		else
		{
			$user["birthdayYear"] = "";
			$user["birthdayMonth"] = "";
			$user["birthdayDay"] = "";
		}

		return View::make('tradingCenter.account.base-info', $user);
	}

	public function index()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('tradingCenter.account.index', $user);
	}

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

		$authentication = Authentication::where("user_id", "=", $user_id)->get();

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

		return View::make('tradingCenter.account.authentication', $authentication);
	}

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

		$numOfItemsPerPage = 10;
		$friends = Friend::where("user_id", "=", $user_id)->paginate($numOfItemsPerPage);
		$numOfTotalFriends = Friend::where("user_id", "=", $user_id)->count();
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
		$user["skills"] = $user->skills;
		$user["numOfItemsPerPage"] = $numOfItemsPerPage;
		$user["numOfTotalFriends"] = $numOfTotalFriends;

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
