@extends('layouts.master')

@section('title')
    <title>丛丛网－登录</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/login.css">
@stop

@section('body')
@include('components.header')
<div id="main">
	<div class="page-left">
		<img src="./images/login/login.jpg" alt="login" width="400" height="300" />
	</div>
	<div class="page-right">
		<h2>用户登录</h2>
		<div class="login-form">
			<div class="login-item">
				<input type="text" id="loginname" placeholder="用户名：手机号／邮箱" />
			</div>
			<div class="login-item">
				<input type="password" id="password" placeholder="密码："/>
			</div>
			<div class="login-item">
				<input type="password" id="authcode" placeholder="验证码"/>
				<img src="aaa" id="authcode-img" width="128" height="46" />
				<div style="clear:both;"></div>
			</div>
			<div class="login-link">
				<a href="/register">注册</a>
				 ／ 
				<a href="/forgot-password">忘记密码？</a>
			</div>
		</div>

		<input type="button" id="login-btn" value="确定" />
	</div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop