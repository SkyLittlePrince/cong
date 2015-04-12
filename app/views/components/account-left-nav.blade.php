<div id="account-left-nav">
    @include('components.user-info-banner')
    <div class="nav">
        <ul>
            <li>
                <a href="javascript:void(0);" class="nav-item nav-a">我的账号</a>
                <ul class="sub-nav">
                    <li><a href="/account/base-info">基本信息</a></li>
                    <li><a href="/account/contact">联系方式</a></li>
                    <li><a href="/account/address">邮寄地址</a></li>
                    <li><a href="/account/card">名片</a></li>
                </ul>
            </li>
            <li>
                <a href="/account/user-info" class="nav-item">个人资料</a>
            </li>
            <li>
                <a href="javascript:void(0);" class="nav-item nav-a">账户绑定</a>
                <ul class="sub-nav">
                    <li><a href="/account/bind-phone">手机绑定</a></li>
                    <li><a href="/account/bind-email">邮箱绑定></a></li>
                    <li><a href="/account/bind-weibo">微博绑定</a></li>
                </ul>
            </li>
            <li>
                <a href="/account/authentication" class="nav-item">身份认证</a>
            </li>
            <li>
                <a href="javascript:void(0);" class="nav-item nav-a">账号安全</a>
                <ul class="sub-nav">
                    <li><a href="/account/change-password">修改登录密码</a></li>
                    <li><a href="/account/protect-login">账号登录保护</a></li>
                    <li><a href="/account/protect-password">账号密码保护</a></li>
                </ul>
            </li>
            <li>
                <a href="/account/pay-account" class="nav-item">支付账户管理</a>
            </li>
        </ul>
    </div>
</div>
