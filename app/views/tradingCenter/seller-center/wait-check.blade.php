@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－身份认证</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/wait-check.css">
@stop

@section('seller-content')
    <div class="seller-content">
        <div class="content-header">
            <p class="title">等待工作人员审核</p>
            <p class="content line-one">你已经完成卖家审核的资料填写和身份认证，由丛丛网审核，预计需要1-3个工作日的时间，请耐心等候。</p>
            <p class="content">我们会尽快通知你是否通过，若通过则你的工作室创建成功</p>
            <div class="operate-btn">
                <a href="#" class="btn">提交审核</a>
            </div>
        </div>
    </div>
@stop

