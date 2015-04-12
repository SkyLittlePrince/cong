@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/rewardtask/step-4.css">
@stop

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')
        @include('components.bountyhunterleft')
        @include('components.rewardtaskheader')
        <div class="step4 rewardtaskstep">
            <div class="detail">
                <form>
                    <ul>
                        <li class="title">
                            <label for="title">支付金额:</label>
                            <span>1000</span>元
                        </li>
                        <li class="cardnumber">
                            <label for="cardnumber">银行卡号:</label>
                            <input type="text" name="cardnumber" id="cardnumber">
                        </li>
                        <li class="password">
                            <label for="password">赏金价格:</label>
                            <input type="password" name="password" id="password" class="password" max-length="16">
                            <br/ >
                            <input type="text" name="verification-code" id="verification-code" class="verification-code">
                            <span class="code">1314</span>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="next-step">
                <a href="/bounty-hunter/reward-task?step=3" class="btn last">上一步</a>
                <a href="/bounty-hunter/reward-task?step=5" class="btn next">下一步</a>
            </div>
        </div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
