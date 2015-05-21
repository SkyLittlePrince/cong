@extends('layouts.master')

@section('title')
    <title>丛丛网－订单管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/admin/user-manager-edit.css">
@stop

@section('body')
	@parent
	<div id="main">
        @include('components.task-banner')
	@include('components.left-nav.admin-left')
       	@include('components.adminheader')

	<div class="base-content tradingCenter-content">
		<h3>详细信息/修改</h3>
		<hr />		
		<div class="content-main">	
			
			
			<div class="content-row">
				<label class="label" >订单号：</label>
				<div class="content-input">
					<input type="text" id="indentId" name="indentId" value="{{$indent->id}}"  readonly="readonly"/>
					
				</div>
			</div>
			

			<div class="content-row">
				<label class="label">创建日期：</label>
				<div class="content-input">
					<input type="text" id="createTime" name="createTime" value="{{$indent->created_at}}"  readonly="readonly" />
				</div>
			</div>
			<div class="content-row">
				<label class="label">状态：</label>
				<div class="content-input">
					<input type="text" id="status" name="status" value="{{$indent->status}}" />（0表示未付款，1表示已付款，2表示交易成功）
				</div>
			</div>
			
			<div class="content-row">
                	<a href="indent-manager" class="btn">返回上一步</a>
			</div>
		</div>	
	</div>
 <div class="clear"></div>
</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script> 
    <script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src='/dist/js/pages/user-manager-edit.js'></script>
@stop
