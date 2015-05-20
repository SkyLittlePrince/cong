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
		<p>^_^不好意思，你没有管理员权限!</p>
	</div>
@stop

@section('js')
    @parent
@stop
