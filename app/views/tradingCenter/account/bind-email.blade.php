@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－邮箱绑定</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/bind-email.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="bind-email-content tradingCenter-content">
		<h3>邮箱绑定</h3>
		<div class="bind-steps">
			<div id="process"></div>
			<div class="steps">
				<span class="step">第一步：填写邮箱地址</span>
				<span class="step">第二步：验证邮箱</span>
				<span class="step">第三步：认证绑定</span>
				<div class="clear"></div>
			</div>
		</div>
		<hr />
		<div class="content-main">
			<div class="content-row">
				<span>请输入新的邮箱地址：</span>
				<input type="text" id="new-email" />
			</div>			
			<div class="content-row">
				<span>邮箱绑定成功后，您可以享有以下服务：</span>
				<ol>
					<li class="list">邮箱地址登录：可直接使用“邮箱地址”登录到丛丛网</li>
					<li class="list">重要事件提醒：进行（支付／提现／选稿／中标）时，可及时收到邮件提醒</li>
					<li class="list">找回账号密码：忘记密码时，可使用邮件找回密码</li>
				</ol>
			</div>
			<div class="clear"></div>
		</div>
		<hr />
		<div>
            <a href="" class="btn" id="next-step-btn">下一步</a>
		</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/bind-email.js"></script>
@stop
