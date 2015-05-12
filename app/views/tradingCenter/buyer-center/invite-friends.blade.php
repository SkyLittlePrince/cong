@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－邀请好友</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/invite.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content trading-content">
        <div class="content-wrapper">
            <div class="banner">
                <h3 class="title">邀请你的好友玩转丛丛网</h3>
            </div>
            <div class="allway">
                <div class="one-way">
                    <p class="way-title">方式一: 链接邀请</p>
                    <p class="tips">复制邀请链接发送给好友, Ta们会自动关注你哦!</p>
                    <div class="input-row">
                        <input type="text" id="link1" name="link1" />
                        <a href="" class="btn" id="copy-link1">复制链接</a>
                    </div>
                </div>
                <div class="one-way">
                    <p class="way-title">方式二: 短信邀请</p>
                    <p class="tips">直接输入好友手机号码, 邀请Ta们开通匆匆网</p>
                    <p class="input-label">手机号:</p>
                    <div class="input-row">
                        <input type="text" id="phone" name="phone" />
                        <a href="" class="btn" id="send-message">发送信息</a>
                    </div>
                </div>
                <div class="one-way">
                    <p class="way-title">方式三: 邮件邀请</p>
                    <p class="tips">给你的好友发送电子邮件,邀请成功后,  Ta们会自动关注你哦!</p>
                    <p class="input-label">邮件地址:</p>
                    <div class="input-row">
                        <input type="text" id="email" name="email" />
                        <a href="" class="btn" id="send-email">发送邀请</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
