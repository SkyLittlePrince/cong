@extends('layouts.master')

@section('title')
    <title>丛丛网－登录</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/register.css">
@stop

@section('body')
	@parent
	<div id="main">
		<div class="register-area">
			<div class="register-steps">
				<ul class="step-title">
					<li class="active">1.设置登录名</li>
					<li>2.填写用户信息</li>
					<li>3.注册成功</li>
				</ul>
				<div class="clear"></div>
			</div>
			<div class="register-form step-1">
				<h2>注册</h2>
				<div class="register-body">
					<div class="register-items">
						<div class="register-item">
							<input type="text" id="register-email" placeholder="填写邮箱" />
						</div>
						<div class="register-item">
							<input type="text" id="auth-code" placeholder="输入验证码" />
							<span class="code-right hidden">ok</span>
							<span class="code-error hidden">no</span>
							<img src="{{ $captcha->inline() }}" id="authcode-img"  width="128" height="45" />
							<div class="clear"></div>
						</div>
						<div class="register-item" style="line-height:18px;vertical-align:top;margin-top: 30px;"> 
							<input type="checkbox" name="agree" id="agree-box" class="hidden" />
							<img src="/images/register/3.jpg" class="agree-img" width="16" height="16" />
							<img src="/images/register/4.jpg" class="disagree-img hidden" width="16" height="16" />
							<div style="margin-left:25px;">我同意《丛丛网协议》</div>
						</div>
						<span class="step1-tips"></span>
					</div>
				</div>
				<div>
					<input type="button" id="register-btn-1" value="确定" />
				</div>
			</div>
			<div class="register-form step-2 hidden">
				<h2>注册</h2>
				<div class="register-body">
					<div class="register-items">
						<div class="register-text">请填写验证码，已发送到15902094760，请勿泄露！</div>
						<div class="register-phone">手机号码：15902094760</div>
						<div class="register-authcode">
							<input type="text" id="register-authcode" placeholder="请输入验证码" />
							<div class="register-sec"><span>59</span>秒后可重新操作</div>
						</div>
					</div>
				</div>
				<div>
					<input type="button" id="register-btn-2" value="确定" />
				</div>
			</div>
			<div class="register-form step-3 hidden">
				<h2>填写用户信息</h2>
				<div class="register-body">
					<div class="register-items">
						<div class="register-item" style="margin: 10px 0px 10px 10px;">
							登录名：<span id="loginname">15902094760</span>>
						</div>
						<div class="register-item">
							<input type="text" id="register-name" placeholder="设置登录密码" />
						</div>
						<div class="register-item">
							<input type="text" id="region" placeholder="再次确认密码" />
						</div>
						<div class="register-item">
							<input type="text" id="region" placeholder="你的昵称" />
						</div>
					</div>
				</div>
				<div>
					<input type="button" id="register-btn-3" value="保存" />
					<div class="clear"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/register.js'></script>
@stop
