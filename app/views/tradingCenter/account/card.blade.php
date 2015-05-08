@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－名片</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/card.css">
@stop

@section('tradingCenter-left-nav')
    @include('components..left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="card-content tradingCenter-content">
		<h3>名片
			<div class="operation">
	            <div class="edit-btn">编辑</div>
	            <div class="hidden save-btn">保存</div>
	            <div class="hidden cancel-btn">取消</div>
	        </div>
		</h3>
		<hr />
		<div class="content-main">
			<div class="img-info">
				<img src="/images/common/avatar.png" alt="avatar">
			</div>
			<div class="word-info">
				<p class="work1">Vivine 学号 FC634085</p>
				<p class="work2 text1">中国 广东 广州</p>
				<p class="work2 description">{{{ $description }}}</p>
				<textarea class="hidden about-description"></textarea>
				<p class="work3 text2">我擅长：平面设计 日语 <span>我的成绩：近三月收入0元</span></p>
				<p class="work3">好评率：30%</p>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/dist/js/pages/card.js"></script>
@stop
