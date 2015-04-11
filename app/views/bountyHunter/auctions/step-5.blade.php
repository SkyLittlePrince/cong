@extends('layouts.master')

@section('title')
    <title>倒价竞拍</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/auction/step-5.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')

<div id="main">
    @include('components.bountyhunterleft')
    @include('components.auctionheader')
    
    <div class="step5 auctionstep">
        <div class="success">
            <p>任务发布成功</p>
        </div>
        <div class="next-step">
            <a href="/rewardtask" class="btn return">返回赏金猎人</a>
            <a href="/" class="btn next">返回首页</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
