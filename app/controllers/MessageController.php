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
		$messageConfig = input::get("messageConfig");

		Message::where("user_id", "=", Sentry::getUser()->id)->update($messageConfig);
	}
}
