@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－消息通知</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/mynews/notification.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/checkbox/checkbox.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.mynews-left')
@stop

@section('tradingCenter-content')
   	<div class="mynews-component message-notification my-self-checkbox">
   		<div class="message-wrapper">
	   		<div class="banner">
	   			<span class="title">广告/活动(<span class="unread-message"></span>)</span>
	   		</div>
	   		<div class="operate">
                <div class="checkbox-wrapper-all"></div>         
                <div class="col-right">
    	   			<input type="button" value="标记为已读" class="mark-all" style="margin-left: 0;">
                    <input type="button" value="删除" class="delete-all">
                    <input type="button" value="清空所有消息" class="clear-all">
                </div>
	   		</div>
	   		<div class="messages">
	   			<ul>
                    @foreach ($messages as $message)
	   				<li class="one-message">
                        <div class="checkbox-wrapper"></div>         
                        <div class="col-right">
                            <input type="hidden" class="receiver-name" value="{{{$message->receiverName}}}">
                            <input type="hidden" class="sender-name" value="{{{$message->senderName}}}">
                            <input type="hidden" class="message-status" value="{{{$message->status}}}">
                            <input type="hidden" class="message-id" value="{{{ $message->id }}}" />
                            <input type="hidden" class="message-content" value="{{{ $message->content }}}" />
                            <span class="message-title status-{{{$message->status}}}">{{{ $message->title }}}</span>
                        </div>
                    </li>
                    @endforeach
	   			</ul>
	   		</div>
            @if (count($messages) < $numOfTotalItems)
                {{ $messageLinks->links() }}
            @endif
   		</div>
        <script type="text/template" id="one-message-content-template">
            <div class="one-message-content">

                <div class="message-row">
                    <label>发送者：</label>
                    <span class="sender"><%= senderName %></span>
                </div>
                <div class="message-row">
                    <label>时间：</label>
                    <span class="time"><%= created_at %></span>
                </div>
                <div class="message-row">
                    <label class="receiver">接收者：</label>
                    <span><%= receiverName %></span>
                </div>
                <div class="message-row message-content-main">
                    <span class="content"><%= content %></span>
                </div>
            </div>
        </script>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/lib/js/lodash/lodash.js"></script>
    <script type="text/javascript" src='/dist/js/pages/notification.js'></script>
@stop
