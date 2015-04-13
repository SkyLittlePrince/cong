@extends('layouts.master')

@section('title')
    <title>丛丛网－买家评论</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/trading-manage/trading-comment.css">
@stop

@section('body')
    @parent
    <div id="main">
        <div class="banner">
            <span class="order-component">订单号: <span class="order-numer">WX187369727786</span></span>
            <span class="date order-component">2014.12.15</span>
            <span class="order-component">卖家: <span class="seller">Vivine</span></span>
            <span class="order-component">学号: <span class="student-id">FC634805</span></span>
        </div>
        <div class="comment-main">
            <div class="pic">
                <img src="/images/tradingcenter/buyer/comment.png" alt="login" width="265" height="319" />
            </div>
            <div class="info">
                <p>对买家总评分: </p>
                <p>提示: 请根据对商品的满意程度给商品进行评价或者添加内容描述</p>

            </div>
        </div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
