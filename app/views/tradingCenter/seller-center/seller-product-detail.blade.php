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
        <input type="hidden" id="product-name" value="{{{ $product->name }}}" />
        <input type="hidden" id="product-price" value="{{{ $product->price }}}" />
        <div class="banner">
            <!-- 用户信息 -->
            <div class="user-info">
                <div class="avatar component">
                    <img src="{{$product->shop->user->avatar}}" alt="avatar">
                </div>
                <div class="info component">
                    <p>{{$product->shop->user->username}}</p>
                    <p class="address-info">
                        @if (isset($product->shop->user->country) && isset($product->shop->user->province) && isset($product->shop->user->city))
                        <span>{{{$product->shop->user->country}}}</span>
                        <span>{{{$product->shop->user->province}}}</span>
                        <span>{{{$product->shop->user->city}}}</span>
                        @else
                        <span>未知地区</span>
                        @endif 
                    </p>
                </div>
            </div>
            <!-- 店铺信息简介 -->
            <div class="store-detail header-component">
                <div class="row-content">
                    <span class="label">店铺名称: </span>
                    <span class="content">
                    {{{ $product->shop->name }}}
                    </span>
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
                    <span class="content">{{$product->shop->description}}</span>
                </div>
                <div class="row-content">
                    <span class="label">店铺标签: </span>
                    <span class="content">
                        @foreach($product->shop->tags as $tag)
                            {{ $tag->name}}
                        @endforeach
                    </span>
                </div>
                <div class="stastic">
                    <span>累计交易: </span>
                    <span>{{$product->sellNum}}</span>
                </div>
            </div>
        </div>
        <div class="product-detail-main">
            <div class="info components">
                <div class="product-name">
                    {{{ $product->name }}}
                </div>
                @foreach($product->pictures as $picture)
                <img src="{{$picture->image}}" class="img-comonent product-img" width="130" height="136" alt="product-detail-img" />
                @endforeach
                <div href="#" class="video">
                    <img src="/images/tradingcenter/seller/product-detail-video.gif" width="130" height="136" alt="product-detail-img" />
                    <img src="/images/tradingcenter/seller/video-btn.gif" width="130" height="136" alt="video-btn" />
                </div>
                <div class="message">
                    <p>{{$product->intro}}</p>
                </div>
                <div class="add-to-cart btn" data-productid="{{$product->id}}">添加到购物车</div>
                <div class="clear"></div>
            </div>
            <div class="similar-businesses components">
                <h3>该商家的其他商品</h3>
                <div class="rank-list">
                    @foreach($otherProducts as $otherProduct)
                    <div class="one-list">
                        <img src="/images/tradingcenter/seller/rank.png" alt="rank" width="38" height="38" />
                        <p class="title">{{{ $otherProduct->name }}}</p>
                        <span class="price">￥{{{ $otherProduct->price }}}</span>
                        <span class="counter">成交{{{ $otherProduct->sellNum }}}次</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="comments components">
                <div class="comment-list">
                    <div class="row-content">
                        <span class="label">产品评价</span>
                        <span>(共<span>{{$evaluations->getTotal()}}</span>条)</span>
                        <span class="label total-comment" >总体评价</span>
                        <span class="content">
                            @for($i = 0;$i < $product->aScore;$i++)
                            <img src="/images/tradingcenter/icon/star.png" alt="star" width="14" height="14" />
                            @endfor
                        </span>
                        <span>共<span>{{$evaluations->getTotal()}}</span>次打分</span>
                    </div>
                    @foreach($evaluations as $evaluation)
                    <div class="row-content">
                        <img src="{{$evaluation->user->avatar}}" alt="rank" width="30" height="30" />
                        <span>{{$evaluation->content}}</span>
                    </div>
                    @endforeach
                </div>
                @if(count($evaluations) < $evaluations->getTotal())
                {{$evaluations->appends(array('product_id' => $product->id))->links();}}
                @endif
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/seller-product-detail.js'></script>
@stop
