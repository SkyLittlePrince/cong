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

		$validator = Validator::make(
			array(
				'name'=>$name,
				'description'=>$description,
				'avatar'=>$avatar,
				'tags'=>$tags
			),
			array(
				'name'=>'required',
				'description'=>'required |between : 2,500',
				'avatar'=>'required |url',
				'tags'=>'required |array'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode' =>4, "message" => "若有描述,字数在2-500之间,数据请填写完整!", "validateMes" => $validator->messages()));
		}

		$shop = new Shop;
		$shop->name = $name;
		$shop->description = $description;
		$shop->user_id = $user->id;
		$shop->avatar = $avatar;


		if($shop->save())
		{
			$user->role_id = 2;
			$user->save();

			$length = count($tags);
			if($length > 5)
				return Response::json(array('errCode' => 3,'message' => '创建店铺的标签不能多余5个!'));
			
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

		$validator = Validator::make(
			array(
				'description'=>$description
			),
			array(
				'description'=>'required |between : 2,500'
			)
		);
		
		if($validator->fails()){
			return Response::json(array('errCode' =>4, "message" => "若有描述,字数在2-500之间,数据请填写完整!", "validateMes" => $validator->messages()));
		}

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

		try
		{
			if($shop->tags()->save($tag))
				return Response::json(array('errCode' => 0,'tag_id' => $tag->id));

			return Response::json(array('errCode' => 4,'message' => '保存失败!'));
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 3,'message' => '标签已存在!'));
		}
	}

	public function deleteShop()
	{
		$user = Sentry::getUser();

		//$shop = Shop::where('user_id',$user->id)->with('products.indents')->first();
		$shop = Shop::where('user_id',$user->id)->first();

		if(!isset($shop))
			return Response::json(array('errCode' => 1,'message' => '店铺不存在!'));

		// $args = array();
		// foreach ($shop->products as $product) {
		// 	$content = '你对' . $product->name . '商品下的订单已被取消!';
		// 	foreach ($product->indents as $indent) {
		// 		$arg = array();
		// 		$arg['title'] = '取消订单消息';
		// 		$arg['content'] = $content;
		// 		$arg['sender'] = 8;
		// 		$arg['receiver'] = $indent->user_id;
		// 		$arg['type'] = 1;
		// 	}
		// }

		if($shop->delete())
		{
			$user->role_id = 1;
			$user->save();
			return Response::json(array('errCode' => 0,'message' => '删除成功!'));
		}

		return Response::json(array('errCode' => 2,'message' => '删除失败!'));
	}

	public function searchShop()
	{
		$keyword = Input::get('keyword');

		$numOfItemsPerPage = 8;
		$shops = DB::table('shops')
			->join('shop_tag','shops.id','=','shop_tag.shop_id')
			->join('tags','tags.id','=','shop_tag.tag_id')
			->leftjoin('products','products.shop_id','=','shops.id')
			->leftJoin('evaluations','products.id','=','evaluations.product_id')
			->select(DB::raw('shops.id,shops.name,shops.description,shops.avatar,avg(evaluations.score) as aScore,tags.name as tagName'))
			->where('tags.name','like','%'.$keyword.'%')
			->orWhere('shops.name','like','%'.$keyword.'%')
			->groupBy('shops.id')
			->orderBy(DB::raw('avg(evaluations.score)'))
			->paginate($numOfItemsPerPage);

		return View::make('searchShop', array("shops" => $shops));
	}
}