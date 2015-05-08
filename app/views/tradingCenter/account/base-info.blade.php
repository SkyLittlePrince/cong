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
				<label>当前头像：</label>
					<div class="content-input">
						<div class="content-img">
                    		<img src="/images/common/avatar.png" alt="fileimg" class="person-img"/>
                    	</div>
                    	<a href="javascript:;" class="person-upload">
                    		<input type="button" value="修改头像" id="revise" />
                    	</a>
                    </div>
                </a>
			</div>
			<div class="content-row">
				<label>真实姓名：</label>
				<div class="content-input">
					<input type="text" id="name" name="name" />
					<!-- <span class="name-tip red-tip">请填写真实姓名</span> -->
				</div>
			</div>
			<div class="content-row">
				<label>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;&nbsp;:</label>
				<div class="content-input sex">
                    <input name="sex" type="radio" /> <span style="padding-right: 35px;">男</span>
                    <input name="sex" type="radio" /> <span>女</span> 
				</div>
			</div>
			<div class="content-row">
				<label>生&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;:</label>
				<div class="content-input">
                        <input type="text" name="year" id="year" maxlength="4"><span class="text"> 年</span>
                        <input type="text" name="month" id="month" maxlength="2"><span class="text"> 月</span>
                        <input type="text" name="day" id="day"  maxlength="2"><span class="text"> 日</span>
                    </div>
			</div>
			<div class="content-row">
				<label for="wechat">微信：</label>
				<div class="content-input">
					<input type="text" id="wechat" name="wechat" />
				</div>
			</div>
			<div class="content-row">
				<label for="QQ">QQ：</label>
				<div class="content-input">
					<input type="text" id="QQ" name="QQ" />
				</div>
			</div>
			<div class="content-row">
				<label for="prov">所在地：</label>
				<div class="content-input">
					<input type="text" id="prov" name="prov" /> 省 
					<input type="text" id="city" name="city" /> 市 
					<input type="text" id="district" name="district" /> 区 
					<input type="button" value="其他" id="other-region-btn" />
				</div>
			</div>
			<div class="content-row">
				<label for="address">详细地址：</label>
				<div class="content-input">
					<input type="text" id="address" name="address" />
				</div>
			</div>
			<div class="content-row">
                <a href="javasctipt: void(0);" class="btn" id="contact-save-btn">保存</a>
			</div>
		</div>	
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src='/dist/js/pages/base-info.js'></script>
@stop
