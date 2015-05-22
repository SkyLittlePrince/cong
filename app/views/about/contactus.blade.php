@extends('layouts.master')

@section('title')
    <title>丛丛网－公司简介</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/about/contactus.css">
@stop

    

@section('body')
	<div class="left">
		@include('components.left-nav.about-left-nav')
	</div>
	<div class="contact">
		<p class="first">在线客服:【在线聊天工具按钮】<span>（在班时间：9：00~17:：00）</span></p>
		<p>简介：<span>在线客服为会员提供以下业务的专业咨询。</span></p>
		<p class="seller">卖家 - <span>开店设置、商品问题、订单管理、消保咨询</span></p>
		<p class="seller">卖家 - <span>店铺管理工具、旺铺装修、营销工具咨询</span></p>
		<p class="seller">买家 - <span>挑选商品、购买付款、交易查询、活动咨询</span></p>
		<div class="contact-us">
			<p class="phone">客服热线电话：<span>xxx-xxxxxxx </span></p>
			<p>服务邮箱：<span>xyounv@sina.com</span></p>
		</div>
		<p>寄信地址：<span>广东省广州市天河区珠江新城金穗路1号16楼311室</span></p>
		<p>收信人：<span>广州翊升网络科技有限公司</span></p>

	</div>
	<div class="foot"></div>
@stop

@section('js')
	@parent
	
@stop
