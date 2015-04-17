@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－卖家注册</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/register.css">
@stop

@section('seller-content')
	<div class="seller-register-content seller-content">
		<div class="content-header">
			<div class="title">免费开店</div>
			<div class="text">你已完成基本会员注册进入卖家注册，为保证交易安全，丛丛网对卖家采用实名制验证，一张身份证只能开设一家店。申请到开通预计需要1～3个工作日。卖家注册申请开店流程如下：</div>
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
					<div class="content-input">
						<img class="avatar-img" src="/images/tradingcenter/icon/avatar.png" width="80" height="80" />
						<input type="button" id="avatar-btn" value="上传头像" class="btn" />
						<input type="file" id="avatar" name="avatar" class="hidden" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="store">店铺名称：</label>
					<div class="content-input">
						<input type="text" id="store" name="store" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="phone">手机号码：</label>
					<div class="content-input">
						<input type="text" id="phone" name="phone" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="age">年龄：</label>
					<div class="content-input">
						<input type="text" id="age" name="age" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="job">职业：</label>
					<div class="content-input">
						<input type="text" id="job" name="job" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="skill">技能范围：</label>
					<div class="content-input">
						<input type="text" id="skill" name="skill" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="captcha">&nbsp</label>
					<div class="content-input">
						<input type="text" id="captcha" name="captcha" placeholder="输入验证码" />
						<img src="aaa" width="115" height="35" />
					</div>
					<div class="clear"></div>
				</div>
				<div class="content-row">
					<label class="label" for="prov">&nbsp</label>
					<div class="content-input agree-wrapper">
						<input type="checkbox" name="agree" value="agree" style="display:none;">
						我同意《丛丛网用户协议》
					</div>
					<div class="clear"></div>
				</div>
			</div>

			<div class="content-right">
				<div class="content-row">
					<label class="label" for="work-experience">工作经历：</label>
					<textarea id="work-experience"></textarea>
				</div>
				<div class="content-row">
					<label class="label" for="store-desc">店铺简介：</label>
					<textarea id="store-desc" placeholder="简单介绍一下自己的店铺吧！"></textarea>
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
	<script type="text/javascript" src="/dist/js/pages/seller-register.js"></script>
@stop
