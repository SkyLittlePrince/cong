@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－身份认证</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/authentication.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.account-left-nav')
@stop

@section('tradingCenter-content')
	
@stop

@section('js')
	@parent
@stop
