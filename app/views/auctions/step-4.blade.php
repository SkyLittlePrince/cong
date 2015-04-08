@extends('layouts.master')

@section('title')
    <title>倒价竞拍</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/auction/step-4.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')

<div id="main">
    @include('components.bountyhunterleft')
    @include('components.auctionheader')
    
    <div class="step2 auctionstep">
        <form>
            <ul>
                <li>
                    <label class="label">任务主题：</label>
                    <span>广州紫睿科技有限公司</span>
                </li>
                
            </ul>
        </form>
        <div class="next-step">
            <a href="/auction/step-3" class="btn last">上一步</a>
            <a href="/auction/step-5" class="btn next">现在支付</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
