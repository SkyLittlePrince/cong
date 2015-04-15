@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－举报管理</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/report-manage/launch-report.css">
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
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
