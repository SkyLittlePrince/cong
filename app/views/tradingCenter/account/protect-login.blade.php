@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－账号登录保护</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/protect-login.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="protect-login-content tradingCenter-content">
		<h3>账号登录保护</h3>
		<hr />		
		<div class="content-main">
			<div class="content-row" style="margin-bottom: 29px;">
				<img src="/images/tradingcenter/icon/2.png" width="20" height="20" />
				<span class="warning">当你设置账号登录保护后，任何异常的登录行为，都不会被允许，只有在经过您的手机验证通过后方可登录成功</span>
			</div>	
			<div class="content-row">
				<span class="text">状态：未开通</span>
                <a href="" class="btn" id="protect-login-confirm-btn">立即开通</a>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
