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
	    			<span class="id">{{{ $indent->id }}}</span>
	    		</div>
				<div class="order-date order-component">
					{{{ $indent->created_at }}}
				</div>
				<div class="order-pic order-component">
					<span>
						<img src="{{{ $indent->product['avatar'] }}}" alt="order-pic">
					</span>
				</div>
				<div class="order-title order-component">
					<p class="order-p">
                        <a href="/trading-center/seller/product-detail?product_id={{{$indent['product']['id']}}}" target="_blank">{{{ $indent->product["name"] }}}</a></p>
					<p class="price line-two">￥<span>{{{ $indent->product["price"] }}}</span></p>
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
                    <input type="button" class="btn comment-btn" value="发表评价" /> 
    				@endif 
				</div>
	    	</div>
	    	@endforeach
	    </div>
	    @if (count($indents) < $numOfTotalItems)
			{{ $indents->links() }}
		@endif
	</div>
@stop

@section('js')
	@parent
    <script type="text/javascript" src='/dist/js/pages/trading-list.js'></script>
@stop
	