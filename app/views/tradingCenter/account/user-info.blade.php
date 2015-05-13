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
        <input type="hidden" id="user_id" value="{{{ $id }}}" />
    	<div class="base-info block">
    		<div class="avatar">
    			<img src="/images/tradingcenter/icon/13.png" width="252" height="252" />
    		</div>
            @if (Sentry::check() && Sentry::getUser()->id == $id)
          <!--   <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div> -->
            @endif
    		<div class="info">
    			<div class="name">
    				Vivine <br />
    				注册时间： {{{ $created_at }}}
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
                            @if (isset($shop["tags"]))
                                @foreach ($shop["tags"] as $tag)
                                    {{{$tag["name"]}}}
                                @endforeach
                            @endif
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
                        <span style="margin-left: 20px;">
                            <a target="_blank" href="/trading-center/seller/seller-store?shop_id={{{ $shop['id'] }}}">进入店铺</a>
                        </span>
                    </div>
                </div>
                @endif
    			
    			<div class="talk">
    				<span><img src="/images/tradingcenter/icon/9.png" height="23" width="25"></span>
                    <input type="button" id="talk-btn" value="谈一谈" class="btn" />
                    <input type="button" id="add-friend-btn" value="加为好友" class="btn hidden" />
    				<input type="button" id="delete-friend-btn" value="删除好友" class="btn hidden" />
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="block about">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/4.png" width="20" height="20" />
    			<span>关于我</span>
    		</div>
            @if (Sentry::check() && Sentry::getUser()->id == $id)
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
            @endif
            <p>{{{ $about["content"] }}}</p>
    		<textarea class="hidden about-textarea"></textarea>
    	</div>
    	<div class="block skill">
    		<div class="tag">
    			<img src="/images/tradingcenter/icon/5.png" width="20" height="20" />
    			<span>我的技能</span>
    		</div>
            @if (Sentry::check() && Sentry::getUser()->id == $id)
               
            @endif
            <div class="skill-items">
                @foreach ($skills as $skill)
                <div class="skill-item">
                    <span class="skill-id hidden">{{{ $skill['id'] }}}</span>
                    <span class="skill-name">{{{ $skill["name"] }}}</span>
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <img src="/images/tradingcenter/icon/delete.png" class="hidden del-btn-skill" />
                    @endif
                </div>
                @endforeach
                @if (Sentry::check() && Sentry::getUser()->id == $id)
                <div class="skill-add">
                    <img class="add-btn-img" src="/images/tradingcenter/icon/add.png" />
                </div>
                @endif
                <div class="clear"></div>
                <script type="text-template" id="skillTemplate">
                    <div class="skill-item">
                        <span class="skill-id hidden"><%= newSkillId %></span>
                        <span class="skill-name"><%= name %></span>
                        <img src="/images/tradingcenter/icon/delete.png" class="hidden del-btn-skill" />
                    </div>
                </script>
                <div class="bg hidden"></div>
                <div class="show hidden">
                    <span  class="skill-name">
                        <input type="text" placeholder="技能"/>
                    </span>
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                        <div class="add-save-btn">添加</div>
                        <div class="add-cancel-btn">取消</div>
                    @endif
                </div>
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
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="del-btn">删除</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
                @endforeach
                <script type="text-template" id="workExperienceTemplate">
                    <div class="work-item">
                        <span class="hidden id"><%= newWorkExperienceId %></span>
                        <div class="work-time">
                            <span class="start-time"><%= startTime %></span> 
                             至 
                            <span class="end-time"><%= endTime %></span>
                        </div>
                        <div class="work-content">
                            <span class="description"><%= description %></span>
                        </div>
                        <div class="operation">
                            <div class="edit-btn">编辑</div>
                            <div class="del-btn">删除</div>
                            <div class="hidden save-btn">保存</div>
                            <div class="hidden cancel-btn">取消</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </script>
                <div class="work-item">
                    <div class="work-time hidden">
                        <span class="start-time">
                            <input type="text" placeholder="起始时间" />
                        </span> 
                         至 
                        <span class="end-time">
                            <input type="text" placeholder="截止时间" />
                        </span>
                    </div>
                    <div class="work-content hidden">
                        <span class="description">
                            <input type="text" placeholder="详细描述" />
                        </span>
                    </div>
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="add-btn">+新增</div>
                        <div class="hidden add-save-btn">保存</div>
                        <div class="hidden add-cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
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
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="del-btn">删除</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
                @endforeach
                <script type="text-template" id="eduExperienceTemplate">
                    <div class="edu-item">
                        <span class="hidden id"><%= newEduExperienceId %></span>
                        <div class="edu-time">
                            <span class="start-time"><%= startTime %></span> 
                             至 
                            <span class="end-time"><%= endTime %></span>
                        </div>
                        <div class="edu-content">
                            <span class="description"><%= description %></span>
                        </div>
                        <div class="operation">
                            <div class="edit-btn">编辑</div>
                            <div class="del-btn">删除</div>
                            <div class="hidden save-btn">保存</div>
                            <div class="hidden cancel-btn">取消</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </script>
                <div class="edu-item">
                    <span class="hidden id">
                        
                    </span>
                    <div class="edu-time hidden">
                        <span class="start-time">
                            <input type="text" placeholder="起始时间" />
                        </span> 
                         至 
                        <span class="end-time">
                            <input type="text" placeholder="截止时间" />
                        </span>
                    </div>
                    <div class="edu-content hidden">
                        <span class="description">
                            <input type="text" placeholder="详细描述" />
                        </span>
                    </div>
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="add-btn">+新增</div>
                        <div class="hidden add-save-btn">保存</div>
                        <div class="hidden add-cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
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
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="edit-btn">编辑</div>
                        <div class="del-btn">删除</div>
                        <div class="hidden save-btn">保存</div>
                        <div class="hidden cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
                @endforeach
                <script type="text-template" id="awardTemplate">
                    <div class="award-item">
                        <span class="hidden id"><%= newAwardId %></span>
                        <div class="award-time">
                            <span class="time"><%= time %></span>        
                        </div>
                        <div class="award-content">
                            <span class="description"><%= description %></span> 
                        </div>
                        <div class="operation">
                            <div class="edit-btn">编辑</div>
                            <div class="del-btn">删除</div>
                            <div class="hidden save-btn">保存</div>
                            <div class="hidden cancel-btn">取消</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </script>
                <div class="award-item">
                    <div class="award-time">
                        <span class="time">
                            <input type="text" class="hidden" placeholder="获奖时间" />
                        </span>        
                    </div>
                    <div class="award-content">
                        <span class="description">
                            <input type="text" class="hidden" placeholder="获奖描述" />
                        </span> 
                    </div>
                    @if (Sentry::check() && Sentry::getUser()->id == $id)
                    <div class="operation">
                        <div class="add-btn">+新增</div>
                        <div class="hidden add-save-btn">保存</div>
                        <div class="hidden add-cancel-btn">取消</div>
                    </div>
                    @endif
                    <div class="clear"></div>
                </div>
            </div>
    	</div>
        <div class="friends block">
            @foreach ($friends as $friend)
                <div class="friend">
                    <div class="friend-avatar">
                        <img src="{{{ $friend['head'] }}}" width="50" height="50" />
                    </div>  
                    <div class="friend-name">
                        <a href="/trading-center/account/user-info?user_id={{{$friend['id']}}}">{{{$friend["username"]}}}</a>
                    </div>               
                </div>
            @endforeach
            <div class="clear">{{ $friend_links->links() }}</div>
            <div class="clear"></div>
        </div>
    	<div class="contact block">
    		<div class="contact-avatar">
    			<img src="/images/tradingcenter/icon/13.png" width="150" height="150" />
    		</div>
            @if (Sentry::check() && Sentry::getUser()->id == $id)
            <div class="operation">
                <div class="edit-btn">编辑</div>
                <div class="hidden save-btn">保存</div>
                <div class="hidden cancel-btn">取消</div>
            </div>
            @endif
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
    <script type="text/javascript" src="/lib/js/lodash/lodash.js"></script>
	<script type="text/javascript" src="/dist/js/pages/user-info.js"></script>
@stop
