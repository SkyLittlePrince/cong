@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－消息通知</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/tradingCenter/mynews/messagenotification.css">
    <link rel="stylesheet" type="text/css" href="./dist/css/checkbox/checkbox.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.mynewsleft')
@stop

@section('tradingCenter-content')
   	<div class="mynews-component message-notification my-self-checkbox">
   		<div class="message-wrapper">
	   		<div class="banner">
	   			<span class="title">广告/活动(<span>2</span>)</span>
	   			<span class="status">未读/全部(<span>3</span>)</span>
	   		</div>
	   		<div class="operate">
                <label class="my-self-checkbox-label">
                    <input type="checkbox" name="message" value="all" class="select-all">
                </label>
                <div class="col-right">
    	   			<input type="button" value="标记所有为已读" class="mark-all" style="margin-left: 0;">
                    <input type="button" value="删除所有" class="delete-all">
                    <input type="button" value="清空所有" class="clear-all">
                </div>
	   		</div>
	   		<div class="messages">
	   			<ul>
	   				<li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1" style="display:hidden;">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1" style="display:hidden;">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            你秀才艺我给钱,现在正式接收报名!
                        </div>
                    </li>
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
    <script type="text/javascript" src='./dist/js/pages/messagenotification.js'></script>
@stop
