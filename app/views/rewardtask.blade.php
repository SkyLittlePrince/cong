@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/rewardtask.css">
@stop

@section('body')
@include('components.header')
<div id="main">
    @include('components.bountyhunterleft')
    @include('components.rewardtaskheader')
    
    <div class="step1 rewardtaskstep">
        <form>
            <ul>
                <li class="title">
                    <label class="label">任务主题:</label>
                    <div class="col-right">
                        <input type="text" name="title" id="title">
                    </div>
                    <div class="clear"></div>
                </li>
                <li class="price">
                    <label class="label">赏金价格:</label>
                    <div class="col-right">
                        <div>
                            <input type="text" name="price" id="price" class="one-price">
                            <span class="text">元(人民币)</span>
                        </div>
                        <div style="margin-top:10px;">
                            <input type="text" name="anotherprice" id="anotherprice" class="one-price">
                            <input name="currency" type="radio" value="silver" /> <label>银币</label>
                            <input name="currency" type="radio" value="copper" /> <label>铜币</label>                   
                            <input name="currency" type="radio" value="gold" /> <label>金币</label>
                        </div>
                    </div>
                    <div class="clear"></div>
                </li>
                <li class="time">
                    <label class="label">截止时间:</label>
                    <div class="col-right">
                        <input type="text" name="year"><span class="text"> 年</span>
                        <input type="text" name="month"><span class="text"> 月</span>
                        <input type="text" name="day"><span class="text"> 日</span>
                        <input type="text" name="hour"><span class="text"> 时</span>
                    </div>
                    <div class="clear"></div>
                </li>
                <li class="people">
                    <label class="label">中标人数:</label>
                    <div class="col-right">
                        <div>
                            <input name="people" type="radio" value="single" id="single" /><label> 单人</label>
                            <input name="people" type="radio" value="multiple" /><label> 多人</label>                   
                            <input name="people" type="radio" value="custom" /><label> 自定义</label>
                            <input type="text" name="custompeople">
                        </div>
                        
                    </div>
                    <div class="clear"></div>
                </li>
                <li class="detail">
                    <label class="label">任务详情:</label>
                    <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
                </li>
            </ul>
            <div class="accessory">
                <p>附件上传</p>
                <div class="img-box">
                    <img src="./images/rewardtask/fileimg.gif" alt="fileimg" class="fileimg" width="109" height="109" />
                </div>
                <a href="javascript:;" class="a-upload">
                    <input type="file" name="" id="">选择文件
                </a>
            </div>
        </form>
        <div class="next-step">
            <a href="/rewardtask2" class="btn">下一步</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
