@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－交易提醒</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/mynews/trading-reminder.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/checkbox/checkbox.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.mynews-left')
@stop

@section('tradingCenter-content')
    <div class="mynews-component trading-reminder my-self-checkbox">
        <div class="message-wrapper">
            <div class="banner">
                <span class="title">交易提醒(<span>0</span>)</span>
            </div>
            <div class="messages">
                <ul>
                    <li class="one-message">
                        <label class="no-message">
                            
                        </label>             
                        <div class="col-right">
                            暂无新消息!
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
