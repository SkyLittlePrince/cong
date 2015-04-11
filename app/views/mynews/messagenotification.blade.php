@extends('layouts.master')

@section('title')
    <title>丛丛网－消息通知</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/mynews/messagenotification.css">
@stop

@section('body')
@include('components.header')
<div id="main">
    @include('components.task-banner')
    @include('components.employerleft')
   	@include('components.tradingcenterheader')
   	<div class="mynews-component messagenotification">
   		<div class="message-wrapper">
	   		<div class="banner">
	   			<span class="title">广告/活动(<span>2</span>)</span>
	   			<span class="status">未读/全部(<span>3</span>)</span>
	   		</div>
	   		<div class="operate">
	   			
	   		</div>
	   		<div class="messages">
	   			<ul>
	   				<li class="one-message"></li>
	   			</ul>
	   		</div>
	   		<div class="pagination">
	   			
	   		</div>
   		</div>
   	</div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
