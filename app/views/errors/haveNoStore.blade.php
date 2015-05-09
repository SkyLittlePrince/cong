@extends('layouts.master')

@section('title')
    <title>丛丛网－出错了</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/login.css">
@stop

@section('body')
	@parent
	<div id="main">
		<p>^_^不好意思，你还没有店铺呢，点击这里去申请一个吧～</p>
	</div>
@stop

@section('js')
    @parent
@stop
