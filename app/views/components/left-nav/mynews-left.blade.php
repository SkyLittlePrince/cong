<div id="mynews-left-nav" class="left-nav-bar">
    <div id="user-info-banner">
        <div class="user-info">
            <div class="avatar component">
                <img id="user-info-banner-avatar" src="/images/common/avatar.png" alt="avatar" width="50" height="50" />
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
                <a href="/trading-center/mynews/trading-reminder" class="nav-item">交易提醒</a>
            </li>
            <li>
                <a href="/trading-center/mynews/notification" class="nav-item">活动通知</a>
                <!-- <ul class="sub-nav"> -->
                    <!-- <li><a href="/trading-center/mynews/history">聊天记录</a></li> -->
                <!-- </ul> -->
            </li>
  <!--           <li>
                <a href="/trading-center/mynews/setting" class="nav-item">消息设置</a>
            </li> -->
        </ul>
    </div>
</div>
