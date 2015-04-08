@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/rewardtask3.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')
<div id="main">
    @include('components.bountyhunterleft')
    @include('components.rewardtaskheader')
    <div class="step3 rewardtaskstep">
        <div class="detail">
            <p><label>任务宝账户: </label>&nbsp<span>Vivine</span></p>
            <p><label>充值用途: </label>&nbsp为全款悬赏任务 [<span>922928</span>] 给公司起名 充值</p>
            <p><label>当前账户余额: </label>&nbsp<span>700铜币</span> <span>200银币</span> <span>0金币</span></p>
            <p><label>任务所需金额: </label>&nbsp<span>1000</span>元</p>
            <p><label>还需充值金额: </label>&nbsp<span>1000</span>元</p>
            <p><label>充值渠道:</label></p>
            <form>
                <ul>
                    <li>
                        <input type="radio" id= "cb" name="cb">
                        <img src="/images/rewardtask/cb.gif" alt="cb" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "ccb" name="ccb">
                        <img src="/images/rewardtask/ccb.gif" alt="ccb" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "cgb" name="cgb">
                        <img src="/images/rewardtask/cgb.gif" alt="cgb" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "icbc" name="icbc">
                        <img src="/images/rewardtask/icbc.gif" alt="icbc" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "abc" name="abc">
                        <img src="/images/rewardtask/abc.gif" alt="abc" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "ibc" name="ibc">
                        <img src="/images/rewardtask/ibc.gif" alt="ibc" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "sbc" name="sbc">
                        <img src="/images/rewardtask/sbc.gif" alt="sbc" class="bank" width="150" height="30" />   
                    </li>
                    <li>
                        <input type="radio" id= "alipay" name="alipay">
                        <img src="/images/rewardtask/alipay.gif" alt="alipay" class="bank" width="150" height="30" />   
                    </li>
                </ul>
            </form>
        </div>
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
