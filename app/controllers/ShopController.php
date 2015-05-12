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
		$avatar = Input::get('avatar');
		$tags = Input::get('tags');

		if($user->role_id == 2)
			return Response::json(array('errCode' => 1,'message' => '你已拥有店铺!'));

		$shop = new Shop;
		$shop->name = $name;
		$shop->description = $description;
		$shop->user_id = $user->id;
		$shop->avatar = $avatar;


		if($shop->save())
		{
			$user->role_id = 2;
			$user->save();

			foreach ($tags as $tag) {
				$Tag = Tag::firstOrCreate(array('name' => $tag));
				$shop_tag = ShopTag::firstOrCreate(array('shop_id' => $shop->id,'tag_id' => $Tag->id));
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
		{
			$user->role_id = 1;
			$user->save();
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));
		}

		return Response::json(array('errCode' => 2,'message' => '删除失败!'));
	}

	public function searchShopByTag()
	{
		$name = Input::get('name');

		$shop = DB::table('shops')
			->join('shop_tag','shops.id','=','shop_tag.user_id')
			->join('tags','tags.id','=','shop_tag.tag_id')
			->join('scores','shops.id','=','scores.shop_id')
			->select('shops.id','shops.name','shops.description','shops.avatar')
			->where('tags.name','like','%'.$name.'%')
			->groupBy('shops.id')
			->orderBy(DB::raw('avg(scores.score)'))
			->get();

		return Response::json(array('errCode' => 0,'shop' => $shop));
	}
}