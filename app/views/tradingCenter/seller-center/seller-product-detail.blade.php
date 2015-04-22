@extends('layouts.master')

@section('title')
    <title>丛丛网－卖家店铺</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/seller-store.css">
@stop

@section('body')
    @parent
    <div id="main" class="seller-store-content">
        <div class="banner">
            <!-- 用户信息 -->
            <div class="user-info">
                <div class="avatar component">
                    <img src="/images/common/avatar.png" alt="avatar">
                </div>
                <div class="info component">
                    <p>Vivine</p>
                    <p>学号 FC634085</p>
                    <p class="address-info">
                        <span>中国</span>
                        <span>广东</span>
                        <span>广州</span>
                    </p>
                </div>
            </div>
            <!-- 店铺信息简介 -->
            <div class="store-detail header-component">
                <div class="row-content">
                    <span class="label">丛丛店铺: </span>
                    <span class="content">平面设计、日文家教、动画3D</span>
                </div>
                <div class="row-content">
                    <span class="label">教育情况: </span>
                    <span class="content">上海负担大学动画出传媒专业硕士</span>
                </div>
                <div class="row-content">
                    <span class="label">买家信用: </span>
                    <span class="content">
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                    </span>
                </div>
            </div>

            <div class="store-info header-component">
                <div class="row-content">
                    <span class="label">店铺简介: </span>
                    <span class="content">此处描述店铺的经营范围和粗略介绍产品的种类。</span>
                </div>
                <div class="talk">
                    <a href="#" class="btn">谈一谈</a>
                </div>
                <div class="stastic">
                    <span>累计交易: </span>
                    <span>35149</span>
                    <span>访问量</span>
                    <span>98927</span>
                </div>
            </div>
        </div>
        <div class="store-main">

        </div>
    </div>
@stop

@section('js')
    @parent
@stop
