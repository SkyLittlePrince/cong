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
			<tr>
			  <td>奶茶</td>
			  <td>统一集团有限公司</td>
			  <td>3000</td>
			</tr>
			<tr>
			  <td>伊利优酸乳</td>
			  <td>统一</td>
			  <td>3000</td>
			</tr>
			<tr>
			  <td>红茶</td>
			  <td>统一</td>
			  <td>3000</td>
			</tr>
		</table>
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
	
</div>

         <div class="clear"></div>	
	</div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/user-manager.js'></script>
@stop
