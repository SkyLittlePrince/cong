@extends('layouts.master')

@section('title')
    <title>丛丛网－关于丛丛</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/about.css">
@stop

@section('body')
    @parent
    <div id="main">
    	<div class="block about">
    		<div class="tag">
    			<span>公司简介</span>
    		</div>
            <p>广州翊生网络科技有限公司（简称"丛丛网"）于2015年3月创立于广州，
            是一家互联网新创企业，注重于自由职业者互联网平台的打造。
            同时，丛丛网是国内首个结合C2C和O2O模式的自由职业者于用户进行交易
            的互联网平台，是我们的主心定位。</p>
    	</div>
    	<div class="block culture">
    		<div class="tag">
    			<span>企业文化</span>
            </div>
            <div class="culture-left">
                <div class="culture-show">
                    <img src="/images/common/about-one.png"/>
                    <p class="text-one">致力打造一个可提供极致个性化体验的自由人才交流天地。</p>
                </div>
                <div class="line"></div>
                <div class="culture-show">
                    <img src="/images/common/about-two.png"/>
                    <p class="text-two">我们的愿望是让年轻一代的自由职业者或是技能携带者，
                    能够拥有一个尽可能透明度高且高效便利的交易渠道和展示平台，
                    同时为有相应需求的用户提供个性化服务。</p>
                </div>
                <div class="line"></div>
                <div class="culture-show">
                    <img src="/images/common/about-three.png"/>
                    <p class="text-three">自由，全面，高校，随性</p>
                </div>
            </div>
    	</div>
    	<div class="block contact-withus">
    		<div class="tag">
    			<span>联系方式</span>
    		</div>
            <div>
                <img src="/images/common/logo-1.png" class="contact-img" width="160" height="80" />
                <div class="contact-text">
                    <p>联系人：<span>肖小姐</span></p>
                    <p>电&nbsp话：<span>13316028830</span></p>
                    <p>Email：<span>3097276784@qq.com</span></p>
                    <p>地&nbsp址：<span>广东省广州市天河区珠江新城金穗路1号16楼311室</span></p>
                </div>
            </div>
    	</div>
    </div>
@stop

@section('js')
    @parent
    
@stop