@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－基本信息</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/base-info.css">
@stop

@section('tradingCenter-left-nav')
    @include('components..left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="base-content tradingCenter-content">
		<h3>基本信息</h3>
		<hr />		
		<div class="content-main">	
			<p class="main-p1">填写真实的资料更方便大家了解你，以下信息将显示在个人主页。</p>
			<p class="main-p2">请不要在资料里面留电话，QQ，网址，邮箱等联系信息，会导致您的资料无法通过审核。</p>
			<div class="content-row">
				<label class="label">当前头像：</label>
					<div class="content-input" id="avatar-wrapper">
						<div class="content-img">
							<input type="hidden" id="avatar" value="{{{ $avatar }}}" />
                    		<img src="{{{ $avatar }}}" alt="avatar" class="person-img" id="avatarImg" />
                    	</div>
                    	<a href="javascript:void(0);" class="person-upload">
                    		<input type="file" id="revise-avatar" /> 修改头像
                    	</a>
                    </div>
                </a>
			</div>
			<div class="content-row">
				<label class="label">真实姓名：</label>
				<div class="content-input">
					<input type="text" id="realname" name="realname" value="{{{ $realname }}}" />
					<!-- <span class="name-tip red-tip">请填写真实姓名</span> -->
				</div>
			</div>
			<div class="content-row">
				<label class="label">性别:</label>
				<div class="content-input sex">
					@if ($gender == 1)
                    <input name="sex" type="radio" checked="checked" id="male" /> <label for="male" style="padding-right: 35px;">男</label>
                    <input name="sex" type="radio" id="female" /> <label for="female">女</label> 
                    @else
                    <input name="sex" type="radio" id="male" /> <label for="male" style="padding-right: 35px;">男</label>
                    <input name="sex" type="radio" checked="checked" id="female" /> <label for="female">女</label> 
                    @endif
				</div>
			</div>
			<div class="content-row">
				<label class="label">生日:</label>
				<div class="content-input">
                    <input type="text" name="year" id="year" maxlength="4" value="{{{ $birthdayYear }}}" /><span class="text"> 年</span>
                    <input type="text" name="month" id="month" maxlength="2" value="{{{ $birthdayMonth }}}" /><span class="text"> 月</span>
                    <input type="text" name="day" id="day"  maxlength="2" value="{{{ $birthdayDay }}}" /><span class="text"> 日</span>
                </div>
			</div>
			<div class="content-row">
				<label class="label" for="wechat">微信：</label>
				<div class="content-input">
					<input type="text" id="wechat" name="wechat" value="{{{ $wechat }}}" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="QQ">QQ：</label>
				<div class="content-input">
					<input type="text" id="QQ" name="QQ" value="{{{ $qq }}}" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="prov">所在地：</label>
				<div class="content-input">
					<input type="text" id="prov" name="prov" value="{{{ $province }}}" /> 省 
					<input type="text" id="city" name="city" value="{{{ $city }}}" /> 市 
					<input type="text" id="region" name="region" value="{{{ $region }}}" /> 区 
					<!-- <input type="button" value="其他" id="other-region-btn" /> -->
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="address">详细地址：</label>
				<div class="content-input">
					<input type="text" id="address" name="address" value="{{{ $address }}}" />
				</div>
			</div>
			<div class="content-row">
                <a href="javasctipt: void(0);" class="btn" id="base-info-save-btn">保存</a>
			</div>
		</div>	
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script> 
    <script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
	<script type="text/javascript" src='/dist/js/pages/base-info.js'></script>
@stop
