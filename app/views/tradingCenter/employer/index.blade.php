@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－雇主首页</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/employer/index.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.employer-left')
@stop

@section('tradingCenter-content')
	<div class="employer-content">
	    <div class="my-order">
	    	<div class="order-banner">我的订单</div>
	    	<div class="one-order">
	    		<div class="order-num order-component">
	    			<p class="order-p">订单号<span>WX187369727786</span></p>	
	    		</div>
				<div class="order-date order-component">
					<p>2015.1212</p>
				</div>
				<div class="order-pic order-component">
					<span>
						<img src="/images/common/avatar.png" alt="order-pic">
					</span>
				</div>
				<div class="order-title order-component">
					<p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
					<p class="price line-two">￥<span>380</span></p>
				</div>
				<div class="order-status order-component">
					<p class="order-p">交易成功</p>
					<p class="line-two">雇主已评</p>
				</div>
	    	</div>
	    	<div class="one-order">
	    		<div class="order-num order-component">
	    			<p class="order-p">订单号<span>WX187369727786</span></p>	
	    		</div>
				<div class="order-date order-component">
					<p>2015.1212</p>
				</div>
				<div class="order-pic order-component">
					<span>
						<img src="/images/common/avatar.png" alt="order-pic">
					</span>
				</div>
				<div class="order-title order-component">
					<p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
					<p class="price line-two">￥<span>380</span></p>
				</div>
				<div class="order-status order-component">
					<p class="order-p">交易成功</p>
					<p class="line-two">雇主已评</p>
				</div>
	    	</div>
	    </div>

	    <div class="my-history">
			<div class="trade one-history left">
				<div class="banner">我和他们交易过</div>
				<div class="panel">
					<p class="message">Hi~你还没有交易过呢，快去看看哪些服务商能为你解决问题吧~</p>
					<a class="see-now" href="#">立即查看</a>
				</div>
			</div>
			<div class="trade one-history right">
				<div class="banner">我收藏的服务</div>
				<div class="panel">
					<p class="message">Hi~你还没收藏任何服务，收藏服务能让你快速找到中意的服务及服务商~</p>
					<a class="see-now" href="#">立即查看</a>
				</div>
			</div>
			<div class="trade one-history left">
				<div class="banner">我收藏的需求</div>
				<div class="panel">
					<p class="message">Hi~你还没收藏任何需求，现在去需求大厅看看吧~</p>
					<a class="see-now" href="#">立即查看</a>
				</div>
			</div>
			<div class="trade one-history right">
				<div class="banner">最近浏览的需求</div>
				<div class="panel">
					<p class="message">Hi~快去看看小伙伴们有哪些需求在这里成功得到解决~</p>
					<a class="see-now" href="#">立即查看</a>
				</div>
			</div>
	    </div>
	</div>
@stop

@section('js')
	@parent
@stop
