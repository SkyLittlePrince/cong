<?php

class AdminPageController extends BaseController {

	public function userManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.user-manager',$user);
	}

	public function productManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-manager',$user);
	}

	public function IndentManager()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.indent-manager',$user);
	}

	public function productReportvisit()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-report-visit',$user);
	}
	public function productReportbuy()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-report-buy',$user);
	}
	public function useredit()
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
		$user["birthdayYear"] = $birthdayArray[0];
		$user["birthdayMonth"] = $birthdayArray[1];
		$user["birthdayDay"] = $birthdayArray[2];
		return View::make('admin.user-manager-edit',$user);
	}
	public function indentedit()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.indent-manager-edit',$user);
	}
	public function productedit()
	{
		if(Sentry::check()) 
		{
			$user = Sentry::getUser();
		} 
		else 
		{
			return Redirect::guest('user/login');
		}

		return View::make('admin.product-manager-edit',$user);
	}
}
