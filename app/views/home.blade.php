@extends('layouts.master')

@section('title')
    <title>丛丛网－首页</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/home.css">
@stop

@section('body')
@include('components.header')
<div id="main">
	<div class="bg-slider"></div>
	<div class="input-wrapper">
		<div class="input-wrapper-2">
			<input type="text" id="input" value="Search here..." />
			<img src="" class="search-btn" />
			<div class="clear"></div>				
		</div>
	</div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
