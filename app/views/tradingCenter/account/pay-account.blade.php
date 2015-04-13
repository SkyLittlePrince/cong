@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－支付账户管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/pay-account.css">
@stop

@section('tradingCenter-left-nav')
    @include('components..left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	
@stop

@section('js')
	@parent
@stop
