@extends('layouts.master')

@section('title')
    <title>丛丛网－用户管理</title>
@stop
@section('css')
    @parent




        <link rel="stylesheet" type="text/css" href="/dist/css/admin/product-report-buy.css">
@stop

@section('body')
	@parent
	<div id="main">
        @include('components.task-banner')
	@include('components.left-nav.admin-left')
       	@include('components.adminheader')
<div class="admin-component message-setting my-self-checkbox">
        <div class="message-wrapper">
            
	<div class="my-order">
	    	<div class="order-banner">订单数据</div>
	    	<div class="list-banner">
                <ul>
                    <li class="c_name">订单号</li>
                    <li class="c_phone">订单客户</li>
                    <li class="address">订单详情</li>
                    <li class="more">更多信息</li>
                </ul>
            </div>
            <div class="messages">
            		@foreach($indents as $indent)
		<div class="one-order">
	    		<div class="order-name order-component">
	    			<span "c_name" id="ID">{{$indent->id}}</span>
	    		</div>
				<div class="order-phone order-component">
				<span "c_phone" id="username">{{$indent->user->username}}</span>
				</div>
				<div class="order-address order-component">
					@if(count($indent->products) > 0)
						<span>该商品已下架
						</span>
					@else
						<span id="name">{{$indent->products[0]->name}}
						</span>
					@endif
				</div>
				<div class="order-more order-component">
				<a href="indent-manager-edit?id={{$indent->id}}" >更多&nbsp;&nbsp;&nbsp;</a>
				<a class="del" href="javascript:void(0);" id="del-btn" >删除</a>
				</div>
				
	    	</div>
		@endforeach
               
            </div>
    
</div>
       	@if(count($indents) < $indents->getTotal())
       		{{$indents->links()}}
       	@endif

	</div>
</div>
         <div class="clear"></div>	
    </div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/indent-manager-edit.js'></script>
@stop
