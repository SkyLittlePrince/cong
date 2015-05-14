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
                    <div class="tag-display">
                        <span class="label">店铺标签: </span>
                        <span class="content tags">
                            @foreach ($tags as $tag)
                                <span class="one-tag" data-tagid="{{{$tag["id"]}}}">{{{$tag["name"]}}}&nbsp&nbsp</span>
                            @endforeach
                        </span>
                    </div>
                    <div class="tag-edit hidden">
                        <span class="label">标签编辑: </span>
                        <br>
                        <span class="edit-tag-list">
                            <div class="input-group add-tag-input">
                                <input type="text" class="tagText empty form-control input-sm" placeholder="新标签" style="text-transform: lowercase;">
                                <a class="input-group-addon" id="add-tag-btn" href="javascript:void(0);">+</a>
                            </div>
                        </span>
                        <script type="text/template" id="oneTagTemplat">
                            <span class="one-tag" data-tagid="<%= tagId%>"><%= tagValue%>&nbsp&nbsp</span>
                        </script>
                        <script type="text/template" id="disabledTagTemplate">
                            <div class="input-group display-tag">
                                <input type="text" class="tagText form-control input-sm" value="<%= tagValue %>" title="<%= tagValue %>" style="text-transform: lowercase;" disabled="disabled">
                                <a class="input-group-addon tagClose delete-tag-btn" href="javascript:void(0);" data-tagid="<%= tagId %>">×</a>            
                            </div>
                        </script>
                    </div>
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
                <div class="operation">
                    <div class="edit-btn">编辑</div>
                    <div class="hidden save-btn">保存</div>
                    <!-- <div class="hidden cancel-btn">取消</div> -->
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="recommendation main-content-component store-product-list">
                <h3>我的商品</h3>
                <div class="operation product-operation">
                    <div class="delete-product hidden product-btn">删除商品</div>
                    <div class="add-product hidden product-btn">增加商品</div>
                    <div class="delete-store">删除店铺</div>
                </div>
                <div class="recommendation-image">
                    @foreach ($products as $product)
                        <div class="one-image">
                            <img src="/images/tradingcenter/seller/test.png" alt="recommend" width="136" height="136" />
                            <div class="name">{{{ $product["name"] }}}</div>
                            <span class="price">¥{{{ $product["price"] }}}</span>
                        </div>
                    @endforeach
                </div>
                <div class="operation">
                    <div class="edit-btn" id="edit-store-product">编辑</div>
                    <div class="hidden save-btn" id="save-store-product">保存</div>
                </div>
                <script type="text/template" id="addProductTemplate">
                    <div class="content-main">
                    <div class="content-row">
                        <label class="label" for="avatar">商品图片：</label>
                        <div class="content-input" id="avatar-wrapper">
                            <img class="avatar-img" src="/images/tradingcenter/icon/avatar.png" width="80" height="80" />
                            <input type="hidden" id="avatar-url" name="avatar" class="hidden" value="" />
                            <a href="javascript:;" class="a-upload">
                                <input type="file" name="avatar-file" id="avatar-file">单击上传
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="content-row">
                        <label class="label">商品名称：</label>
                        <div class="content-input">
                            <input type="text" />
                        </div>
                    </div>
                    <div class="content-row">
                        <label class="label">商品金额：</label>
                        <div class="content-input">
                            <input type="text" /><span> 元</span>
                        </div>
                    </div>
                    <div class="content-row">
                        <label class="label">商品描述：</label>
                        <div class="content-input">
                            <textarea></textarea>
                        </div>
                    </div>
                </script>
            </div>
            <div class="ranking main-content-component store-product-ranking">
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

