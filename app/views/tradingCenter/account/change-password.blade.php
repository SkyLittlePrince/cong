@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－修改登录密码</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/change-password.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="change-password-content tradingCenter-content">
		<h3>修改登录密码</h3>
		<hr />		
		<div class="content-main">
			<div class="content-row" style="margin-bottom: 29px;">
				<img src="/images/tradingcenter/icon/2.png" width="20" height="20" />
				<span class="warning">安全提醒：请妥善保管密码！丛丛网工作人员不会以任何理由向你索取密码</span>
			</div>	
			<div class="content-row">
				<label class="label" for="email">当前密码：</label>
				<div class="content-input">
					<input type="text" id="email" name="email" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="email">设置新密码：</label>
				<div class="content-input">
					<input type="text" id="email" name="email" />
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="email">确认新密码：</label>
				<div class="content-input">
					<input type="text" id="email" name="email" />
				</div>
			</div>
			<div class="content-row">
                <a href="" class="btn" id="change-password-confirm-btn">确定</a>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
