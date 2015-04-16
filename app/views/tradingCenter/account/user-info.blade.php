@extends('layouts.master')

@section('title')
    <title>丛丛网－个人资料</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/user-info.css">
@stop

@section('body')
    @parent
    <div id="main">
    	<div class="base-info block">
    		<div class="avatar">
    			<img src="/images/icon/avatar.png" width="252" height="252" />
    		</div>
    		<div class="info">
    			<div>
    				Vivine <br />
    				学号 FC634805
    			</div>
    			<div>
    				<span class="region">中国</span>
    				<span class="region">广东</span>
    				<span class="region">广州</span>
    			</div>

    			<div>
    				<div>丛丛店铺：平面设计、日文家教、动画3D</div>
    				<div>教育情况：上海复旦大学动画传媒专业硕士</div>
    				<div>
    					卖家信用：
    					<img src="/images/tradingcenter/icon/star.png" />
    					<img src="/images/tradingcenter/icon/star.png" />
    					<img src="/images/tradingcenter/icon/star.png" />
    					<img src="/images/tradingcenter/icon/star.png" />
    					<img src="/images/tradingcenter/icon/star.png" />
    				</div>
    			</div>
    			<div>
    				店铺简介：此处描述店铺的经营范围和粗略介绍产品的种类。
    			</div>
    			<div>
    				<span>累计交易：35149</span>
    				<span>访问量：98927</span>
    			</div>
    			<div>
    				<span><img src=""></span>
    				<input type="button" id="talk-btn" value="谈一谈" class="btn" />
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block about">
    		<div class="tag">关于我</div>
    		<p>对移动互联网产品很有兴趣，有产品开发的经验，期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。</p>
    	</div>
    	<div class="block skill">
    		<div class="tag">我的技能</div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    		<div class="skill-item"></div>
    	</div>
    	<div class="block work-experience">
    		<div class="tag">工作经历</div>
    		<div class="work-item">
    			<div class="work-time"></div>
    			<div class="work-content"></div>
    			<div class="work-icon"></div>
    		</div>
    		<div class="work-item">
    			<div class="work-time"></div>
    			<div class="work-content"></div>
    			<div class="work-icon"></div>
    		</div>
    		<div class="work-item">
    			<div class="work-time"></div>
    			<div class="work-content"></div>
    			<div class="work-icon"></div>
    		</div>
    	</div>
    	<div class="block edu-experience">
    		<div class="tag">工作经历</div>
    		<div class="edu-item">
    			<div class="edu-time"></div>
    			<div class="edu-content"></div>
    			<div class="edu-icon"></div>
    		</div>
    		<div class="edu-item">
    			<div class="edu-time"></div>
    			<div class="edu-content"></div>
    			<div class="edu-icon"></div>
    		</div>
    		<div class="edu-item">
    			<div class="edu-time"></div>
    			<div class="edu-content"></div>
    			<div class="edu-icon"></div>
    		</div>
    	</div>
    	<div class="block awards">
    		<div class="award-item">
    			<div class="award-time"></div>
    			<div class="award-content"></div>
    		</div>
    		<div class="award-item">
    			<div class="award-time"></div>
    			<div class="award-content"></div>
    		</div>
    		<div class="award-item">
    			<div class="award-time"></div>
    			<div class="award-content"></div>
    		</div>
    		<div class="award-item">
    			<div class="award-time"></div>
    			<div class="award-content"></div>
    		</div>
    	</div>
    	<div class="contact block">
    		<div class="contact-avatar">
    			<img src="/images/icon/avatar.png" width="150" height="150" />
    		</div>
    		<div class="contact-text">
    			<div>
	    			<img src="/dasdsa"/>
					<span>联系方式</span>    				
    			</div>
    			<div>手机：15813379748</div>
    			<div>QQ：657175261</div>
    			<div>邮箱：657175261@qq.com</div>
    		</div>
    		<div class="clear"> </div>
    	</div>
        <div class="clear"></div>
    </div>
    @include('components.footer')
@append


@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/user-info.js"></script>
@stop
