@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－基本信息</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/base-info.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="tradingCenter-content">
				
	</div>
@stop

@section('js')
	@parent
@stop
