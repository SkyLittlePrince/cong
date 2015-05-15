@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－账号设置</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/index.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="index-content tradingCenter-content">
		<h3>昵称: {{{ $username }}}</h3>
		<hr />		
		<div class="content-main">
			<div class="content-left">
				<!-- <div class="content-row">
					<div class="title">
						我的账号安全级别：
					</div>
					<div class="text">
						为了更好的保护您的交易安全，建议您通过以下方式提高安全级别：<br />
						<a href="" class="protect-btn">开通账号登录保护</a> <a href="" class="protect-btn">开通密码修改保护</a>
					</div>
				</div> -->
				<div class="content-row">
					<div class="title">
						<span class="balance">账户余额：¥100元</span>
						<span class="balance">可用余额：¥100元</span>
						<span class="balance">不可用余额：¥100元</span>
					</div>
					<div>
						<!-- <a href="" class="link">提现</a> -->
						<!-- <a href="" class="link">充值</a> -->
						<a href="" class="link">查看收支明细</a>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<!-- <div class="title">手机绑定</div> -->
					<!-- <div class="text">已绑定手机号码：139****1650</div> -->
					<div class="title">邮箱绑定</div>
					<div class="text">已绑定邮箱：{{{ $email }}}</div>
					<!-- <div class="text">你在丛丛网还是黑户哦，作为一个有身份的人，没有身份认证怎么行！</div> -->
					<!-- <div class="bind-btn">马上绑定</div> -->
				</div>
				<div class="content-row">
					<div class="title">
						<span>当前诚信度：100分</span> 
						<span>冻结举报诚信度：0分</span> 
						<span>信用状态：良好</span>
					</div>
				<!-- 	<div>
						<a href="" class="link">查看我的诚信度</a>
					</div> -->
					<div class="clear"></div>
				</div>				
			</div>
			<!-- <div class="content-right">
				<div class="avatar">
					<img src="/images/tradingcenter/icon/avatar.png" width="107" height="107" />
				</div>
				<div class="avatar">
					<img src="/images/tradingcenter/icon/avatar.png" width="107" height="107" />
				</div>
			</div> -->
			<div class="clear"></div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
