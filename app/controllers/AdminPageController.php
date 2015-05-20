<?php

class AdminPageController extends BaseController {

	public function userManager()
	{
		$numOfItemsPerPage = 10;
		$users = User::paginate($numOfItemsPerPage); 

		return View::make('admin.user-manager',array('users' => $users));
	}

	public function productManager()
	{
		$user = Sentry::getUser();

		return View::make('admin.product-manager',$user);
	}

	public function IndentManager()
	{
		$user = Sentry::getUser();

		return View::make('admin.indent-manager',$user);
	}

	public function productReportvisit()
	{
		$user = Sentry::getUser();

		return View::make('admin.product-report-visit',$user);
	}
	public function productReportbuy()
	{
		$user = Sentry::getUser();

		return View::make('admin.product-report-buy',$user);
	}
	public function useredit()
	{
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
		return View::make('admin.user-manager-edit',$user);
	}
	public function indentedit()
	{
		$user = Sentry::getUser();

		return View::make('admin.indent-manager-edit',$user);
	}
	public function productedit()
	{
		$user = Sentry::getUser();

		return View::make('admin.product-manager-edit',$user);
	}
}
