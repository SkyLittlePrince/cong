@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/rewardtask/step-2.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')
<div id="main">
    @include('components.bountyhunterleft')
    @include('components.rewardtaskheader')
    <div class="step2 rewardtaskstep">
        <div class="step-detail">
            <div class="pic">
                <div class="one-pic">
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                </div>
                <div class="one-pic">
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                    <img src="/images/rewardtask/fileimg2.gif" alt="fileimg" class="fileimg" width="99" height="99" />
                </div>
            </div>
            <div class="clear"></div>
            <div class="detail">
                <p>任务主题: <span>给XXX有限公司做logo</span></p>
                <p>赏金价格: <span>1000</span>元(人民币)  <span>50银币</span></p>
                <p>截止时间: <span>2015年3月27日17时</span></p>
                <p>中标人数: <span>单人</span></p>
            </div>
        </div>
        
        <div class="money">
            <p>请支付: <span>1000元</span> <span>50银币</span></p>
        </div>

        <div class="next-step">
            <a href="/rewardtask/step-1" class="btn last">上一步</a>
            <a href="/rewardtask/step-3" class="btn next">现在支付</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
