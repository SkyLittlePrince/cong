@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－我收到的举报</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/report-manage/report.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/report-manage/receive-report.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content trading-content">
        <div class="content-wrapper">
            <div class="banner">
                <h3 class="title">我收到的举报</h3>
            </div>
            <div class="content-main">
                <div class="content-row">
                    <label for="title">举报主题:</label>
                    <div class="content-input report-info">
                        <span class="title info" id="title">举报主题举报主题</span>
                        <span class="date info">2014-09-13</span>
                    </div>
                </div>
                <div class="status">
                    <div class="ststua-bar status-line">
                        <span>当前举报状态</span>
                        <span>交易编号</span>
                    </div>
                    <div class="status-content status-line">
                        <span class="report-status">举报已处理</span>
                        <span class="report-number">000112010545</span>
                    </div>
                </div>
                <div class="content-row">
                    <label for="people">举报人:</label>
                    <div class="content-input">
                        <input type="text" id="people" name="people" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="content">举报内容:</label>
                    <div class="content-input">
                        <input type="text" id="content" name="content" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="wechat">举报时间:</label>
                    <div class="content-input">
                        <input type="text" id="time" name="time" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="name">举报人姓名:</label>
                    <div class="content-input">
                        <input type="text" id="name" name="name" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="phone">举报人电话:</label>
                    <div class="content-input">
                        <input type="text" id="phone" name="phone" />
                    </div>
                </div>
                <div class="content-row">
                    <label for="email">举报人邮箱:</label>
                    <div class="content-input">
                        <input type="text" id="email" name="email" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
