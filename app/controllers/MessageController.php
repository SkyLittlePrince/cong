<?php

class MessageController extends BaseController {

	public function create()
	{
		$title = Input::get("title");
		$content = Input::get("content");
		$receiver = Input::get("receiver");
		$type = Input::get("type", 0);

		$user = Sentry::getUser();

		$message = new Message();
		$message->title = $title;
		$message->content = $content;
		$message->receiver = $receiver;
		$message->type = $type;
		$message->status = 0;
		$message->sender = $user->id;

		$message->save();

		return Response::json(array('errCode' => 0,'newMessageId' => $message->id));
	}

	public function delete()
	{
		$messageId = Input::get("messageId");

		$message = Message::find($messageId);
		if($message->receiver == Sentry::getUser()->id) 
		{
			$message->delete();
			return Response::json(array('errCode' => 0,'message' => '删除消息成功!'));
		} 
		else 
		{
			return Response::json(array('errCode' => 1,'message' => '［权限禁止］只能删除自己收到的消息!'));
		}
	}

	public function clear()
	{
		Message::where('receiver', '=', Sentry::getUser()->id)->delete();
	
		return Response::json(array('errCode' => 0,'message' => '清空消息成功!'));
	}

	public function read()
	{
		$messageId = Input::get("messageId");
		$status = Input::get("status");

		Message::find($messageId)->update(array('status' => $status));

		return Response::json(array('errCode' => 0,'message' => ''));
	}

	public function getMessageContent()
	{
		$messageId = Input::get("messageId");

		$validator = Validator::make(
		    array('messageId' => $messageId),
		    array('messageId' => array('required', 'min:5'))
		);

		$message = Message::find($messageId);

		if($message->receiver == Sentry::getUser()->id) 
		{
			return Response::json(array('errCode' => 0,'message' => $message));
		} 
		else 
		{
			return Response::json(array('errCode' => 1,'message' => '［权限禁止］只能查看自己收到的消息内容!'));
		}
	}

	public function getMyMessages()
	{
		$messages = Message::where("receiver", "=", Sentry::getUser()->id)->get();

		return Response::json(array('errCode' => 0,'messagesList' => $messages));
	}	

	public function getNumOfUnreadMessages()
	{
		if(Sentry::check())
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$messages = DB::table('messages')->where('receiver', '=', $user_id)->where("status", "=", 0);

		if(Input::has("type"))
		{
			$type = Input::get("type");
			$messages = $messages->where("type", "=", $type);
		}

		$NumOfUnreadMessages = $messages->count();

		return Response::json(array("num" => $NumOfUnreadMessages));
	}

	public function getMessageConfig()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$messageConfig = MessageConfig::where("user_id", "=", Sentry::getUser()->id)->get();

		if(count($messageConfig) == 0)
		{
			$messageConfig = array(
				"acceptance" => 0,
				"finishConfirmed" => 0,
				"addPriceOrDelay" => 0,
				"publishSuccess" => 0,
				"publishFail" => 0,
				"nearDeadline" => 0
			);
		}
		else 
		{
			$messageConfig = array(
				"acceptance" => $messageConfig[0]->acceptance,
				"finishConfirmed" => $messageConfig[0]->finishConfirmed,
				"addPriceOrDelay" => $messageConfig[0]->addPriceOrDelay,
				"publishSuccess" => $messageConfig[0]->publishSuccess,
				"publishFail" => $messageConfig[0]->publishFail,
				"nearDeadline" => $messageConfig[0]->nearDeadline
			);
		}

		return Response::json(array('errCode' => 0,'messageConfig' => $messageConfig));
	}

	public function changeMessageConfig()
	{
		if(Sentry::check()) 
		{
			$user_id = Sentry::getUser()->id;
		} 
		else 
		{
			return Response::json(array('errCode' => 1, 'message' => '请先登录'));
		}

		$acceptance = Input::get("acceptance");
		$finishConfirmed = Input::get("finishConfirmed");
		$addPriceOrDelay = Input::get("addPriceOrDelay");
		$publishSuccess = Input::get("publishSuccess");
		$publishFail = Input::get("publishFail");
		$nearDeadline = Input::get("nearDeadline");

		$config = MessageConfig::where("user_id", "=", Sentry::getUser()->id);
		if(count($config->get()) == 0) 
		{
			$config = new MessageConfig();
			$config->user_id = $user_id;
			$config->acceptance = $acceptance;
			$config->finishConfirmed = $finishConfirmed;
			$config->addPriceOrDelay = $addPriceOrDelay;
			$config->publishSuccess = $publishSuccess;
			$config->publishFail = $publishFail;
			$config->nearDeadline = $nearDeadline;

			if(!$config->save())
			{
				return Response::json(array('errCode' => 2, 'message' => '修改失败'));
			}
		}
		else 
		{
			$config->update(array(
				"acceptance" => $acceptance,
				"finishConfirmed" => $finishConfirmed,
				"addPriceOrDelay" => $addPriceOrDelay,
				"publishSuccess" => $publishSuccess,
				"publishFail" => $publishFail,
				"nearDeadline" => $nearDeadline
			));
		}

		return Response::json(array('errCode' => 0));
	}
}
