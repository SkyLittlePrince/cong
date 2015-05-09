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
            <input type="hidden" id="shop-id" value="{{{ $id }}}" />
            <div class="info header-component">
                <div class="row-content">
                    <span class="label">店铺名称: </span>
                    <span class="content store-name">{{{ $name }}}</span>
                    <input type="text" class="hidden about-store-name info-edit"></input>
                </div>
                <div class="row-content">
                    <span class="label">店铺简介: </span>
                    <span class="content brief-introduction">{{{ $description }}}</span>
                     <input type="text" class="hidden about-brief-introduction info-edit"></input>
                </div>
                <div class="operation">
                    <div class="edit-btn">编辑</div>
                    <div class="hidden save-btn">保存</div>
                    <div class="hidden cancel-btn">取消</div>
                </div>
            </div>
            <div class="detail header-component">
                <div class="row-content">
                    <span class="label">店铺标签: </span>
                    <span class="content">
                        @foreach ($tags as $tag)
                            {{{$tag["name"]}}}
                        @endforeach
                    </span>
                </div>
                <div class="row-content">
                    <span class="label">买家信用: </span>
                    <input type="hidden" id="credit" value="{{{ $credit }}}" />
                    <span class="content">
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                        <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                    </span>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="recommendation main-content">
                <h3>我的商品</h3>
                <div class="recommendation-image">
                    @foreach ($products as $product)
                        <div class="one-image">
                            <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                            <div class="name">{{{ $product["name"] }}}</div>
                            <span class="price">¥{{{ $product["price"] }}}</span>
                        </div>
                    @endforeach
                </div>
                <a href="#" class="btn edit">编辑</a>
            </div>
            <div class="ranking main-content">
                <h3>宝贝排行榜</h3>
                <div class="nav-wrapper">
                    <div class="line"></div>   
                    <div class="nav">
                        <div class="sellRank active">销售量</div>
                        <div class="favorRank ">收藏数</div>
                    </div>
                    <div class="line"></div>
                </div>
                <script type="text/template" id="sellTemplate">
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title"><%= name %></p>
                        <span class="price">￥<%= price %></span>
                        <span class="counter">成交<%= sellNum %>次</span>
                    </div>
                </script>
                <script type="text/template" id="favorTemplate">
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="44" height="44" />
                        <p class="title"><%= name %></p>
                        <span class="price">￥<%= price %></span>
                        <span class="counter">被收藏<%= favorNum %>次</span>
                    </div>
                </script>
                <div class="rank-list">
                    加载中...
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/lib/js/lodash/lodash.js"></script>
    <script type="text/javascript" src="/dist/js/pages/my-store.js"></script>
@stop

