@extends('layouts.master')

@section('title')
    <title>丛丛网－登录</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/register.css">
@stop

@section('body')
@include('components.header')
<div id="wrapper">
	<div class="register-area">
		<div class="register-steps">
			<ul>
				<li>1.设置登录名</li>
				<li>2.填写用户信息</li>
				<li>3.注册成功</li>
			</ul>
			<div class="clear"></div>
		</div>
		<div class="register-form">
			<h2>注册</h2>
			<div class="register-body">
				<div class="register-items">
					<div class="register-item">
						<input type="text" id="register-name" placeholder="填写手机号／邮箱" />
					</div>
					<div class="register-item">
						<input type="text" id="region" placeholder="所在国家／地区" />
					</div>
					<div class="register-item">
						<input type="text" id="auth-code" placeholder="输入验证码" />
						<img src="aaa" id="authcode-img"  width="128" height="45" />
						<div class="clear"></div>
					</div>
					<div class="register-item" style="line-height:18px;vertical-align:top;margin-top: 30px;"> 
						<input type="checkbox" name="agree" id="agree-box" class="hidden" />
						<img src="./images/register/3.jpg" class="agree-img" width="16" height="16" />
						<img src="./images/register/4.jpg" class="disagree-img hidden" width="16" height="16" />
						<div style="margin-left:25px;">我同意《丛丛网协议》</div>
					</div>
				</div>
			</div>
			<div>
				<input type="button" id="register-btn" value="确定" />
			</div>
		</div>
		<div class="register-form">
			<h2>注册</h2>
			<div class="register-body">
				<div class="register-text">请填写验证码，已发送到15902094760，请勿泄露！</div>
				<div class="register-phone">手机号码：15902094760</div>
				<div class="register-authcode">
					<input type="text" id="register-authcode" placeholder="请输入验证码" />
					<div class="register-sec"><span>59</span>秒后可重新操作</div>
				</div>
			</div>
			<div>
				<input type="button" id="register-btn" value="确定" />
			</div>
		</div>
		<div class="register-form">
			<h2>注册</h2>
			<div class="register-body">
				<div class="register-items">
					<div class="register-item">
						<input type="text" id="register-name" placeholder="填写手机号／邮箱" />
					</div>
					<div class="register-item">
						<input type="text" id="region" placeholder="所在国家／地区" />
					</div>
					<div class="register-item">
						<input type="text" id="auth-code" placeholder="输入验证码" />
						<img src="aaa" id="authcode-img"  width="128" height="45" />
						<div class="clear"></div>
					</div>
					<div class="register-item" style="line-height:18px;vertical-align:top;margin-top: 30px;"> 
						<input type="checkbox" name="agree" id="agree-box" class="hidden" />
						<img src="./images/register/3.jpg" class="agree-img" width="16" height="16" />
						<img src="./images/register/4.jpg" class="disagree-img hidden" width="16" height="16" />
						<div style="margin-left:25px;">我同意《丛丛网协议》</div>
					</div>
				</div>
			</div>
			<div>
				<input type="button" id="register-btn" value="确定" />
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
