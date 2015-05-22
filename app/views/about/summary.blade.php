@extends('layouts.master')

@section('title')
    <title>丛丛网－公司简介</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/about/summary.css">
@stop

    

@section('body')
	<div class="left">
		@include('components.left-nav.about-left-nav')
	</div>
	<div class="summary">
		<p>丛丛网旨在打造国内一流的自由职业者交易平台，
		结合C2C+O2O模式，做到自由、简洁、全面、高效，
		为国内各行各业的自由职业者提供展示能力、
		实现价值的机会，并致力于给广大消费者带来方便快捷、
		富有创意的定制服务。</p>
	</div>
	<div class="foot"></div>
@stop

@section('js')
	@parent
	
@stop
