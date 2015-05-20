@extends('layouts.master')

@section('title')
    <title>丛丛网－订单评价</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/indent-evaluation.css">
@stop

@section('body')
	@parent
	<div id="main">
		<div class="indent-top">
			<p>订单号：{{{ $indent->id }}}</p>
			<p>下单时间：{{{ $indent->created_at }}}</p>
			<p>卖家：{{{ $seller->username }}}</p>
			<p>工作室名称：{{{ $shop->name }}}</p>
		</div>
		<div class="indent-center">
			<input type="hidden" id="product-id" value="{{{$product->id}}}" />
			<div class="center-left">
				<img src="{{{ $product->avatar }}}" width="256" height="320" />
			</div>
			<div class="center-right">
				<p class="word1 point">提示：请根据对商品的满意程度给卖家打分，共五星满意度.</p>
				<div class="buyer-score point">商品评价：
				</div>
				<textarea name="content" id="content"></textarea>
				<input type="button" class="confirm" id="confirm" value="确认">
			</div>
			<div class="center-foot">
				<p>提示：如果对此次交易特别满意，还可以给卖家打赏哦！</p>
				<input type="text" class="reward-enter" id="rewardenter" placeholder="输入赏金">
				<input type="button" class="reward" id="reward" value="打赏">
			</div>
		</div>
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/indent-evaluation.js'></script>
@stop
