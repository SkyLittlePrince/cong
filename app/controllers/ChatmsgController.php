<?php

class ChatmsgController extends BaseController {

  // 添加聊天记录
  public function create()
  {
    $content = Input::get('content');
    $receiver = Input::get('receiver');

    $user = Sentry::getUser();

    $chatmsg = new Chatmsg();
    $chatmsg->content = $content;
    $chatmsg->receiver = $receiver;
    $chatmsg->status = 0;
    $chatmsg->sender = $user->id;

    $chatmsg->save();

    return Response::json(array('errCode' => 0,'newChatmsgId' => $chatmsg->id));
  }

  // 删除单条消息
  public function delete()
  {
    $chatmsgId = Input::get('chatmsgId');
    $chatmsg = Chatmsg::find($chatmsgId);
    if($chatmsg->receiver == Sentry::getUser()->id)
    {
      $chatmsg->delete();
      return Response::json(array('errCode' => 0,'chatmsg' => '删除消息成功!'));
    }
    else
    {
      return Response::json(array('errCode' => 1,'chatmsg' => '［权限禁止］只能删除自己收到的消息!'));
    }
  }

  // 清空消息
  public function clear()
  {
    Chatmsg::where('receiver', '=', Sentry::getUser()->id)->delete();

    return Response::json(array('errCode' => 0,'chatmsg' => '清空消息成功!'));
  }

  // 标记消息已读
  public function read()
  {
    $chatmsgId = Input::get('chatmsgId');
    $status = Input::get('status');
    Chatmsg::find($chatmsgId)->update(array('status' => $status));
    return Response::json(array('errCode' => 0,'chatmsg' => '标记消息已读'));
  }

  public function getMyChatmsgs()
  {
    $chatmsgs = Chatmsg::where('receiver', '=', Sentry::getUser()->id)->get();
    return Response::json(array('errCode' => 0, 'chatmsgList' => $chatmsgs));
  }

  // 未读消息数
  public function getNumOfUnreadChatmsgs()
  {
    if(Sentry::check()) {
      $user_id = Sentry::getUser()->id;
    } else {
      return Response::json(array('errCode' => 1, 'message' => '请先登录'));
    }

    $chatmsgs = DB::table('chatmsgs')->where('receiver', '=', $user_id)->where('status', '=', 0);

    $numOfUnreadMessages = $chatmsgs->count();

    return Response::json(array('errCode' => 0, 'numOfUnreadMessages' => $numOfUnreadMessages));
  }
}
