<?php

class CategoryController extends \BaseController {

	public function indexCategory()
	{
		return Response::json(array('errCode' => 0,'data' => Category::getNestedList('name')));
	}

	public function addCategory()
	{
		$user = Sentry::getUser();
		$name = Input::get('name');
		$intro = Input::get('intro');
		$shop = Shop::where('user_id',$user->id)->first();

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '你还没有店铺!'));

		$category = Category::where('name', $name)->where('shop_id', $shop->id)->first();
		if(isset($category))
			return Response::json(array('errCode' => 1,'message' => '该分类已存在!'));

		$category = new Category(['name' => $name, 'intro' => $intro, 'shop_id' => $shop.id]);

		if($category->save())
			return Response::json(array('errCode' => 0,'message' => '创建成功!'));

		return Response::json(array('errCode' => 2, 'message' => '创建失败!'));
	}

	public function updateCategory()
	{
		$id = Input::get('id');
		$intro = Input::get('intro');
		$user = Sentry::getUser();

		$shop = Shop::where('user_id',$user->id)->first();
		$category = Category::find($id);

		if(!isset($category))
			return Response::json(array('errCode' => 1,'message' => '该分类不存在!'));

		if(!isset($shop) || $category->shop_id != $shop->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$category->intro = $intro;

		if($category->save())
			return Response::json(array('errCode' => 0,'message' => '修改成功!'));

		return Response::json(array('errCode' => 3,'message' => '修改失败!'));
	}

	public function deleteCategory()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();

		$shop = Shop::where('user_id',$user->id)->first();
		$category = Category::find($id);

		if(!isset($category))
			return Response::json(array('errCode' => 1,'message' => '该分类不存在!'));

		if(!isset($shop) || $category->shop_id != $shop->id)
			return Response::json(array('errCode' => 2,'message' => '你美柚操作的权限!'));

		if($category->delete())
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

}
