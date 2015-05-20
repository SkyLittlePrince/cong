@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－评价管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/comment-manage/comment-manage.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content trading-content">
        <div class="content-wrapper">
            <div class="banner">
                <h3 class="title">评价管理</h3>
            </div>
            <div class="shop-rating">
                <p class="title">工作室综合评分</p>
                <div class="rating-bar">
                    <div class="line">
                        <span class="index comment">付款及时度: <span>0</span> 分</span>
                        <span class="index comment">合作愉快度: <span>0</span> 分</span>
                    </div>
                    <div class="line">
                        <span class="index score">共<span>0</span>人打分</span>
                        <span class="index score">共<span>0</span>人打分</span>
                    </div>
                </div>
                <hr>
            </div>
            <div class="shop-rating">
                <p class="title">累计评价</p>
                <div class="all-rating-bar">
                    <div class="line time">
                        <span>最近一周</span>
                        <span>最近一个月</span>
                        <span>最近6个月</span>
                        <span>6个月前</span>
                        <span>总计</span>
                    </div>
                    <div class="line comment-content">
                        <p>暂无评价</p>
                    </div>
                </div>
                <hr>
            </div>
            <div class="server-comment">
                <p>
                    <a href="">查看交易评价规则>></a>
                </p>
                <div class="option-comment">
                    <span class="from-serve active">来自服务商的评价</span>
                    <span class="to-serve">给服务商的评价</span>
                </div>
                <div class="comment-radio">
                    <input type="radio" id="good" name="comment-radio">
                    <label for="good">好评</label>
                    <input type="radio" id="general" name="comment-radio">
                    <label for="general">中评</label>
                    <input type="radio" id="bad" name="comment-radio">
                    <label for="bad">差评</label>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
