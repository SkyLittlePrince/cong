<header>
<div id="header">
    <a href="/" class="logo" style="height: 80px;">
        <img src="/images/common/logo-1.png" alt="logo" class="head-portrait" width="160" height="80" />
    </a>
    <ul class="nav">
        <li>
            <a href="/">首页</a>
        </li>
        <li>
            <a href="/trading-center/buyer">交易中心</a>
        </li>
        <li>
            <a href="/bounty-hunter">赏金猎人</a>
        </li>
    </ul>
    <!-- 用户已经登录 -->
    <ul class="user-info">
        @if (Sentry::check())
            <li class="info">
                <a href="#">
                    <img src="/images/common/avatar.png" alt="avatar">
                    <span>Vivine</span>
                </a>
            </li>
            <li class="message">
                <a href="#">
                    (<span>6</span>)
                </a>
            </li>
            <li class="help">
                <a href="#">
                    
                </a>
            </li>
            <li class="cart">
                <a href="/shopping-cart">
                    
                </a>
            </li>
            <li class="logout">
                <a href="javascript:void(0);" id="logout">

                </a>
            </li>
        @else 
            <li class="person">
               <a href=""> </a> 
            </li>
            <li class="register">
                <a href="/user/register">注册</a> / 
            </li>
            <li class="login">
                <a href="/user/login">登录</a>
            </li>
             <li class="help">
                <a href="#">
                    
                </a>
            </li>
        @endif
    </ul>
    <!-- 用户未登录 -->
</div>

</header>