@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－我的店铺</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/my-store.css">
@stop

@section('seller-content')
    <div class="my-store-content seller-content">
        <div class="store-header">
            <div class="info header-component">
                <div class="row-content">
                    <span class="label">店铺名称: </span>
                    <span class="content">Vivine的小店</span>
                </div>
                <div class="row-content">
                    <span class="label">店铺简介: </span>
                    <span class="content">此处描述店铺的经营范围和粗略介绍产品的种类。</span>
                </div>
                <a href="#" class="btn edit">编辑</a>
            </div>
            <div class="detail header-component">
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
                <a href="#" class="btn edit">编辑</a>
            </div>
        </div>
        <div class="main-content">
            <div class="recommendation main-content">
                <h3>宝贝推荐</h3>
                <div class="recommendation-image">
                    <div class="one-image">
                        <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                        <span class="name">此处描述产品标题</span>
                        <span class="price">￥350</span>
                    </div>
                    <div class="one-image">
                        <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                        <span class="name">此处描述产品标题</span>
                        <span class="price">￥350</span>
                    </div>
                    <div class="one-image">
                        <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                        <span class="name">此处描述产品标题</span>
                        <span class="price">￥350</span>
                    </div>
                    <div class="one-image">
                        <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                        <span class="name">此处描述产品标题</span>
                        <span class="price">￥350</span>
                    </div>
                    <div class="one-image">
                        <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                        <span class="name">此处描述产品标题</span>
                        <span class="price">￥350</span>
                    </div>
                </div>
                <a href="#" class="btn edit">编辑</a>
            </div>
            <div class="ranking main-content">
                <h3>宝贝排行榜</h3>
                <div class="nav-wrapper">
                    <div class="line"></div>   
                    <div class="nav">
                        <div class="one">销售量</div>
                        <div class="active second">收藏数</div>
                    </div>
                    <div class="line"></div>
                </div>
                <div class="rank-list">
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title">此处为描述产品的标题</p>
                        <span class="price">￥380</span>
                        <span class="counter">成交58次</span>
                    </div>
                </div>
                <a href="#" class="btn edit">编辑</a>
            </div>
        </div>

    </div>
@stop

