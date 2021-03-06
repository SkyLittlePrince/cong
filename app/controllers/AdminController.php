<?php

class AdminController extends \BaseController {

	public function updateIndent()
	{
		$status = Input::get('status');
		$id = Input::get('id');

		$indent = Indent::find($id);

		if(!isset($indent))
			return Response::json(array('errCode' => 1,'message' => '该订单不存在!'));

		$status = intval($status);
		if(0 > $status || $status > 2)
			return Response::json(array('errCode' => 2,'message' => '订单状态有误!'));

		$indent->status = $status;

		if($indent->save())
			return Response::json(array('errCode' => 0,'message' => '修改成功!'));

		return Response::json(array('errCode' => 3,'message' => '修改失败!'));

	}

	public function deleteUser()
	{
		$id = Input::get('id');

		$user = User::find($id);

		if(!isset($user))
			return Response::json(array('errCode' => 1,'message' => '该用户不存在!'));

		if($user->role_id == 3)
			return Response::json(array('errCode' => 2,'message' => '不能删除管理员!'));

		if($user->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

	public function deleteIndent()
	{
		$id = Input::get('id');
		$indent = Indent::find($id);

		if(!isset($indent))
			return Response::json(array('errCode' => 1,'message' => '该订单不存在!'));

		if($indent->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 2,'message' => '删除失败!'));
	}

	public function deleteProduct()
	{
		$id = Input::get('id');
		$product = Product::find($id);

		if(!isset($product))
			return Response::json(array('errCode' => 1,'message' => '该商品不存在!'));

		if($product->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 2,'message' => '删除失败!'));
	}

}