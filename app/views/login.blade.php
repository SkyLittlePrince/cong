@extends('layouts.master')

@section('title')
    <title>丛丛网－登录</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/login.css">
@stop

@section('body')
	@parent
	<div id="main">
		<div class="page-left">
			<img src="/images/login/login.jpg" alt="login" width="400" height="300" />
		</div>
		<div class="page-right">
			{{ Form::open(array('url' => 'user/login', 'method' => 'post')) }}
				<h2>用户登录</h2>
				<div class="login-form">
					<div class="login-item">
						<input type="text" id="loginname" name="email" placeholder="用户名：邮箱" />
					</div>
					<div class="login-item">
						<input type="password" id="password" name="password" placeholder="密码："/>
					</div>
					<div class="login-item">
						<input type="text" id="authcode" name="captcha" placeholder="验证码" maxlength="5"/>
						<span id="auth-code-status"></span>
						<img src="{{ $captcha->inline() }}" id="authcode-img" width="128" height="46" />
						<div class="clear"></div>
						<span class="change-captcha">看不清？<a href="javascript: void(0)">换张图</a></span>
					</div>
					<span class="login-tips"></span>
					<div class="login-link">
						<a href="/user/register">注册</a>
						 ／ 
						<a href="/user/forgot-password">忘记密码？</a>
					</div>
				</div>

				<input type="button" id="login-btn" value="确定" />
			{{ Form::close() }}
		</div>
		<div class="clear"></div>
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/login.js'></script>
@stop
