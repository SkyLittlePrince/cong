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
            <div class="ranking store-main-content">
                <h3>销售量</h3>
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
                <div class="sale-count">
                    <p>月成交<span>4321</span>次</p>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="content">
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
                    </div>
                    <div class="task">
                        <div class="img">
                            <div class="tag">平面设计类</div>
                            <img src="/images/rewardtask/1.png" width="172" height="129" />
                        </div>
                        <div class="text">品牌设计，vi设计，包装设计</div>
                        <div class="price">RMB：2000</div>
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
