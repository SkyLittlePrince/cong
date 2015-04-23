@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－联系方式</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/contact.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="contact-content tradingCenter-content">
		<h3>联系方式</h3>
		<hr />		
		<div class="content-main">
			
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
