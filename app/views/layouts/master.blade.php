<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	@section('title')
	<title></title>
	@show
	<meta http-equiv="keywords" content="丛丛网">
	<meta http-equiv="description" content="丛丛网">
	@section('css')

	<link rel="stylesheet" href="/dist/css/common.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/dist/css/components.css" rel="stylesheet" type="text/css">
	@show
</head>

<body style="margin:0">
	<div id = "wrapper">
		@include('components.header')
		@section('body')
		
		@show
		@include('components.footer')
	</div>
	<!-- 聊天窗口 -->
	@if (Sentry::check())
		<input type="hidden" value="1" id="logStatus">
	@else
		<input type="hidden" value="0" id="logStatus">
	@endif

	<div id="chat-box">
		<div class="chat-banner">
			谈一谈
			<a href="javascript: void(0);" class="chat-close-btn">X</a>
		</div>
		<div class="chat-list">
			<ul class="all-chatting-user">
				<li>
					<div class="user-avatar">
						<img width="30" height="30" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg">
					</div>
					<span class="user-name">yangfusheng</span>
				</li>
				<li class="active">
					<div class="user-avatar">
						<img width="30" height="30" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg">
					</div>
					<span class="user-name">yangfusheng</span>
				</li>
				<li>
					<div class="user-avatar">
						<img width="30" height="30" src="http://7sbxao.com1.z0.glb.clouddn.com/login.jpg">
					</div>
					<span class="user-name">yangfusheng</span>
				</li>
			</ul>
		</div>
		<div class="chat-panel">
	        <div class="chat-log">
	        	<script type="text/template" id="one-message-template">
		        	<div class="one-message <%- className %>">
		        		<div class="avatar">
		        			<img src="<%- avatar %>" alt="avatar">
		        		</div>
		        		<div class="info">
			        		<span class="name"><%- name %></span>
			        		<p class="chat-message"><%- content %></p>
			        	</div>
		        	</div>
	        	</script>
	        </div>
	        <!-- <div class="chat-bar"></div> -->
	        <div class="chat-input">
	            <input type="text" id="chat-input-box" value="" placeholder="按回车键发送信息">
	            <input type="submit" id="chat-submit" class="btn" value="发送">
	        </div>
	        <div id="chat-data">
	            @if (Sentry::check())
	            <input type="hidden" name="current_user_id" value="{{{ Sentry::getUser()->id }}}" id="current-userid">
	            <input type="hidden" name="current_user_name" value="{{{ Sentry::getUser()->username }}}" id="current-username">
	            @endif
	        </div>
		</div>
    </div>

	@section('js')
	<script type="text/javascript" src='/dist/js/lib/jquery/jquery-1.11.2.min.js'></script>
	<script type="text/javascript" src='/dist/js/lib/jquery/jquery.cookie.js'></script>
	<script type="text/javascript" src='/dist/js/lib/lodash/lodash.min.js'></script>
	<script type="text/javascript" src='/dist/js/common.js'></script>
	<script type="text/javascript" src='/dist/js/components.js'></script>
	@show
</body>
<html>
