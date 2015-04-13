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

		</div>
	</div>
@stop

@section('js')
	@parent
@stop
