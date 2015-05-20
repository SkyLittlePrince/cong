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
		<div class="one-order">
	    		<div class="order-name order-component">
	    			<span "c_name">10086</span>
	    		</div>
				<div class="order-phone order-component">
				<span "c_phone">李先生</span>
				</div>
				<div class="order-address order-component">
					<span>统一康师傅绿茶一箱
					</span>
				</div>
				<div class="order-more order-component">
				<a href="indent-manager-edit" >更多&nbsp;&nbsp;&nbsp;</a>
				<a class="del" href="" >删除</a>
				</div>
				
	    	</div>
		<div class="one-order">
	    		<div class="order-name order-component">
	    			<span "c_name">10087</span>
	    		</div>
				<div class="order-phone order-component">
				<span "c_phone">王紫</span>
				</div>
				<div class="order-address order-component">
					<span>盒味道两桶
					</span>
				</div>
				<div class="order-more order-component">
					<a href="indent-manager-edit" >更多&nbsp;&nbsp;&nbsp;</a>
				<a class="del" href="" >删除</a>
				</div>
				
	    	</div>
               
            </div>
    
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
	   <div class="operate-btn right">
                <a href="indent-manager-edit" class="one-btn btn-1" id="confirm-btn">增加数据</a>

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
