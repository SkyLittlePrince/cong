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
			<p>订单号WX0386526238736</p>
			<p>2014.12.25</p>
			<p>卖家：Vivine</p>
			<p>学号FC634805</p>
		</div>
		<div class="indent-center">
			<div class="center-left">
				<img src="/images/tradingcenter/buyer/comment.png" />
			</div>
			<div class="center-right">
				<p class="word1 point">提示：请根据对商品的满意程度给卖家打分，共五星满意度.</p>
				<div class="point">
					<span class="word2">商品和描述相符：</span>
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
				</div>
				<div class="point">
					<span class="word2">卖家的服务态度：</span>
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
				</div>
				<div class="point">
					<span class="word2">卖家的工作效率：</span>
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
					<img src="/images/tradingcenter/icon/star.png" />
				</div>
				<p class="word1 point">提示：请根据对商品的满意程度给商品进行评价或添加内容描述。</p>
				<div  class="point">
					<span class="word2">评价内容：</span>
					<input type="radio" class="assess" name="assess"/><span>好评</span>
					<input type="radio" class="assess" name="assess"/><span>中评</span>
					<input type="radio" class="assess" name="assess"/><span>差评</span>
				</div>
					<input type="text" id="appraise" name="appraise">
					<input type="button" class="confirm" id="confirm" value="确认">
			</div>
			<div class="center-foot">
				<p>提示：如果对此次交易特别满意，还可以给卖家打赏哦！</p>
				<input type="button" class="reward-enter" id="reward-enter" value="输入赏金">
				<input type="radio" class="evaluate" name="evaluate"/><span>好评</span>
				<input type="radio" class="evaluate" name="evaluate"/><span>中评</span>
				<input type="radio" class="evaluate" name="evaluate"/><span>差评</span>
				<input type="button" class="reward" id="reward" value="打赏">
			</div>
		</div>
	</div>
@stop

@section('js')
    @parent
@stop
