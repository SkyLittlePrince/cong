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
    @include('components.left-nav.mynews-left')
@stop

@section('tradingCenter-content')
    <div class="mynews-component trading-reminder my-self-checkbox">
        <div class="message-wrapper">
            <div class="banner">
                <span class="title">交易提醒(<span class="unread-message">0</span>)</span>
            </div>
            <div class="messages">
                <ul>
                    @foreach ($messages as $message)
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1" style="display:hidden;">
                        </label>
                        <div class="col-right">
                            <input type="hidden" class="message-id" value="{{{ $message->id }}}" />
                            <input type="hidden" class="message-content" value="{{{ $message->content }}}" />
                            <span class="message-title">{{{ $message->title }}}</span>
                        </div>
                    @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/dist/js/pages/trading-reminder.js"></script>
@stop
