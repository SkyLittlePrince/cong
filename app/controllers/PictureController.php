<?php

class PictureController extends \BaseController {

	public function addPicture()
	{
		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$image = Input::get('image');
		$key = Input::get('key');

		$product = Product::find($product_id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '商品不存在!'));

		if($user->id != $product->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$pictrue = new Picture;
		$pictrue->image = $image;
		$pictrue->key = $key;
		$pictrue->product_id = $product_id;

		if($pictrue->save())
			return Response::json(array('errCode' => 0,'保存成功!'));

		return Response::json(array('errCode' => 3,'保存失败!'));
	}

	public function deletePicture()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();

		


	}

}