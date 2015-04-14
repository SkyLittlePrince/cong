@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－交易列表</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/buyer-center/my-book/my-book.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.buyer-center-left')
@stop

@section('tradingCenter-content')
    <div class="buyer-content">
        <div class="my-order">
            <div class="order-banner">我的项目</div>
            <div class="list-banner">
                <ul>
                    <li class="info">项目信息</li>
                    <li class="date">日期</li>
                    <li class="name">项目</li>
                    <li class="status">状态</li>
                </ul>
            </div>
            <div class="one-order">
                <div class="order-num order-component">
                    <p class="order-p">订单号<span>WX187369727786</span></p>   
                </div>
                <div class="order-date order-component">
                    <p>2015.1212</p>
                </div>
                <div class="order-pic order-component">
                    <span>
                        <img src="/images/common/avatar.png" alt="order-pic">
                    </span>
                </div>
                <div class="order-title order-component">
                    <p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
                    <p class="price line-two">￥<span>380</span></p>
                </div>
                <div class="order-status order-component">
                    <p class="order-p">交易成功</p>
                    <p class="line-two">雇主已评</p>
                </div>
            </div>
            <div class="one-order">
                <div class="order-num order-component">
                    <p class="order-p">订单号<span>WX187369727786</span></p>   
                </div>
                <div class="order-date order-component">
                    <p>2015.1212</p>
                </div>
                <div class="order-pic order-component">
                    <span>
                        <img src="/images/common/avatar.png" alt="order-pic">
                    </span>
                </div>
                <div class="order-title order-component">
                    <p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
                    <p class="price line-two">￥<span>380</span></p>
                </div>
                <div class="order-status order-component">
                    <p class="order-p">交易成功</p>
                    <p class="line-two">雇主已评</p>
                </div>
            </div>
            <div class="one-order">
                <div class="order-num order-component">
                    <p class="order-p">订单号<span>WX187369727786</span></p>   
                </div>
                <div class="order-date order-component">
                    <p>2015.1212</p>
                </div>
                <div class="order-pic order-component">
                    <span>
                        <img src="/images/common/avatar.png" alt="order-pic">
                    </span>
                </div>
                <div class="order-title order-component">
                    <p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
                    <p class="price line-two">￥<span>380</span></p>
                </div>
                <div class="order-status order-component">
                    <p class="order-p">交易成功</p>
                    <p class="line-two">雇主已评</p>
                </div>
            </div>
            <div class="one-order">
                <div class="order-num order-component">
                    <p class="order-p">订单号<span>WX187369727786</span></p>   
                </div>
                <div class="order-date order-component">
                    <p>2015.1212</p>
                </div>
                <div class="order-pic order-component">
                    <span>
                        <img src="/images/common/avatar.png" alt="order-pic">
                    </span>
                </div>
                <div class="order-title order-component">
                    <p class="order-p">此处描述产品的标题XXXXXXXXXXX</p>
                    <p class="price line-two">￥<span>380</span></p>
                </div>
                <div class="order-status order-component">
                    <p class="order-p">交易成功</p>
                    <p class="line-two">雇主已评</p>
                </div>
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
@stop

@section('js')
    @parent
@stop
    