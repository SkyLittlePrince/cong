<?php

class ProductController extends \BaseController {

	public function addproduct()
	{
		$user = Sentry::getUser();
		$shop = Shop::where('user_id',$user->id)->first();

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '你还没创建店铺!'));
	}

}