<?php

class ProductController extends \BaseController {

	public function addProduct()
	{
		$user = Sentry::getUser();
		$name = Input::get('name');
		$intro = Input::get('intro');
		$price = Input::get('price');
		$avatar = Input::get('avatar');

		$shop = Shop::where('user_id',$user->id)->first();

		if(!isset($shop))
		{
			return Response::json(array('errCode' => 1,'message' => '你还没有创建工作室呢!'));
		}

		if($user->id != $shop->user_id)
		{
			return Response::json(array('errCode' => 2, 'message' => '你没有操作权限!'));
		}

		$validator = Validator::make(
			array(
				'intro' => $intro,
				'price' => $price,
				'avatar' => $avatar
			),
			array(
				'intro'=>'between : 2,500',
				'price' => 'numeric',
				'avatar' =>'url'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode' => 4, "message" => "参数格式错误", "validateMes" => $validator->messages()));
		}

		$product = new Product;
		$product->name = $name;
		$product->intro = $intro;
		$product->price = $price;
		$product->shop_id = $shop->id;
		$product->avatar = $avatar;

		if($product->save())
			return Response::json(array('errCode' => 0,'product_id' => $product->id));

		return Response::json(array('errCode' => 3,'message' => '创建失败!'));
	}

	public function updateProduct()
	{
		$id = Input::get('id');
		$name = Input::get('name');
		$intro = Input::get('intro');
		$price = Input::get('price');
		$avatar = Input::get('avatar');

		$product = Product::with('shop')->find($id);
		$user = Sentry::getUser();

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		if($user->role_id != 3)
		{
			if($product->shop->user_id != $user->id)
				return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));	
		}
		

		$validator = Validator::make(
			array(
				'intro' => $intro,
				'price' => $price,
				'avatar' => $avatar
			),
			array(
				'intro'=>'between : 2,500',
				'price' => 'numeric',
				'avatar' =>'url'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode' => 4, "message" => "参数格式错误", "validateMes" => $validator->messages()));
		}

		$product->name = $name;
		$product->intro = $intro;
		$product->price = $price;
		$product->avatar = $avatar;

		if($product->save())
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
	}

	public function deleteProduct()
	{
		$user = Sentry::getUser();
		$id = Input::get('id');

		//$product = Product::with('shop','indents')->find($id);
		$product = Product::with('shop')->find($id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该产品不存在!'));

		if($product->shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		// $indents = $product->indents;
		// $content = '你对' . $product->name . '商品下的订单已被取消!';
		// $args = array();
		// foreach ($indents as $indent) {
		// 	$arg = array();
		// 	$arg['title'] = '商品下架消息';
		// 	$arg['content'] = $content;
		// 	$arg['sender'] = 8;
		// 	$arg['receiver'] = $indent->user_id;
		// 	$arg['type'] = 1;
		// 	array_push($args,$arg);
		// }
		// if(isset($args) && count($args) > 0)
		// 	DB::table('messages')->insert($args);

		if($product->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

	public function sortProductBySellNum()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请先登录!'));

		if(!Input::has("shop_id"))
			return Response::json(array('errCode' => 2,'message' => '缺少参数'));

		$shop_id = Input::get("shop_id");

		$products = DB::table('products')->where("shop_id", "=", $shop_id)->orderBy('sellNum', 'desc')->take(5)->get();

		return Response::json(array('errCode' => 0, 'products' => $products));
	}

	public function sortProductByFavorNum()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请先登录!'));

		if(!Input::has("shop_id"))
			return Response::json(array('errCode' => 2,'message' => '缺少参数'));

		$shop_id = Input::get("shop_id");

		$products = DB::table('products')->where("shop_id", "=", $shop_id)->orderBy('favorNum', 'desc')->take(5)->get();

		return Response::json(array('errCode' => 0, 'products' => $products));
	}
}





