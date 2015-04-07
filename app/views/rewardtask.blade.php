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
    
    <div class="step1">
        <form>
            <ul>
                <li class="title">
                    <label for="title">任务主题:</label>
                    <input type="text" name="title" id="title">
                </li>
                <li class="price">
                    <label for="price">赏金价格:</label>
                    <input type="text" name="price" id="price" class="one-price"><span class="text">元(人民币)</span>
                    <br/ >
                    <input type="text" name="anotherprice" id="anotherprice" class="one-price">
                    <label><input name="currency" type="radio" value="silver" />银币</label>
                    <label><input name="currency" type="radio" value="copper" />铜币 </label>                   
                    <label><input name="currency" type="radio" value="gold" />金币 </label>
                </li>
                <li class="time">
                    <label>截止时间:</label>
                    <input type="text" name="year"><span class="text">年</span>
                    <input type="text" name="month"><span class="text">月</span>
                    <input type="text" name="day"><span class="text">日</span>
                    <input type="text" name="hour"><span class="text">时</span>
                </li>
                <li class="people">
                    <label>中标人数:</label>
                    <label><input name="people" type="radio" value="single" id="single" />单人</label>
                    <label><input name="people" type="radio" value="multiple" />多人 </label>                   
                    <label><input name="people" type="radio" value="custom" />自定义 </label>
                    <input type="text" name="custompeople">
                </li>
                <li class="detail">
                    <label>任务详情:</label>
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
            <a href="" class="btn">下一步</a>
        </div>
    </div>
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
