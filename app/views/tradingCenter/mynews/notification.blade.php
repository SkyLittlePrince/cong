@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－消息通知</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/mynews/index.css">
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
                            <input type="hidden" class="message-id" value="{{{ $message->id }}}" />
                            <input type="hidden" class="message-content" value="{{{ $message->content }}}" />
                            <span class="message-title">{{{ $message->title }}}</span>
                        </div>
                    </li>
                    @endforeach
	   			</ul>
	   		</div>
	   		<div class="pagination">
                <div class="right to-page">
                    <p>
                        共<span class="page-count">3</span>页,到第<input type="text" >页
                        <input type="button" value="确定">
                    </p>
                </div>
	   			<div class="page-num right">
                    <a href="#">
                        <img src="/images/icon/icon-arrow-left.png" alt="icon-left" width="28" height="28" />         
                    </a>
                    <span class="num active">1</span>
                    <span class="num">2</span>
                    <span class="num">3</span>
                    <a href="#">
                        <img src="/images/icon/icon-arrow-right.png" alt="icon-right" width="28" height="28" />
                    </a>
                </div>
	   		</div>
   		</div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/lib/js/lodash/lodash.js"></script>
    <script type="text/javascript" src='/dist/js/pages/index.js'></script>
@stop
