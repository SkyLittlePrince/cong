@extends('layouts.master')

@section('title')
    <title>丛丛网－商品管理</title>
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
				<label class="label">产品图像：</label>
					<div class="content-input" id="avatar-wrapper">
						<div class="content-img">
							<input type="hidden" id="avatar" value="图像" />
                    		<img src="" alt="avatar" class="person-img" id="avatarImg" />
                    	</div>
                    	<a href="javascript:void(0);" class="person-upload">
                    		<input type="file" id="revise-avatar" /> 修改图像
                    	</a>
                    </div>
                </a>
			</div>
			<div class="content-row">
				<label class="label">商品名称：</label>
				<div class="content-input">
					<input type="text" id="name" name="name" value="康师傅绿茶" />

				</div>
			</div>
			
			<div class="content-row">
				<label class="label">价格:</label>
				<div class="content-input">
                    <input type="text"  id="price" name="price" value="10" />
                    
                </div>
			</div>
			<div class="content-row">
				<label class="label">商品介绍：</label>
				<div class="content-input">
					<input type="text" id="intro" name="intro" value="一瓶绿茶" />
				</div>
			</div>
			<div class="content-row">
				<label class="label">所属商店：</label>
				<div class="content-input">
					<input type="text" id="shop_id" name="shop_id" value="姑娘走过的店" />
				</div>
			</div>
			
			<div class="content-row">
                <a href="javasctipt: void(0);" class="btn" id="base-info-save-btn">修改</a>
                <a href="product-manager" class="btn">返回上一步</a>
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
