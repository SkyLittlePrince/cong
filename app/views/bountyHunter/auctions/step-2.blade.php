@extends('layouts.master')

@section('title')
    <title>倒价竞拍</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/bountyHunter/auction/step-2.css">
@stop

@section('body')
@include('components.header')
@include('components.task-banner')

<div id="main">
    @include('components.bountyhunterleft')
    @include('components.auctionheader')
    
    <div class="step2 auctionstep">
        <form>
            <ul>
                <li>
                    <label class="label">竞拍起始价：</label>
                    <input type="text" name="title" class="price"> 元（人民币）
                    <input type="text" name="title" class="price">
                    <span>
                        <input type="radio" name="currency" value="copper" /> 铜币 
                        <input type="radio" name="currency" value="silver" /> 银币 
                        <input type="radio" name="currency" value="gold" /> 金币 
                    </span>
                </li>
                <li>
                    <label class="label">竞拍底限价：</label>
                    <input type="text" name="title" class="price"> 元（人民币）
                    <input type="text" name="title" class="price">
                    <span>
                        <input type="radio" name="currency" value="copper" /> 铜币 
                        <input type="radio" name="currency" value="silver" /> 银币 
                        <input type="radio" name="currency" value="gold" /> 金币 
                    </span>
                </li>
                <li>
                    <label class="label">截止时间：</label>
                    <input type="text" name="year" class="time"> 年 
                    <input type="text" name="month" class="time"> 月 
                    <input type="text" name="day" class="time"> 日 
                    <input type="text" name="hour" class="time"> 时                
                </li>
                <li>
                    <label class="label">中标人数：</label>
                    <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="single" /> 单人 </span>
                    <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="multi" /> 多人 </span>
                    <span class="numOfAuctionPerson"><input type="radio" name="numOfAuctionPerson" value="custom" /> 自定义 </span>
                    <input type="text" name="customNumOfAuctionPerson" id="customNumOfAuctionPerson" />
                </li>
                <li>
                    <p class="question">当价位降至竞拍底价时，倒价竞拍是否自动转换成普通悬赏任务？</p>
                </li>
                <li>
                    <div class="isChangeWrapper">
                        <span><input type="radio" name="isChange" value="yes" /> 是 </span>
                        <span><input type="radio" name="isChange" value="no" /> 否 </span>
                    </div>
                </li>
                <li>
                    <span class="endTimeWrapper">
                        <label>普通悬赏任务截止时间：</label>
                        <input type="text" name="year" class="endTime"> 年 
                        <input type="text" name="month" class="endTime"> 月 
                        <input type="text" name="day" class="endTime"> 日 
                        <input type="text" name="hour" class="endTime"> 时     
                    </span> 
                </li>
            </ul>
        </form>
        <div class="next-step">
            <a href="/auction/step-1" class="btn last">上一步</a>
            <a href="/auction/step-3" class="btn next">下一步</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
