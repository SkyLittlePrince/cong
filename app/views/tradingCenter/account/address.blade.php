@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－邮寄地址</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/address.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="address-content tradingCenter-content">
		<h3>邮寄地址</h3>
		<hr />
		<div class="content-main">
			<div class="content-row">
				<label class="label" for="name">收件人姓名：</label>
				<div class="content-input">
					<input type="text" id="name" name="name" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="prov">寄送区域：</label>
				<div class="content-input">
					<input type="text" id="prov" name="prov" /> 省 
					<input type="text" id="city" name="city" /> 市 
					<input type="text" id="district" name="district" /> 区
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="address">详细地址：</label>
				<div class="content-input">
					<input type="text" id="address" name="address" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="zipcode">邮政编码：</label>
				<div class="content-input">
					<input type="text" id="zipcode" name="zipcode" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="phone">联系电话：</label>
				<div class="content-input">
					<input type="text" id="phone" name="phone" />
				</div>
			</div>
			<div class="content-row" style="color: #9c7240;font-size: 12px;">
				<label class="label">&nbsp</label>
				<div class="content-input">
					<input type="checkbox" id="default" name="default" /> 
					<label for="default">设为默认地址</label>
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
