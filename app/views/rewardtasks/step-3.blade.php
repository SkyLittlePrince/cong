@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/rewardtask/step-3.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')
<div id="main">
    @include('components.bountyhunterleft')
    @include('components.rewardtaskheader')
    <div class="step3 rewardtaskstep">
        <form>
            <ul>
                <li>
                    <label class="label">任务宝账户：</label>
                    <span>Vivine</span>
                </li>
                <li>
                    <label class="label">充值用途：</label>
                    <span>为全款悬赏任务<span>［922928］给公司起名</span> 充值</span>
                </li>
                <li>
                    <label class="label">当前账户余额：</label>
                    <span>7000 铜币 200银币 0金币</span>
                </li>
                <li>
                    <label class="label">任务所需金额：</label>
                    <span>1000 元</span>
                </li>
                <li>
                    <label class="label">还需充值金额：</label>
                    <span>1000 元</span>
                </li>
                <li>
                    <label class="label">充值渠道：</label>
                    <div class="banks">
                        <div class="bank-item">
                            <input type="radio" id= "cb" name="bank">
                            <label for="cb"><img src="/images/rewardtask/cb.gif" alt="cb" class="bank" width="150" height="30" /></label>
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "ccb" name="bank">
                            <label for="ccb"><img src="/images/rewardtask/ccb.gif" alt="ccb" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "cgb" name="bank">
                            <label for="cgb"><img src="/images/rewardtask/cgb.gif" alt="cgb" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "icbc" name="bank">
                            <label for="icbc"><img src="/images/rewardtask/icbc.gif" alt="icbc" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "abc" name="bank">
                            <label for="abc"><img src="/images/rewardtask/abc.gif" alt="abc" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "ibc" name="bank">
                            <label for="ibc"><img src="/images/rewardtask/ibc.gif" alt="ibc" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "sbc" name="bank">
                            <label for="sbc"><img src="/images/rewardtask/sbc.gif" alt="sbc" class="bank" width="150" height="30" />
                        </div>
                        <div class="bank-item">
                            <input type="radio" id= "alipay" name="bank">
                            <label for="alipay"><img src="/images/rewardtask/alipay.gif" alt="alipay" class="bank" width="150" height="30" />
                        </div>
                        <div class="clear"></div>
                    </div>
                </li>
            </ul>
        </form>
        <div class="next-step">
            <a href="/rewardtask/step-2" class="btn last">上一步</a>
            <a href="/rewardtask/step-4" class="btn next">下一步</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
