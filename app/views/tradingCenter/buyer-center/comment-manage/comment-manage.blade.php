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
    <div class="buyer-content">
        
    </div>
@stop

@section('js')
    @parent
@stop
