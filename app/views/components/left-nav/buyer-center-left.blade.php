<div id="buyer-left-nav" class="left-nav-bar">
	<div id="user-info-banner">
		<div class="user-info">
			<div class="avatar component">
				<img id="user-info-banner-avatar" src="{{{ Sentry::getUser()->avatar }}}" alt="avatar" width="50" height="50" />
			</div>
			<div class="info component">
				<p id="user-info-banner-username">{{{ Sentry::getUser()->username }}}</p>
				<p id="user-info-banner-gender">
					@if (Sentry::getUser()->gender == 1)
					男
					@else
					女
					@endif
				</p>
			</div>
		</div>
		<div class="address-info">
			@if (isset(Sentry::getUser()->country) && isset(Sentry::getUser()->province) && isset(Sentry::getUser()->city))
			<ul>
				<li>{{{ Sentry::getUser()->country }}}</li>
				<li>{{{ Sentry::getUser()->province }}}</li>
				<li>{{{ Sentry::getUser()->city }}}</li>
			</ul>
			@else
			<div class="no-region">未知地区</div>
			@endif
		</div>
	</div>
	<div class="nav">
		<ul>
			<li>
				<a href="/trading-center/buyer/trading-list" class="nav-item">交易管理</a>
			</li>
			<li>
				<a href="/trading-center/buyer/comment-manage" class="nav-item">评价管理</a>
			</li>
			<li>
				<a href="/trading-center/buyer/invite" class="nav-item">邀请站外好友</a>
			</li>
		</ul>
	</div>
</div>


