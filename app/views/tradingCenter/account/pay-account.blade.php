@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－支付账户管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/pay-account.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="pay-account-content tradingCenter-content">
		<h3>支付账户管理</h3>
		<hr />
		<div class="content-main">
			<div class="content-row">
				<img src="/images/icon/icon-exclamation.gif" width="20" height="20" />
				<span class="warning">丛丛网上所有交易由支付宝提供第三方支付担保！有效保障您的资金安全</span>
			</div>	
			<div class="content-row">
				<span class="status">状态：未激活</span>
				<input type="button" class="btn" id="active-btn" value="立即激活" />
			</div>

			<div class="content-row">
				<span class="text">丛丛网账户：Vivine</span>
				<span class="text">学号：FC634805</span>
				<br />
				<span class="text">支付宝账户：XXXXXXX</span>
			</div>

			<div class="content-row">
				<span class="balance">账户余额：¥1000.00元</span> 
				<span class="balance">不可用余额：¥0.00元</span>
			</div>

			<div class="content-row">
				<a href="" class="link">提现</a>
				<a href="" class="link">充值</a>
				<a href="" class="link">查看收支明细</a>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
