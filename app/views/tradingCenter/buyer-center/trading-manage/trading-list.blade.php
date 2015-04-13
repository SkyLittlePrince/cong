@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－交易列表</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/employer/index.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
	<div class="employer-content">
	    <div class="my-order">
	    	<div class="order-banner">我的交易</div>
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
	</div>
@stop

@section('js')
	@parent
@stop
	