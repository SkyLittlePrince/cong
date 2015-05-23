@extends('layouts.master')

@section('title')
    <title>丛丛网－帮助中心</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/helpCenter/helpCenter.css">
@stop

@section('body')
    @parent
    <div class="helpCenter">
     <div class="help">
        <div class="top">
            <img src="/images/helpCenter/newer.png"/>
            <p>新手入门</p>
        </div>
        <div class="help-main">
            <p class="title"><a href="">雇主入门></a></p>
            <p>寻找合适的服务</p>
            <p>沟通细节</p>
            <p>雇佣他</p>
            <p>付款</p>
        </div>
        <div class="help-main">
             <p class="title"><a href="">服务商></a></p>
             <p><a href="/user/register">注册</a></p>
             <p><a href="/trading-center/seller/register">成立工作室</a></p>
             <p><a href="/trading-center/account/base-info">完善个人资料</a></p>
        </div>
     </div>
     <div class="line"></div>
     <div class="help">
        <div class="top">
            <img src="/images/helpCenter/tradingCenter.png"/>
            <p>交易中心</p>
        </div>
        <div class="help-main">
            <p class="title"><a href="/trading-center/buyer">交易中心></a></p>
            <p><a href="/trading-center/buyer">个人中心</a></p>
            <p><a href="/trading-center/account">账号设置</a></p>
            <p><a href="/trading-center/seller/my-store">工作室</a></p>
        </div>
     </div>
     <div class="line"></div>
     <div class="help">
        <div class="top">
            <img src="/images/helpCenter/bountyHunter.png"/>
            <p>赏金猎人</p>
        </div>
        <div class="help-main">
            <p class="title"><a href="/bounty-hunter">赏金猎人></a></p>
            <p><a href="/bounty-hunter/reward-task">悬赏任务</a></p>
            <p><a href="/bounty-hunter/auction">倒价竞拍</a></p>
            <p><a href="/bounty-hunter/auction">议价招标</a></p>
            <p><a href="/bounty-hunter/auction">任务邀请</a></p>
        </div>
     </div>
     <div class="line"></div>
     <div class="help">
        <div class="top">
            <img src="/images/helpCenter/problems.png"/>
            <p  class="title">常见问题</p>
        </div>
        <div class="help-main">
            <p class="title"><a href="">常见问题></a></p>
            <p><a href="/trading-center/account/authentication">身份认证</a></p>
            <p><a href="/trading-center/account/change-password">忘记/修改密码</a></p>
            <p><a href="">解除/更改绑定手机</a></p>
            <p><a href="">退款/维权</a></p>
            <p><a href="">举报丛客/雇主</a></p>
            <p><a href="">佣金收取</a></p>
            <p><a href="">账户找回</a></p>
        </div>
     </div>
     <div class="help-contact">
        <div class="help-phone">
            <p class="phone">客服电话</p>
            <p>13316028830</p>
            <p>09:00-18:00</p>
        </div>
        <div class="feedback">
            <p>在线反馈</p>
        </div>
     </div>
    </div>
@stop

@section('js')
    @parent
@stop
