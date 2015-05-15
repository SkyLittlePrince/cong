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
		{
			$content = '用户' . $user->name . '对你的' . $product->name . '商品下了订单!';
			$message = Message::create(array(
					'title' => '下单消息',
					'content' => $content,
					'sender' => 8,
					'receiver' => $product->shop->user_id,
					'type' => 1
				));
			return Response::json(array('errCode' => 0,'message' => '创建订单成功!', 'newIndentId' => $indent->id));
		}			

		return Response::json(array('errCode' => 3,'message' => '创建订单失败!'));
	}

	public function cancel()
	{
		$indentId = Input::get("indentId");
		$user = Sentry::getUser();

		$indent = Indent::with('product.shop')->find($indentId);
		if(!isset($indent))
			return Response::json(array('errCode' => 1,'message' => '该订单不存在!'));

		if($indent->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有此操作权限!'));

		if($indent->status > 0)
			return Response::json(array('errCode' => 3,'message' => '你已付款不能再取消订单!'));

		if(isset($indent->product))
		{
			$content = '用户' . $user->name . '取消了你的' . $indent->product->name . '商品的订单!';
			$receiver = $indent->product->shop->user_id;

			$message = Message::create(array(
						'title' => '取消订单消息',
						'content' => $content,
						'sender' => 8,
						'receiver' => $receiver,
						'type' => 1
					));
		}

		if($indent->delete())
		{		
			return Response::json(array('errCode' => 0,'message' => '取消订单成功!'));
		}	

		return Response::json(array('errCode' => 4,'message' => '取消订单失败!'));
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
