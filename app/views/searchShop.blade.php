@extends('layouts.master')

@section('title')
    <title>丛丛网－店铺搜索结果</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/searchShop/searchShop.css">
@stop

@section('body')
	@parent
	<div id="main">
		<div class="list-banner">
            <ul>
                <li class="info">店铺名称</li>
                <li class="date">日期</li>
                <li class="name">项目</li>
                <li class="status">状态</li>
            </ul>
        </div>
        @foreach ($shops as $shop)
        	<div>
        		{{{ $shop->name }}}
        	</div>
        @endforeach
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/searchShop.js'></script>
@stop
