@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bounty-hunter.css">
@stop

@section('body')
@include('components.header')
<div id="main">
    <div id="bounty-hunter-header">
        <div class="nav" style="background-color: #f2914a;color:#fff;">发布任务</div>
        <div class="nav active">同城</div>
        <div class="nav">远程</div>
        <div class="nav">自动分配</div>
        <div class="clear"></div>
    </div>

    @include('components.bountyhunterleft')
    


    <div class="">
        
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
