@extends('layouts.master')

@section('title')
    <title>丛丛网－数据统计</title>
@stop
@section('css')
    @parent

        <link rel="stylesheet" type="text/css" href="/dist/css/admin/product-report-visit.css">



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
                <span class="title">浏览最多</span>
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
                                        @foreach($shops as $shop)
			<tr>
                                            @if(count($shop->products) > 0)
			  <td>{{$shop->products[0]->name}}</td>
                                            @else
                                            <td>该商家所有商品都已下架</td>
                                            @endif
			  <td>{{$shop->name}}</td>
			  <td>{{$shop->visitNum}}</td>
			</tr>
                                        @endforeach
		</table>
            </div>
          
        </div>
    
     @if(count($shops) < $shops->getTotal())
                    {{$shops->links()}}
     @endif
	
</div>

         <div class="clear"></div>	
	</div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/user-manager.js'></script>
@stop
