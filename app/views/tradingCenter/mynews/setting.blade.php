@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－消息通知</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/mynews/setting.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/checkbox/checkbox.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.mynews-left')
@stop

@section('tradingCenter-content')
    <div class="mynews-component message-setting my-self-checkbox">
        <div class="message-wrapper">
            <div class="banner">
                <span class="title">交易提醒(<span>0</span>)</span>
            </div>
            <div class="messages">
                <ul>
                    <li class="one-message">            
                        <div class="col-right setting-title">
                            接收交易提醒
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1" style="display:hidden;">
                        </label>             
                        <div class="col-right">
                            当买家验收完稿时,请通知我
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1" style="display:hidden;">
                        </label>             
                        <div class="col-right">
                            当买家确认完成工作时,请通知我
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            当我参与的需求加价或者延期时,请通知我!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            当我的需求发布成功时,请通知我!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            当我的需求发布失败时,请通知我!
                        </div>
                    </li>
                    <li class="one-message">
                        <label class="my-self-checkbox-label">
                            <input type="checkbox" name="message" value="message1">
                        </label>             
                        <div class="col-right">
                            当我的需求交稿期即将结束时时,请通知我!
                        </div>
                    </li>
                </ul>
            </div>
            <div class="operate-btn">
                <a href="#" class="one-btn btn-1">确定</a>
                <a href="#" class="one-btn btn-2">恢复默认</a>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/setting.js'></script>
@stop
