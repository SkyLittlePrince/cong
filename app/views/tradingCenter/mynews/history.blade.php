@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－聊天记录</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/mynews/history.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/checkbox/checkbox.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.mynewsleft')
@stop

@section('tradingCenter-content')
    <div class="mynews-component message-history my-self-checkbox">
        <div class="message-wrapper">
            <div class="banner">
                <span class="title">聊天记录(<span>0</span>)</span>
            </div>
            <div class="messages">
                <ul>
                    <li class="one-message">
                        <label class="no-message">
                            
                        </label>             
                        <div class="col-right">
                            暂无历史记录!
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
