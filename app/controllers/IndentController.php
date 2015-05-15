<?php

class IndentController extends BaseController {
	
	public function create()
	{
		$product_id = Input::get("product_id");
		$user = Sentry::getUser();

		$product = Product::with('shop')->find($product_id);
		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '商品不存在!'));

		if($product->shop->user_id == $user->id)
			return Response::json(array('errCode' => 2,'message' => '不能给自己的商品下单!'));

		$indent = new Indent();
		$indent->product_id = $product_id;
		$indent->user_id = $user->id;
 		
		if($indent->save())
			return Response::json(array('errCode' => 0,'message' => '创建订单成功!', 'newIndentId' => $indent->id));

		return Response::json(array('errCode' => 3,'message' => '创建订单失败!'));
	}

	public function cancel()
	{
		$indentId = Input::get("indentId");
		$user = Sentry::getUser();

		$indent = Indent::find($indentId);
		if(!isset($indent))
			return Response::json(array('errCode' => 1,'message' => '该订单不存在!'));

		if($indent->delete())
			return Response::json(array('errCode' => 0,'message' => '取消订单成功!'));

		return Response::json(array('errCode' => 2,'message' => '取消订单失败!'));
	}

	public function getIndent()
	{
		if(!Sentry::check()) {
			return Response::json(array('errCode' => 1,'message' => '请登录!'));
		}

		$indentId = Input::get("indentId");

		$indent = Indent::find($indentId);
		if(is_null($indent)) 
		{
			return Response::json(array('errCode' => 1,'message' => "订单未找到"));
		}
		else 
		{
			return Response::json(array('errCode' => 0,'indent' => $indent));
		}
	}

	public function getMyIndents()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1,'message' => '请登录!', 'newIndentId' => $indent->id));
		
		$indents = Indent::where("user_id", "=", Sentry::getUser()->id)->get();

		return Response::json(array('errCode' => 0,'indents' => $indents));
	}
}
