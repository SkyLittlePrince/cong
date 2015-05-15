@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－我的订单</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/my-indents.css">
@stop

@section('seller-content')
    <div class="my-indents-content seller-content">
        <div class="indent-header">
         	<p>成功完成10笔交易可以成为“任务达人”，获得勋章显示在名字旁。成功完成50笔交易可以成为“任务大侠”</p>
        </div>
	    <div class="order-list">
            @foreach ($indents as $indent)
	    	<div class="one-order">
	    		<div class="info">
                    <div class="checkbox-wrapper"></div>           
	                <span class="date">{{{ $indent->create_time }}}</span> 
	                <span class="order-number">订单号: <span>{{{ $indent-id }}}</span></span>
	    		</div>
	    		<div class="detail">
                    <div class="img detail-component">
		    			<img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
	    			</div>       
	    			<div class="title detail-component">
	    				<p>{{{ $indent["product"]["name"] }}}</p>
	    			</div>
	    			<div class="price detail-component">
	    				￥<span>{{{ $indenx["product"]["price"] }}}</span>
	    			</div>
	    			<div class="status detail-component">
	    				@if ($status == 0)
	    				<p>未付款</p>
	    				@elseif ($status == 1)
	    				<p>已付款</p>
	    				@else
	    				<p>交易成功</p>
	    				@endif 
	    			</div>
	    		</div>
	    	</div>
	    	@endforeach
	    </div>
        <div class="pagination">
                <div class="right to-page">
                    <p>
                        共<span class="page-count">3</span>页,到第<input type="text" >页
                        <input type="button" value="确定">
                    </p>
                </div>
	   			<div class="page-num right">
                    <a href="#">
                        <img src="/images/icon/icon-arrow-left.png" alt="icon-left" width="28" height="28" />         
                    </a>
                    <span class="num active">1</span>
                    <span class="num">2</span>
                    <span class="num">3</span>
                    <a href="#">
                        <img src="/images/icon/icon-arrow-right.png" alt="icon-right" width="28" height="28" />
                    </a>
                </div>
	   		</div>
    </div>
@stop
@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/my-indents.js"></script>
@stop

