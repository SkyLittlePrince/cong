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
                    <p>{{{ Sentry::getUser()->username }}}</p>
                    <p>
                        @if (Sentry::getUser()->gender)
                        男
                        @else
                        女
                        @endif
                    </p>
                    <p class="address-info">
                        @if ( isset(Sentry::getUser()->country) && isset(Sentry::getUser()->province) && isset(Sentry::getUser()->city) )
                        <span>{{{ Sentry::getUser()->country }}}</span>
                        <span>{{{ Sentry::getUser()->province }}}</span>
                        <span>{{{ Sentry::getUser()->city }}}</span>
                        @else
                        <span>未知地区</span>
                        @endif
                    </p>
                </div>
            </div>
            <!-- 店铺信息简介 -->
            <div class="store-detail header-component">
                <div class="row-content">
                    <span class="label">店铺标签: </span>
                    <span class="content">
                        @foreach ($shop->tags as $tag)
                            <span class="one-tag" data-tagid="{{{$tag["id"]}}}">{{{$tag["name"]}}}&nbsp&nbsp</span>
                        @endforeach
                    </span>
                </div>
                <div class="row-content">
                    <span class="label">店铺信用: </span>
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
                    <span class="content">{{{ $shop->description }}}</span>
                </div>
                <div class="talk">
                    <a href="#" class="btn">谈一谈</a>
                </div>
                <div class="stastic">
                    <span>累计交易: </span>
                    <span>{{{ $shop->dealNum }}}</span>
                    <span>访问量</span>
                    <span>{{{ $shop->visitNum }}}</span>
                </div>
            </div>
        </div>
        <div class="store-main">
            <div class="ranking store-main-content">
                <h3>销售量排行榜</h3>
                <div class="rank-list">
                    @foreach ($productsRanking as $product)
                    <div class="one-list">
                        <img src="{{{ $product->avatar }}}" alt="rank" width="44" height="44" />
                        <p class="title">{{{ $product->name }}}</p>
                        <span class="price">￥{{{ $product->price }}}</span>
                        <span class="counter">成交{{{ $product->sellNum }}}次</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    @foreach ($products as $product)
                    <a href="/trading-center/seller/product-detail?product_id={{{$product->id}}}">
                        <div class="task">
                            <div class="img">
                                <img src="{{{$product->avatar}}}" width="172" height="129" />
                            </div>
                            <div class="text">{{{ $product->name }}}</div>
                            <div class="price">RMB：{{{ $product->price }}}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                @if (count($products) < $numOfTotalItems)
                <div class="pagination">
                {{ $products->appends(array("shop_id" => "1"))->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
@stop
