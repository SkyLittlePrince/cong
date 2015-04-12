@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/index.css">
@stop

@section('body')
    @parent
    <div id="main">
        <div class="search-wrapper">
            <input id="search" type="text" />
            <button id="search-btn"></button>
            <div class="clear"></div>
        </div>
        <div id="bounty-hunter-header">
            <div class="nav" style="background-color: #f2914a;color:#fff;">发布任务</div>
            <div class="nav active">同城</div>
            <div class="nav">远程</div>
            <div class="nav last">自动分配</div>
            <div class="clear"></div>
        </div>

        <div class="baner">
            @include('components.bountyhunterleft')
            @include('components.notification-banner')
            <div class="clear"></div>
        </div>

        <div class="content">
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="task">
                <div class="img">
                    <img src="/images/rewardtask/1.png" width="172" height="129" />
                </div>
                <div class="text">品牌设计，vi设计，包装设计，展示设计</div>
                <div class="price">RMB：2000</div>
            </div>
            <div class="clear"></div>
            <div class="more">LOAD MORE</div>
        </div>
        <div class="clear"></div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
