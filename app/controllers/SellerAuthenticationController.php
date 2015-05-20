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

		$errMes = array(
			'between' =>  'The length of :attribute must be between :min - :max.',
			'alpha_num' => 'The :attribute must be consist of numeric or alphabetical characters',
			'url'	=>'The :attribute must be right url of image',
			'address' =>'The :attribute must be string ',
			'different' => 'The :attribute must be different from :other',
			'integer' => 'The :attribute must be int'
			);

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
				'name' => 'between:2,15',
				'credit_id' => 'alpha_num',
				'credit_front' => 'url|different:credit_behind',
				'credit_behind' => 'url',
				'address' => 'between:2,40',
				'phone' => 'integer'
			),
			$errMes
		);

		if($validator->fails()){
			//return Response::json(array('errCode'=>4,'message'=>'参数格式错误','validateMes' =>$validator->messages()));
			$messages = $validator->messages();
			$mes = '';
			
			foreach ($messages->all() as $message) {
				$mes .= $message;
			}
			return Response::json(array('errCode'=>4,'message'=>$mes,'validateMes' =>$messages));
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

		$errMes = array(
			'between' =>  'The length of :attribute must be between :min - :max.',
			'alpha_num' => 'The :attribute must be consist of numeric or alphabetical characters',
			'url'	=>'The :attribute must be right url of image',
			'address' =>'The :attribute must be string ',
			'different' => 'The :attribute must be different from :other',
			'integer' => 'The :attribute must be int'
			);

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
				'name' => 'between:2,15',
				'credit_id' => 'alpha_num',
				'credit_front' => 'url|different:credit_behind',
				'credit_behind' => 'url',
				'address' => 'between:2,40',
				'phone' => 'integer'
			),
			$errMes
		);

		if($validator->fails()){
			//return Response::json(array('errCode'=>4,'message'=>'参数格式错误','validateMes' =>$validator->messages()));
			$messages = $validator->messages();
			$mes = '';
			
			foreach ($messages->all() as $message) {
				$mes .= $message;
			}
			return Response::json(array('errCode'=>4,'message'=>$mes,'validateMes' =>$messages));
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
		if(!Sentry::check())
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
		if(!Sentry::check())
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