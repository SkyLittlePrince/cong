@extends('layouts.master')

@section('title')
    <title>丛丛网－数据统计</title>
@stop
@section('css')
    @parent




        <link rel="stylesheet" type="text/css" href="/dist/css/admin/product-report-buy.css">
@stop

@section('body')
	@parent
	<div id="main">
      @include('components.task-banner')
	@include('components.left-nav.admin-data-left')
       	@include('components.adminheader')
<div class="admin-component message-setting my-self-checkbox">
        <div class="message-wrapper">
            <div class="banner">
                <span class="title">购买最多</span>
            </div>
            <div class="messages">
                
                 <table WIDTH=600px >
                     <col width=33.3% />
                     <col width=33.3% />
                     <col width=33.3% />
                      <tr>
   			 <th>商品：</th>
 			 <th>商家：</th>
 			 <th>热度：</th>
		      </tr>
                    @foreach($products as $product)
			<tr>
			  <td>{{$product->name}}</td>
			  <td>{{$product->shop->name}}</td>
			  <td>{{$product->sellNum}}</td>
			</tr>
                    @endforeach
		</table>
            </div>
          
        </div>
    

        @if(count($products) < $products->getTotal())
                {{$products->links()}}
        @endif
	
</div>
         <div class="clear"></div>	
	</div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/user-manager.js'></script>
@stop
