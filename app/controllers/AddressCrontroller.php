<?php

class AddressCrontroller extends \BaseController {

	public function postCreate()
	{
		$username = Input::get('username');
		$province = Input::get('province');
		$city = Input::get('city');
		$region = Input::get('region');
		$add = Input::get('address');
		$postcode = Input::get('postcode');
		$mobile = Input::get('mobile');
		$is_default = Input::get('is_default');

		$user = Sentry::getUser();

		if(isset($is_default))
			$is_default = 1;
		else
			$is_default = 0;

		$defaultAddress = Address::where('is_default',1)->first();

		if(isset($defaultAddress))
		{
			$defaultAddress->is_default = 0;
			$defaultAddress->save();
		}

		try
		{
			$address = new Address;
			$address->username = $username;
			$address->user_id = $user->id;
			$address->province = $province;
			$address->city = $city;
			$address->region = $region;
			$address->address = $add;
			$address->postcode = $postcode;
			$address->mobile = $mobile;
			$is_default->is_default = $is_default;

			if($address->save())
			{
				return Response::json(array('errCode' => 0,'message' => '创建成功!'));
			}
			else
			{
				return Response::json(array('errCode' => 1,'message' => '创建失败!'));
			}
		}
		catch(Exception $e)
		{
			return Response::json(array('errCode' => 1,'message' => '创建失败!'));
		}
	}

	public function postUpdate()
	{

	}

	public function setDefault()
	{
		$id = Input::get('id');
		$user = Sentry::getUser();

		$address = Address::find($id);

		if(!isset($address))
			return Response::json(array('errCode' => 1,'message' => '该地址不存在!'));

		if($user->id != $address->user_id)
			return Response::json(array('errCode' => 2,'message' => '你没有权限进行该操作!'));

		$defaultAddress = Address::where('is_default',1)->first();

		if(isset($defaultAddress))
		{
			$defaultAddress->is_default = 0;
			$defaultAddress->save();
		}

		$address->is_default = 1;

		if($address->save())
		{
			return Response::json(array('errCode' => 0,'message' => '设置成功!'));
		}
		else
		{
			return Response::json(array('errCode' => 3,'message' => '设置失败!'));
		}

	}

}