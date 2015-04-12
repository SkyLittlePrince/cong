@extends('layouts.master')

@section('title')
    <title>丛丛网－交易中心</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/tradingCenter/layout.css">
@stop

@section('body')
@include('components.header')
<div id="main">
    @include('components.task-banner')
    @section('left-nav')
    	@include('components.employerleft')
   	@show
   	@include('components.tradingcenterheader')
   	@section('content')
    	
    @show
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
