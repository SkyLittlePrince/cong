@extends('layouts.master')

@section('title')
    <title>丛丛网－购物车结算</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/shopping-cart-clearning.css">
@stop

@section('body')
    @parent
    <div id="main">
        <div class="shopping-cart-content">
            <div class="banner">
                <p>购物车结算</p>
            </div>
            <div class="main-content">
                <div class="order-detail">
                    <ul class="order-left order-component">
                        <li>
                            <label class="label">账户：</label>
                            <span>Vivine</span>
                        </li>
                        <li>
                            <label class="label">订单编号：</label>
                            <span class="order-number">CBD542115266</span>
                        </li>
                        <li>
                            <label class="label">下单时间：</label>
                            <span>2014-12-24<span>09:30</span></span>
                        </li>
                        <li>
                            <label class="label">工作室名称：</label>
                            <span>工作室名称XXXXX</span>
                        </li>
                        <li>
                            <label class="label">商品总数：</label>
                            <span>4件</span>
                        </li>
                    </ul>
                    <ul class="order-right order-component">
                        <li>
                            <label class="label products">订单详情：</label>
                            <div class="order-list">
                                <p>商品名称XXXXXXXXXX</p>
                                <p>商品名称XXXXXXXXXX</p>
                                <p>商品名称XXXXXXXXXX</p>
                                <p>商品名称XXXXXXXXXX</p>
                            </div>
                        </li>
                        <li>
                            <label class="label">应付总计：</label>
                            <span class="money">￥1520</span>
                        </li>
                    </ul>
                </div>
                <div class="payment-way">
                    <label class="label">付款渠道：</label>
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
                </div>
            </div>
            <div class="operate-btn">
                <a href="" class="btn last">上一步</a>
                <a href="" class="btn next">下一步</a>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
