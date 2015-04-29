<?php

class ProductController extends \BaseController {

	public function addProduct()
	{
		$user = Sentry::getUser();
		$category_id = Input::get('category_id');
		$name = Input::get('name');
		$intro = Input::get('intro');
		$price = Input::get('price');

		$shop = Shop::where('user_id',$user->id)->first();
		$category = Category::find($category_id);

		if(!isset($category))
			return Response::json(array('errCode' => 1,'message' => '该分类不存在!'));

		if($category->shop_id != $shop->id)
			return Response::json(array('errCode' => 2,'message' => '你没有权限进行操作!'));

		$product = new Product;
		$product->name = $name;
		$product->intro = $intro;
		$product->price = $price;
		$product->category_id = $category_id;

		if($product->save())
			return Response::json(array('errCode' => 0,'message' => '创建成功!'));

		return Response::json(array('errCode' => 3,'message' => '创建失败!'));
	}

	public function updateProduct()
	{
		
	}

}