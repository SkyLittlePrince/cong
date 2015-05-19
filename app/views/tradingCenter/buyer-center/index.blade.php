@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－个人中心</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/index.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
	<div class="buyer-content">
	    <div class="my-order">
	    	<div class="order-banner">我的订单</div>
            @foreach ($indents as $indent)
	    	<div class="one-order">
	    		<div class="order-num order-component">
	    			<p class="order-p">订单号：<span class="id">{{{ $indent->id }}}</span></p>	
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
					<p class="order-p">
						<a href="{{{ $indent->product['id'] }}}" target="_blank">{{{ $indent->product["name"] }}}</a>
					</p>
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
    				@endif
				</div>
	    	</div>
	    	@endforeach
	    	@if (count($indents) < $numOfTotalItems)
	        	{{ $indents->links() }}
	        @endif
	    </div>

	    <div class="my-history">
			<div class="trade one-history left">
				<div class="banner">我和他们交易过</div>
				<div class="panel">
					@if (!isset($recentSeller) && count($recentSeller) == 0)
					<p class="message">Hi~你还没有交易过呢，快去看看哪些服务商能为你解决问题吧~</p>
					<a class="see-now" href="#">立即查看</a>
					@else

					@endif
				</div>
			</div>
			<!-- <div class="trade one-history right">
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
			</div> -->
			<div class="trade one-history right">
				<div class="banner">最近购买的商品</div>
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
    <script type="text/javascript" src='/dist/js/pages/buyer-index.js'></script>
@stop
