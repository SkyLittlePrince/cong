@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－我发出的举报</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/report-manage/report.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content trading-content">
        <div class="content-wrapper">
            <div class="banner">
                <h3 class="title">我发起的举报</h3>
            </div>
            <div class="content-main">
                <div class="content-row">
                    <label for="title">举报主题:</label>
                    <div class="content-input report-info">
                        <span class="title info" id="title">举报主题举报主题</span>
                        <span class="date info">2015-01-03</span>
                    </div>
                </div>
                <div class="status">
                    <div class="ststua-bar status-line">
                        <span>当前举报状态</span>
                        <span>交易编号</span>
                    </div>
                    <div class="status-content status-line">
                        <span class="report-status">正在确认中</span>
                        <span class="report-number">000112010545</span>
                    </div>
                </div>
                <div class="content-row">
                    <label for="wechat">举报时间:</label>
                    <div class="content-input">
                        <input type="text" id="time" name="time" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="wechat">举报时间:</label>
                    <div class="content-input">
                        <input type="text" id="time" name="time" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="wechat">举报对象:</label>
                    <div class="content-input">
                        <input type="text" id="time" name="time" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="wechat">附件:</label>
                    <div class="content-input">
                        <input type="text" id="time" name="time" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
