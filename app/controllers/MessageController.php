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

	public function getMessageConfig()
	{
		$messageConfig = MessageConfig::where("user_id", "=", Sentry::getUser()->id)->get();

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

		$messageConfig = input::get("messageConfig");

		$config = MessageConfig::where("user_id", "=", Sentry::getUser()->id);
		if(count($config->get()) == 0) 
		{
			$config = new MessageConfig();
			$config->acceptance = $messageConfig["acceptance"];
			$config->finishConfirmed = $messageConfig["finishConfirmed"];
			$config->addPriceOrDelay = $messageConfig["addPriceOrDelay"];
			$config->publishSuccess = $messageConfig["publishSuccess"];
			$config->publishFail = $messageConfig["publishFail"];
			$config->nearDeadline = $messageConfig["nearDeadline"];

			if(!$config->save())
			{
				return Response::json(array('errCode' => 2, 'message' => '修改失败'));
			}
		}
		else 
		{
			$config->update($messageConfig);
		}

		return Response::json(array('errCode' => 0));
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

		$NumOfUnreadMessages = DB::table('messages')->where('receiver', '=', $user_id)->where("status", "=", 0)->count();

		return Response::json(array("num" => $NumOfUnreadMessages));
	}
}
