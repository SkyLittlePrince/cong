@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－个人资料</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/user-info.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.account-left-nav')
@stop

@section('tradingCenter-content')
	
@stop

@section('js')
	@parent
@stop
