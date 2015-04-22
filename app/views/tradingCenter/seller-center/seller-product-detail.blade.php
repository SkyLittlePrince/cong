@extends('layouts.master')

@section('title')
    <title>丛丛网－产品详情</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/seller-product-detail.css">
@stop

@section('body')
    @parent
    <div id="main" class="seller-product-detail-content">
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
        <div class="product-detail-main">
            <div class="info components">
                <img src="/images/tradingcenter/seller/product-detail.gif" class="img-comonent" width="130" height="136" alt="product-detail-img" />
                <div href="#" class="video">
                    <img src="/images/tradingcenter/seller/product-detail-video.gif" width="130" height="136" alt="product-detail-img" />
                    <img src="/images/tradingcenter/seller/video-btn.gif" width="130" height="136" alt="video-btn" />
                </div>
                <div class="message">
                    <p>此处讲解服务介绍对象此处讲解服务介绍对象此处讲解服务介绍对象此处讲解服务介绍对象此处讲解服务介绍对象此处讲解服务介绍对象</p>
                </div>
            </div>
            <div class="similar-businesses components">
                <h3>提供类似服务的商家</h3>
                <div class="rank-list">
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                </div>
            </div>
            <div class="comments components">
                <div class="comment-list">
                    <div class="row-content">
                        <span class="label">产品评价</span>
                        <span>(共<span>458</span>条)</span>
                        <span class="label total-comment" >总体评价</span>
                        <span class="content">
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        </span>
                        <span>共<span>427</span>次打分</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <span><img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                    <div class="row-content">
                        <img src="/images/tradingcenter/seller/comment-user-info.gif" alt="rank" width="30" height="30" />
                        <span>很好,完成得不错,好评。</span>
                    </div>
                </div>

                <div class="pagination">
                    <div class="right to-page">
                        <p>
                            共<span class="page-count">3</span>页,到第<input type="text" >页
                            <input type="button" value="确定">
                        </p>
                    </div>
                    <div class="page-num right">
                        <a href="#">
                            <img src="/images/icon/icon-arrow-left.png" alt="icon-left" width="28" height="28" />         
                        </a>
                        <span class="num active">1</span>
                        <span class="num">2</span>
                        <span class="num">3</span>
                        <a href="#">
                            <img src="/images/icon/icon-arrow-right.png" alt="icon-right" width="28" height="28" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
