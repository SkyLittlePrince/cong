@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－基本信息</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/bind-phone.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="phone-content tradingCenter-content">
		<h3>手机绑定</h3>
		<hr />
		<div class="content-top">
			<div class="top-img">
				<img src="/images/icon/2.png" width="30" height="30"/>
			</div>
			<p class="word1">您已完成了手机绑定</p>
			<p class="word2">您绑定的手机号是：135****1650</p>
		</div>
		<hr />
		<div class="content-bottom">
			<p>您可以享有以下服务：</p>
			<ul>
				<li>手机号码登录：可直接使用“手机号码”登陆到丛丛网</li>
				<li>重要事件提醒：进行（支付/提现/选稿/中标）时，可及时收到短信通知</li>
				<li>手机找回密码：通过手机短信快速找回登陆密码等操作</li>
				<li>账号保护：在您进行登陆及修改密码等敏感操作时，未经您授权的操作将不被允许</li>
			</ul>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
