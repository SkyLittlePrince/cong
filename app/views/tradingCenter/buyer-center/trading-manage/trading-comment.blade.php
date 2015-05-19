@extends('layouts.master')

@section('title')
    <title>丛丛网－买家评论</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/trading-manage/trading-comment.css">
    <!-- <link rel="stylesheet" type="text/css" href="/dist/css/score/score.css"> -->
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
                <img src="/images/tradingcenter/buyer/comment.png" alt="login" width="265px" height="319px" />
            </div>
            <div class="info">
                <p class="score buyer-score">对买家总评分: </p>
                <p class="score buyer-score">对买家总评分: 
                <!-- </p> -->
                <p class="tip">提示: 请根据对商品的满意程度给商品进行评价或者添加内容描述</p>
                <p class="score">评价内容: </p>
                <textarea name="" id="" cols="30" rows="10">
                    
                </textarea>
                <div class="operate-btn">
                    <a href="" class="btn" id="comment-save-btn">确认</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/trading-comment.js'></script>
@stop
