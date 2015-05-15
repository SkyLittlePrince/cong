@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－交易列表</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/trading-manage/trading-list.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
	<div class="buyer-content">
	    <div class="my-order">
	    	<div class="order-banner">我的交易</div>
	    	<div class="list-banner">
                <ul>
                    <li class="info">订单号</li>
                    <li class="date">日期</li>
                    <li class="name">项目</li>
                    <li class="status">状态</li>
                </ul>
            </div>
            @foreach ($indents as $indent)
	    	<div class="one-order">
	    		<div class="order-num order-component">
	    			{{{ $indent->id }}}
	    		</div>
				<div class="order-date order-component">
					{{{ $indent->created_at }}}
				</div>
				<div class="order-pic order-component">
					<span>
						<img src="/images/common/avatar.png" alt="order-pic">
					</span>
				</div>
				<div class="order-title order-component">
					<p class="order-p">{{{ $indent["product"]["name"] }}}</p>
					<p class="price line-two">￥<span>{{{ $indent["product"]["price"] }}}</span></p>
				</div>
				<div class="order-status order-component">
					@if ($indent->status == 0)
    				<p class="order-p">未付款</p>
                    <input type="button" class="btn pay-btn" value="现在付款" /> 
                    <input type="button" class="btn cancel-btn" value="取消订单" /> 
    				@elseif ($indent->status == 1)
    				<p class="order-p">已付款</p>
    				@else
    				<p class="order-p">交易成功</p>
    				@endif 
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
    <script type="text/javascript" src='/dist/js/pages/trading-list.css'></script>
@stop
	