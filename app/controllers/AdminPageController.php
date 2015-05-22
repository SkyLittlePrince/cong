<?php

class AdminPageController extends BaseController {

	public function userManager()
	{
		$numOfItemsPerPage = 10;
		$users = User::with('Authentication')->paginate($numOfItemsPerPage); 

		return View::make('admin.user-manager',array('users' => $users));
	}

	public function productManager()
	{
		$numOfItemsPerPage = 10;
		$products = Product::paginate($numOfItemsPerPage); 

		return View::make('admin.product-manager',array('products' => $products));
	}

	public function IndentManager()
	{
		$numOfItemsPerPage = 10;
		$indents = Indent::with('user','products')->paginate($numOfItemsPerPage); 
		return View::make('admin.indent-manager',array('indents' => $indents));
	}

	public function productReportvisit()
	{
		$numOfItemsPerPage = 10;
		$shops = Shop::with(array('products' => function($q)
			{
				$q->orderBy('sellNum','desc');
			}))->orderBy('visitNum','desc')->paginate($numOfItemsPerPage);

		return View::make('admin.product-report-visit',array('shops' => $shops));
	}
	public function productReportbuy()
	{
		$numOfItemsPerPage = 10;
		$products = Product::with('shop')->orderBy('sellNum','desc')->paginate($numOfItemsPerPage);

		return View::make('admin.product-report-buy',array('products' => $products));
	}
	public function useredit()
	{
		$id = Input::get('id');
		$user = User::find($id);

		if(!isset($user))
			return Response::view('errors.missing', array(), 404);  

		$birthdayArray = explode("-", $user->birthday);
		if(count($birthdayArray) == 3)
		{
			$user->birthdayYear = $birthdayArray[0];
			$user->birthdayMonth = $birthdayArray[1];
			$user->birthdayDay = $birthdayArray[2];
		}
		else
		{
			$user->birthdayYear = "";
			$user->birthdayMonth = "";
			$user->birthdayDay = "";
		}
		return View::make('admin.user-manager-edit',array('user' => $user));
	}
	public function indentedit()
	{
		$id = Input::get('id');
		$indent = Indent::find($id);

		if(!isset($indent))
			return Response::view('errors.missing', array(), 404);  

		return View::make('admin.indent-manager-edit',array('indent' => $indent));
	}
	public function productedit()
	{
		$id = Input::get('id');
		$product = Product::with('shop')->find($id);

		if(!isset($product))
			return Response::view('errors.missing', array(), 404);  

		return View::make('admin.product-manager-edit',array('product' => $product));
	}
}
