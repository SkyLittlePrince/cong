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
		$tags = Input::get('tags');

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

			foreach ($tags as $tag) {
				$Tag = Tag::firstOrCreate(array('name' => $tag));
				$shop_tag = Shop_tag::Create(array('shop_id' => $shop->id,'tag_id' => $Tag->id));
			}

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

	public function deleteTag()
	{
		$user = Sentry::getUser();
		$shop_id = Input::get('shop_id');
		$tag_id = Input::get('tag_id');

		$shop = Shop::find($shop_id);

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '该店铺不存在!'));

		if($shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		if($shop->tags()->detach($tag_id))
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));

		return Response::json(array('errCode' => 3,'message' => '删除失败!'));
	}

	public function addTag()
	{
		$user = Sentry::getUser();
		$shop_id = Input::get('shop_id');
		$name = Input::get('name');

		$shop = Shop::find($shop_id);

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '该店铺不存在!'));

		if($shop->user_id != $user->id)
			return Response::json(array('errCode' => 2,'message' => '你没有操作权限!'));

		$tag = Tag::firstOrCreate(array('name' => $name));

		if($shop->tags()->save($tag))
			return Response::json(array('errCode' => 0,'message' => '保存成功!'));

		return Response::json(array('errCode' => 3,'message' => '保存失败!'));
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