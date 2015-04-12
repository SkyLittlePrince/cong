@extends('layouts.master')

@section('title')
    <title>倒价竞拍</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/auction/step-3.css">
@stop

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')
        @include('components.bountyhunterleft')
        @include('components.auctionheader')
        
        <div class="step3 auctionstep">
            <form>
                <ul>
                    <li>
                        <label class="label">任务主题：</label>
                        <span>广州紫睿科技有限公司</span>
                    </li>
                    <li>
                        <label class="label">赏金价格：</label>
                        <span>100元</span>
                        <span>20个铜币</span>
                    </li>
                    <li>
                        <label class="label">请预付：</label>
                        <span class="prepay">100元</span>
                        <span class="prepay">20个铜币</span>
                    </li>
                </ul>
            </form>
            <div class="next-step">
                <a href="/bounty-hunter/auction?step=2" class="btn last">上一步</a>
                <a href="/bounty-hunter/auction?step=4" class="btn next">现在支付</a>
            </div>
        </div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
