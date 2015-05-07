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
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
    		<div class="info">
    			<div class="name">
    				Vivine <br />
    				注册时间： {{{ $created_at }}}
                    {{{ $workExperiences[0]["time"] }}}
    			</div>
    			<div class="region-wrapper">
                    @if (!isset($region) || !isset($city) || !isset($province))
                    <span class="region">未知地区</span>
                    @else
    				<span class="region">$region</span>
    				<span class="region">$province</span>
    				<span class="region">$city</span>
                    @endif
    			</div>
                @if (isset($shop))
                <div class="shop-info">
                    <div class="text">
                        <div>丛丛店铺：{{{ $shop["name"] }}}</div>
                        <div>店铺标签：
                            @foreach ($shop["tags"] as $tag)
                                {{{$tag["name"]}}}
                            @endforeach
                        </div>
                        <div>
                            <input type="hidden" value="{{{ $shop['credit'] }}}" />
                            卖家信用：
                            <img src="/images/tradingcenter/icon/star.png" />
                            <img src="/images/tradingcenter/icon/star.png" />
                            <img src="/images/tradingcenter/icon/star.png" />
                            <img src="/images/tradingcenter/icon/star.png" />
                            <img src="/images/tradingcenter/icon/star.png" />
                        </div>
                    </div>
                    <div class="desc">
                        店铺简介：{{{ $shop["description"] }}}
                    </div>
                    <div class="data">
                        <span>累计交易：{{{$shop["dealNum"]}}}</span>
                        <span style="margin-left: 20px;">访问量：{{{$shop["visitNum"]}}}</span>
                    </div>
                </div>
                @endif
    			
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
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
            <p>{{{ $about["content"] }}}</p>
    		<textarea class="hidden about-textarea"></textarea>
    	</div>
    	<div class="block skill">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/5.png" width="20" height="20" />
    			<span>我的技能</span>
    		</div>
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
            <div class="skill-items">
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
    	</div>
    	<div class="block work-experience">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/7.png" width="20" height="20" />
    			<span>工作经历</span>
    		</div>
            <div class="work-items">
                @foreach ($workExperiences as $workExperience)
                <div class="work-item">
                    <span class="hidden id">{{{ $workExperience["id"] }}}</span>
                    <div class="work-time">
                        <span class="start-time">{{{ $workExperience["start_time"] }}}</span> 
                         至 
                        <span class="end-time">{{{ $workExperience["end_time"] }}}</span>
                    </div>
                    <div class="work-content">
                        <span class="description">{{{ $workExperience["description"] }}}</span>
                    </div>
                    <div class="work-icon"></div>
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
    	</div>
    	<div class="block edu-experience">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/6.png" width="20" height="20" />
    			<span>教育经历</span>
    		</div>
            <div class="edu-items">
                @foreach ($eduExperiences as $eduExperience)
                <div class="edu-item">
                    <span class="hidden id">{{{ $eduExperience["id"] }}}</span>
                    <div class="edu-time">
                        <span class="start-time">{{{ $eduExperience["start_time"] }}}</span> 
                         至 
                        <span class="end-time">{{{ $eduExperience["end_time"] }}}</span>
                    </div>
                    <div class="edu-content">
                        <span class="description">{{{ $eduExperience["description"] }}}</span>
                    </div>
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
    	</div>
    	<div class="block awards">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/8.png" width="20" height="20" />
    			<span>个人奖项</span>
    		</div>
            <div class="award-items">
                @foreach ($awards as $award)
                <div class="award-item">
                    <span class="hidden id">{{{ $award["id"] }}}</span>
                    <div class="award-time">
                        <span class="time">{{{ $award["time"] }}}</span>        
                    </div>
                    <div class="award-content">
                        <span class="description">{{{ $award["description"] }}}</span> 
                    </div>
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>
    	</div>
    	<div class="contact block">
    		<div class="contact-avatar">
    			<img src="/images/tradingcenter/icon/13.png" width="150" height="150" />
    		</div>
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
    		<div class="contact-text">
    			<div>
	    			<img src="/images/tradingcenter/icon/14.png"/>
					<span class="title">联系方式</span>    				
    			</div>
    			<div><label>手机：</label><span class="mobile">{{{ $mobile }}}</span></div>
    			<div><label>QQ：</label><span class="qq">{{{ $qq }}}</span></div>
    			<div><label>邮箱：</label><span class="email">{{{ $email }}}</span></div>
    		</div>
    		<div class="clear"> </div>
    	</div>
        <div class="clear"></div>
    </div>
@append


@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/user-info.js"></script>
@stop
