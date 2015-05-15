@extends('layouts.master')

@section('title')
    <title>丛丛网－出错了</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/login.css">
    <style type="text/css">
     	#main a {
     		text-decoration: underline;
     	}
    </style>
@stop

@section('body')
	@parent
	<div id="main">
		<p>^_^不好意思，你还没有店铺呢，点击<a href="/trading-center/seller/register">这里</a>去申请一个吧～</p>
	</div>
@stop

@section('js')
    @parent
@stop
