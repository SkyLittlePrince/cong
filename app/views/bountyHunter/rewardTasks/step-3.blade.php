@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/rewardtask/step-3.css">
@stop

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')
        @include('components.left-nav.bounty-hunter-left')
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
                                <input type="radio" id="cb" name="bank">
                                <label for="cb">
                                    <img src="/images/rewardtask/cb.png" alt="cb" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="ccb" name="bank">
                                <label for="ccb">
                                    <img src="/images/rewardtask/ccb.png" alt="ccb" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="cgb" name="bank">
                                <label for="cgb">
                                    <img src="/images/rewardtask/cgb.png" alt="cgb" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="icbc" name="bank">
                                <label for="icbc">
                                    <img src="/images/rewardtask/icbc.png" alt="icbc" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="abc" name="bank">
                                <label for="abc">
                                    <img src="/images/rewardtask/abc.png" alt="abc" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="sbc" name="bank">
                                <label for="sbc">
                                    <img src="/images/rewardtask/sbc.png" alt="sbc" class="bank"/>
                                </label>
                            </div>
                            <div class="bank-item">
                                <input type="radio" id="alipay" name="bank">
                                <label for="alipay">
                                    <img src="/images/rewardtask/alipay.png" alt="alipay" class="bank"/>
                                </label>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </li>
                </ul>
            </form>
            <div class="next-step">
                <a href="/bounty-hunter/reward-task?step=2" class="btn last">上一步</a>
                <a href="/bounty-hunter/reward-task?step=4" class="btn next">下一步</a>
            </div>
        </div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
