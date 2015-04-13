@extends('layouts.master')

@section('title')
    <title>倒价竞拍</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/auction/step-1.css">
@stop

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')
        @include('components.left-nav.bounty-hunter-left')
        @include('components.auctionheader')
        
        <div class="step1 auctionstep">
            <form>
                <ul>
                    <li>
                        <label class="label">任务主题：</label>
                        <input type="text" name="title" class="title">
                    </li>
                    <li>
                        <label class="label">中标人数：</label>
                        <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="single" /> 单人 </span>
                        <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="multi" /> 多人 </span>
                        <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="custom" /> 自定义 </span>
                        <input type="text" name="customNumOfAuctionPerson" id="customNumOfAuctionPerson" />
                    </li>
                    <li>
                        <label class="label detail">任务详情：</label>
                        <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
                    </li>
                </ul>
                <div class="accessory">
                    <p>附件上传</p>
                    <div class="img-box">
                        <img src="/images/rewardtask/fileimg.gif" alt="fileimg" class="fileimg" width="109" height="109" />
                    </div>
                    <a href="javascript:;" class="a-upload">
                        <input type="file" name="" id="">选择文件
                    </a>
                </div>
            </form>
            <div class="next-step">
                <a href="/bounty-hunter/auction?step=2" class="btn">下一步</a>
            </div>
        </div>
    </div>
    @include('components.footer')
@stop

@section('js')
    @parent
@stop
