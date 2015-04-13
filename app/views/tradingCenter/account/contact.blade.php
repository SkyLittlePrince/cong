@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－联系方式</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/contact.css">
@stop

@section('tradingCenter-left-nav')
    @include('components..left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="contact-content tradingCenter-content">
		<h3>联系方式</h3>
		<hr />		
		<div class="content-main">
			<div class="content-row">
				<label>电子邮箱：</label>
				<div class="content-input">
					<input type="text" id="email" name="email" />
				</div>
			</div>
			<div class="content-row">
				<label>手机号码：</label>
				<div class="content-input">
					<input type="text" id="phone" name="phone" />
				</div>
			</div>
			<div class="content-row">
				<label>微信：</label>
				<div class="content-input">
					<input type="text" id="wechat" name="wechat" />
				</div>
			</div>
			<div class="content-row">
				<label>QQ：</label>
				<div class="content-input">
					<input type="text" id="QQ" name="QQ" />
				</div>
			</div>
			<div class="content-row">
				<label>所在地：</label>
				<div class="content-input">
					<input type="text" id="prov" name="prov" /> 省 
					<input type="text" id="city" name="city" /> 市 
					<input type="text" id="district" name="district" /> 区 
					<input type="button" value="其他" id="other-region-btn" />
				</div>
			</div>
			<div class="content-row">
				<label>详细地址：</label>
				<div class="content-input">
					<input type="text" id="address" name="address" />
				</div>
			</div>
			<div class="content-row">
                <a href="" class="btn" id="contact-save-btn">保存</a>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
