<?php

class SellerAuthenticationController extends \BaseController {

	public function create()
	{
		if(!Sentry::check())
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));

		$user_id = Sentry::getUser()->id;
		$name = Input::get('name');
		$credit_id = Input::get('credit_id');
		$credit_front = Input::get('credit_front');
		$credit_behind = Input::get('credit_behind');
		$gender = Input::get('gender');
		$address = Input::get('address');
		$phone = Input::get('phone');

		$validator = Validator::make(
			array(
				'name' => $name,
				'credit_id' => $credit_id,
				'credit_front' => $credit_front,
				'credit_behind' => $credit_behind,
				'address' => $address,
				'phone' => $phone
			),
			array(
				'name' => 'required|between:2,15',
				'credit_id' => 'required|alpha_num',
				'credit_front' => 'required|url|different:credit_behind',
				'credit_behind' => 'required|url',
				'address' => 'required|between:2,40',
				'phone' => 'required|integer'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode'=>4,'message'=>'参数格式错误','validateMes' =>$validator->messages()));
		}

		$sellerAuthentication = new Authentication();
		$sellerAuthentication->user_id = $user_id;
		$sellerAuthentication->name = $name;
		$sellerAuthentication->credit_id = $credit_id;
		$sellerAuthentication->credit_front = $credit_front;
		$sellerAuthentication->credit_behind = $credit_behind;
		$sellerAuthentication->gender = $gender;
		$sellerAuthentication->address = $address;
		$sellerAuthentication->phone = $phone;

		if(!$sellerAuthentication->save())
			return Response::json(array('errCode' => 3,'message' => '认证信息提交失败!'));

		return Response::json(array('errCode' => 0,'message' => '认证信息提交成功!', 'newAuthenticationId' => $sellerAuthentication->id));
	}

	public function update()
	{
		$id = Input::get("id");

		$sellerAuthentication = Authentication::find($id);

		if($sellerAuthentication->status != -1)
		{
			return Response::json(array('errCode' => 1,'message' => '认证信息修改失败!'));
		}

		$name = Input::get('name');
		$credit_id = Input::get('credit_id');
		$credit_front = Input::get('credit_front');
		$credit_behind = Input::get('credit_behind');
		$gender = Input::get('gender');
		$address = Input::get('address');
		$phone = Input::get('phone');

		$validator = Validator::make(
			array(
				'name' => $name,
				'credit_id' => $credit_id,
				'credit_front' => $credit_front,
				'credit_behind' => $credit_behind,
				'address' => $address,
				'phone' => $phone
			),
			array(
				'name' => 'required|between:2,15',
				'credit_id' => 'required|alpha_num',
				'credit_front' => 'required|url|different:credit_behind',
				'credit_behind' => 'required|url',
				'address' => 'required|between:2,40',
				'phone' => 'required|integer'
			)
		);

		if($validator->fails()){
			return Response::json(array('errCode'=>4,'message'=>'参数格式错误','validateMes' =>$validator->messages()));
		}

		$sellerAuthentication->name = $name;
		$sellerAuthentication->credit_id = $credit_id;
		$sellerAuthentication->credit_front = $credit_front;
		$sellerAuthentication->credit_behind = $credit_behind;
		$sellerAuthentication->gender = $gender;
		$sellerAuthentication->address = $address;
		$sellerAuthentication->phone = $phone;
		$sellerAuthentication->status = 0;
		$sellerAuthentication->fail_reason = "";

		if(!$sellerAuthentication->save())
			return Response::json(array('errCode' => 3,'message' => '认证信息修改失败!'));

		return Response::json(array('errCode' => 0,'message' => '认证信息修改成功!'));
	}

	public function pass()
	{
		if(Sentry::check())
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));

		$id = Input::get("id");

		$sellerAuthentication = Authentication::find($id);

		$sellerAuthentication->status = 1;

		if(!$sellerAuthentication->save())
			return Response::json(array('errCode' => 3,'message' => '审批失败!'));

		return Response::json(array('errCode' => 0,'message' => '审批成功!'));
	}

	public function fail()
	{
		if(Sentry::check())
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));

		$id = Input::get("id");
		$fail_reason = Input::get("fail_reason");

		$sellerAuthentication = Authentication::find($id);

		$sellerAuthentication->status = -1;
		$sellerAuthentication->fail_reason = $fail_reason;

		if(!$sellerAuthentication->save())
			return Response::json(array('errCode' => 3,'message' => '审批失败!'));

		return Response::json(array('errCode' => 0,'message' => '审批成功!'));
	}
}