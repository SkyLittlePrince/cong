<?php

class PictureController extends \BaseController {

	public function addPicture()
	{
		$user = Sentry::getUser();
		$product_id = Input::get('product_id');
		$image = Input::get('image');

		$validator = Validator::make(
			array('image' => $image),
			array('image' => 'required | url')
		);

		if($validator->fails()){
			return Response::json(array('errCode'=>5,"message" => '请上传正确的图片!',"validateMes"=> $validator->messages()));			
		}

		$product = Product::with('shop','pictures')->find($product_id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '商品不存在!'));

		if($user->id != $product->shop->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		if(count($product->pictures) > 5)
			return Response::json(array('errCode' => 3,'message' => '每个商品不能超过5张图片!'));

		$picture = new Picture;
		$picture->image = $image;
		$picture->product_id = $product_id;

		if($picture->save())
			return Response::json(array('errCode' => 0,'picture_id' => $picture->id));

		return Response::json(array('errCode' => 4,'message' => '保存失败!'));
	}

	public function deletePicture()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();

		$pictrue = Picture::find($id);

		if(!isset($pictrue))
			return Response::json(array('errCode' => 1,'message' => '该图片不存在!'));

		$shop = $picture->product()->shop()->first();

		if($shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		if($pictrue->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

}