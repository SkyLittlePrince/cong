<?php

class ProductController extends \BaseController {

	public function addProduct()
	{
		$user = Sentry::getUser();
		$shop_id = Input::get('shop_id');
		$name = Input::get('name');
		$intro = Input::get('intro');
		$price = Input::get('price');

		$shop = Shop::where('shop_id',$shop_id)->first();

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '该店铺不存在!'));

		if($user->id != $shop->user_id)
			return Response::json(array('errCode' => 2.'message' => '你没有操作权限!'));

		$product = new Product;
		$product->name = $name;
		$product->intro = $intro;
		$product->price = $price;
		$product->shop_id = $shop_id;

		if($product->save())
			return Response::json(array('errCode' => 0,'message' => '创建成功!'));

		return Response::json(array('errCode' => 3,'message' => '创建失败!'));
	}

	public function updateProduct()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$intro = Input::get('intro');
		$price = Input::get('price');

		$product = Product::find($id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		$shop = $product->shop()->first();

		if($shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$product->name = $name;
		$product->intro = $intro;
		$product->price = $price;

		if($product->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}

	public function deleteProduct()
	{
		$user = Sentry::getUser();
		$id = Input::get('id');

		$product = Product::find($id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		$shop = $product->shop()->first();

		if($shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		if($product->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

}