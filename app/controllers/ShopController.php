<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /shop
	 *
	 * @return Response
	 */
	public function addShop()
	{
		$user = Sentry::getUser();
		$name = Input::get('name');
		$description = Input::get('description');

		$shop = Shop::where('usere_id',$user->id)->first();
		if(isset($shop))
			return Response::json(array('errCode' => 1,'message' => '你已拥有店铺!'));

		$shop = new Shop;
		$shop->name = $name;
		$shop->description = $description;
		$shop->user_id = $user->id;

		if($shop->save())
		{
			$user->role_id = 2;
			$user->save();
			return Response::json(array('errCode' =>0,'message' => '创建成功!'));
		}
			

		return Response::json(array('errCode' => 2,'message' => '创建失败!'));
	}

	public function updateShop()
	{
		$user = Sentry::getUser();
		$name = Input::get('name');
		$description = Input::get('description');
		$id = Input::get('id');

		$shop = Shop::find($id);
		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '该店铺不存在!'));

		if($user->id != $shop->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有权限进行该操作!'));

		$shop->name = $name;
		$shop->description = $description;

		if($shop->save())
			return Response::json(array('errCode' =>0,'message' => '修改成功!'));

		return Response::json(array('errCode' => 3,'message' => '修改失败!'));
	}

	public function deleteShop()
	{
		$user = Sentry::getUser();

		$shop = Shop::where('user_id',$user->id)->first();

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '店铺不存在!'));

		if($shop->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 2,'message' => '删除失败!'));
	}

}