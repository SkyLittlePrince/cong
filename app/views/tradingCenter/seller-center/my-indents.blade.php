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
	                <span class="date">{{{ $indent->created_at }}}</span> 
	                <span class="order-number">订单号: <span>{{{ $indent->id }}}</span></span>
	    		</div>
	    		<div class="detail">
                    <div class="img detail-component">
		    			<img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
	    			</div>       
	    			<div class="title detail-component">
	    				<p>{{{ $indent->products[0]->name}}}</p>
	    			</div>
	    			<div class="price detail-component">
	    				￥<span>{{{ $indent->products[0]->price }}}</span>
	    			</div>
	    			<div class="status detail-component">
	    				@if ($indent->status == 0)
	    				<p>未付款</p>
	    				@elseif ($indent->status == 1)
	    				<p>已付款</p>
	    				@else
	    				<p>交易成功</p>
	    				@endif 
	    			</div>
	    		</div>
	    	</div>
	    	@endforeach
	    </div>
	    @if (count($indents) < $indents->getTotal())
	    	{{$indents->links()}}
	    @endif
       <!-- <div class="pagination">
				<ul class="links">
					<li class="unavailable">
						<span>
							<img src="/images/icon/icon-arrow-left.png" alt="icon-left" width="28" height="28">
						</span>
					</li>
					<li class="current">
						<span class="num active">1</span>
					</li>
					<li>
						<a class="num" href="http://cong.laravel.com/trading-center/buyer/trading-list?page=2">2</a>
					</li>
					<li>
						<a class="num" href="http://cong.laravel.com/trading-center/buyer/trading-list?page=2"><img src="/images/icon/icon-arrow-right.png" alt="icon-right" width="28" height="28"></a>
					</li>
	   			</ul>
                <div class="to-page">
	   				<div class="right to-page">
	   					<p>
	   						跳转到第 <input class="to-page-input" type="text"> 页
	   						<input type="button" class="to-page-btn btn" value="确定">
	   					</p>
	   				</div>	
	   			</div>
                <div class="clear"></div>
	   		</div>
	   	-->
    </div>
@stop
@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/my-indents.js"></script>
@stop

