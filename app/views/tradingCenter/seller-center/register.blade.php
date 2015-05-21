@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－卖家注册</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/checkbox/checkbox.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/register.css">
@stop

@section('seller-content')
	<div class="seller-register-content seller-content">
		<div class="content-header">
			<div class="title">免费开工作室</div>
			<div class="text">你已完成基本会员注册进入卖家注册，为保证交易安全，丛丛网对卖家采用实名制验证，一张身份证只能开设一间工作室。申请到开通预计需要1～3个工作日。卖家注册申请开工作室流程如下：</div>
			<div class="steps">
				<span>1.完成基本会员注册</span>
				<span>2.填写卖家补充资料</span>
				<span>3.提交身份证明材料</span>
				<span>4.等待工作人员审核</span>
			</div>
		</div>
		<div class="content-main">
			<div class="content-left">
				<div class="content-row">
					<label class="label" for="avatar">当前头像：</label>
					<div class="content-input" id="avatar-wrapper">
						<img class="avatar-img" src="/images/tradingcenter/icon/avatar.png" width="80" height="80" />
						<input type="hidden" id="avatar-url" name="avatar" class="hidden" value="" />
						<a href="javascript:;" class="a-upload">
                            <input type="file" name="avatar-file" id="avatar-file">单击上传
                        </a>
                        <span class="image-upload-tips"></span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="store">工作室名称：</label>
					<div class="content-input">
						<input type="text" id="store" name="store"  placeholder="输入您的工作室名称" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="skill">工作室标签：</label>
					<div class="content-input">
						<input type="text" id="skill" name="skill" placeholder="用中文逗号分隔" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="prov">&nbsp</label>
					<div class="checkbox-wrapper"></div>
						我同意<a href="/agreement" target="_blank">《丛丛网用户协议》</a>
					<div class="clear"></div>
				</div>
			</div>

			<div class="content-right">
				<div class="content-row">
					<label class="label" for="store-desc">工作室简介：</label>
					<textarea id="store-desc" placeholder="简单介绍一下自己的工作室吧！"></textarea>
				</div>
			</div>
			<div class="clear"></div>
			<div class="content-bottom">
				<input type="button" id="register-confirm" class="btn" value="确定" />
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script> 
	<script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src="/dist/js/pages/seller-register.js"></script>
@stop
