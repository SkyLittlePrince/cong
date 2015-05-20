@extends('layouts.master')

@section('title')
    <title>丛丛网－店铺搜索结果</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/searchShop/searchShop.css">
@stop

@section('body')
	@parent
	<div id="main">
		<div class="list-banner">
            <ul>
                <li class="info">店铺名称</li>
                <li class="desc">店铺简介</li>
                <li class="tags">店铺标签</li>
                <li class="score">综合评分</li>
            </ul>
        </div>
        <div class="shops">
        	@if (count($shops) != 0)
	        	@foreach ($shops as $shop)
	        	<a href="/trading-center/seller/seller-store?shop_id={{{ $shop->id }}}" target="_blank">
		        	<div class="one-shop">
			    		<div class="shop-info shop-component">
			    			<input type="hidden" value="{{{ $shop->id }}}">
			    			<img class="shop-avatar" src="{{{ $shop->avatar }}}" width="40" height="40" />
			    			<span>{{{ $shop->name }}}</span>
			    		</div>
						<div class="shop-desc shop-component">
							{{{ $shop->description }}}
						</div>
						<div class="shop-tags shop-component">
							{{{ $shop->tagName }}}
						</div>
						<div class="shop-score shop-component">
							{{{ $shop->aScore }}}
						</div>
						<div class="clear"></div>
			    	</div>
			    </a>
	        	@endforeach
	        @else
	        	<div class="one-shop">
	        		很抱歉，没有找到您需要的店铺
	        	</div>
	        @endif
        </div>
        @if (count($shops) < $shops->getTotal())
            {{ $shops->links() }}
        @endif
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/searchShop.js'></script>
@stop
