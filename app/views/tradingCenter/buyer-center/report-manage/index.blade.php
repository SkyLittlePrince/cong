@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－举报管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/report-manage/index.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content trading-content">
        <div class="content-wrapper">
            <div class="banner">
                <h3 class="title">举报管理</h3>
            </div>

            <div class="my-history">
                <div class="trade one-history left">
                    <div class="banner">我发起的举报</div>
                    <div class="panel">
                        <ul class="content-list">
                            <li>
                                <a href="/trading-center/buyer/launch-report">举报主题举报主题</a>
                            </li>
                            <li>
                                <a href="/trading-center/buyer/launch-report">举报主题举报主题</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="trade one-history right">
                    <div class="banner">我收到的举报</div>
                    <div class="panel">
                        <ul class="content-list">
                            <li>
                                <a href="/trading-center/buyer/receive-report">举报主题举报主题</a>
                            </li>
                            <li>
                                <a href="/trading-center/buyer/receive-report">举报主题举报主题</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
@stop

@section('js')
    @parent
@stop
