@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－邮箱绑定</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/bind-email.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="bind-email-content tradingCenter-content">
		<h3>邮箱绑定</h3>
		<div class="bind-steps">
			<div id="process"></div>
		</div>
		<hr />
		<div class="content-main"></div>
	
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/bind-email.js"></script>
@stop
