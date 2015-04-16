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
    			<img src="/images/tradingcenter/icon/13.png" width="252" height="252" />
    		</div>
    		<div class="info">
    			<div class="name">
    				Vivine <br />
    				学号 FC634805
    			</div>
    			<div class="region-wrapper">
    				<span class="region">中国</span>
    				<span class="region">广东</span>
    				<span class="region">广州</span>
    			</div>

    			<div class="text">
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
    			<div class="desc">
    				店铺简介：此处描述店铺的经营范围和粗略介绍产品的种类。
    			</div>
    			<div class="data">
    				<span>累计交易：35149</span>
    				<span>访问量：98927</span>
    			</div>
    			<div class="talk">
    				<span><img src="/images/tradingcenter/icon/9.png" height="23" width="25"></span>
    				<input type="button" id="talk-btn" value="谈一谈" class="btn" />
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block about">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/4.png" width="20" height="20" />
    			<span>关于我</span>
    		</div>
    		<p>对移动互联网产品很有兴趣，有产品开发的经验，期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。期间担任过的角色有产品经理，交互设计师，设计视觉设计师。对移动互联网产品很有兴趣，有产品开发的经验。</p>
    	</div>
    	<div class="block skill">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/5.png" width="20" height="20" />
    			<span>我的技能</span>
    		</div>
    		<div class="skill-item"><span>HTML</span></div>
    		<div class="skill-item">CSS</div>
    		<div class="skill-item">Javascript</div>
    		<div class="skill-item">PHP</div>
    		<div class="skill-item">Ruby</div>
    		<div class="skill-item">Python</div>
    		<div class="skill-item">Go</div>
    		<div class="skill-item">Perl</div>
    		<div class="skill-item">Photoshop</div>
    		<div class="skill-item">Ai</div>
    		<div class="skill-item">Axure</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block work-experience">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/7.png" width="20" height="20" />
    			<span>工作经历</span>
    		</div>
    		<div class="work-item">
    			<div class="work-time">2013年5月 至 现在</div>
    			<div class="work-content">
    				<span>广州沸点品牌策划有限公司.创意部</span>
    				<span>艺术／工艺</span>
    				<span>广州沸点品牌策划有限公司.创意部</span>
    				<span>艺术／工艺</span>
    				<span>广州沸点品牌策划有限公司.创意部</span>
    				<span>艺术／工艺</span>
    			</div>
    			<div class="work-icon"></div>
    		</div>
    		<div class="work-item">
    			<div class="work-time">2012年5月 至 2013年4月</div>
    			<div class="work-content">
    				<span>广州沸点品牌策划有限公司.创意部</span>
    				<span>艺术／工艺</span>
    			</div>
    			<div class="work-icon"></div>
    		</div>
    		<div class="work-item">
    			<div class="work-time">2010年3月 至 2012年2月</div>
    			<div class="work-content">
    				<span>广州沸点品牌策划有限公司.创意部</span>
    				<span>艺术／工艺</span>
    			</div>
    			<div class="work-icon"></div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block edu-experience">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/6.png" width="20" height="20" />
    			<span>教育经历</span>
    		</div>
    		<div class="edu-item">
    			<div class="edu-time">
    				2010年9月 至 2014年7月
    			</div>
    			<div class="edu-content">
    				华南农业大学.本科 视觉传达专业
    			</div>
    			<div class="edu-icon">
    				
    			</div>
    		</div>
    		<div class="edu-item">
    			<div class="edu-time">
    				2010年9月 至 2014年7月
    			</div>
    			<div class="edu-content">
    				华南农业大学.本科 视觉传达专业
    			</div>
    			<div class="edu-icon">
    				
    			</div>
    		</div>
    		<div class="edu-item">
    			<div class="edu-time">
    				2010年9月 至 2014年7月
    			</div>
    			<div class="edu-content">
    				华南农业大学.本科 视觉传达专业
    			</div>
    			<div class="edu-icon">
    				
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block awards">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/8.png" width="20" height="20" />
    			<span>个人奖项</span>
    		</div>
    		<div class="award-item">
    			<div class="award-time">2010年9月 至 2014年7月</div>
    			<div class="award-content">华南农业大学奖学金三等奖</div>
    		</div>
    		<div class="award-item">
    			<div class="award-time">2010年9月 至 2014年7月</div>
    			<div class="award-content">华南农业大学奖学金三等奖</div>
    		</div>
    		<div class="award-item">
    			<div class="award-time">2010年9月 至 2014年7月</div>
    			<div class="award-content">华南农业大学奖学金三等奖</div>
    		</div>
    		<div class="award-item">
    			<div class="award-time">2010年9月 至 2014年7月</div>
    			<div class="award-content">华南农业大学奖学金三等奖</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="contact block">
    		<div class="contact-avatar">
    			<img src="/images/tradingcenter/icon/13.png" width="150" height="150" />
    		</div>
    		<div class="contact-text">
    			<div>
	    			<img src="/images/tradingcenter/icon/14.png"/>
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
