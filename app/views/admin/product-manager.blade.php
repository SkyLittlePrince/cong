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
	    	<div class="order-banner">商品数据</div>
	    	<div class="list-banner">
                <ul>
                    <li class="c_name">商品名</li>
                    <li class="c_phone">价格</li>
                    <li class="address">介绍</li>
                    <li class="more">更多信息</li>
                </ul>
            </div>
            <div class="messages">
            		@foreach($products as $product)
		<div class="one-order">
	    		<div class="order-name order-component">
	    			<span "c_name">{{$product->name}}</span>
	    		</div>
				<div class="order-phone order-component">
				<span "c_phone">{{$product->price}}</span>
				</div>
				<div class="order-address order-component">
					<span>{{$product->intro}}
					</span>
				</div>
				<div class="order-more order-component">
				<a href="product-manager-edit?id={{$product->id}}" >更多&nbsp;&nbsp;&nbsp;</a>
				<a class="del" href="deleteProduct?id={{$product->id}}" id="del-btn">删除</a>
				</div>
				
	    	</div>
	    	@endforeach            
            </div>
    
</div>
       	@if(count($products) < $products->getTotal())
       		{{$products->links();}}
       	@endif 
	   <div class="operate-btn right">
                <a href="product-manager-edit" class="one-btn btn-1" id="confirm-btn">增加数据</a>

            </div>
	</div>
</div>
         <div class="clear"></div>	
    </div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/user-manager.js'></script>
@stop
