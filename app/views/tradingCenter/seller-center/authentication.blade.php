@extends('tradingCenter.seller-center.layout')

@section('title')
    <title>丛丛网－身份认证</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/authentication.css">
@stop

@section('seller-content')
	<div class="seller-register-content seller-content">
		<div class="content-header">
            <p class="title">身份认证</p>
            <p class="content line-one">身份呢认证需要提供本人信息，身份证件扫描件或者数码拍摄照片</p>
            <p class="content">每张身份证仅限认证一次</p>
        </div>
		<div class="content-main">
            <div class="content-row">
                <label class="label" for="realname">真实姓名：</label>
                <div class="content-input"> 
                    <input type="text" id="realname" name="realname"  required="required"/><span class="require-star">*</span>
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="idnumber">身份证号码：</label>
                <div class="content-input">
                    <input type="text" id="idnumber" name="idnumber"  required="required"/><span class="require-star">*</span>
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="male">性别：</label>
                <div class="content-input">
                    <input type="radio" id="male" name="male" value="male"  required="required"/> 男 
                    <input type="radio" id="female" name="male" value="female"  required="required"/> 女<span class="require-star">*</span>
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="id-img">身份证正面：</label>
                <div class="content-input">
                    <div class="positive img-box">
                        <label for="positive-file" class="file-label">正面</label>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="positive-file" id="positive-file">单击上传
                        </a>
                    </div>
                    <div class="negative img-box">
                        <label for="negative-file" class="file-label">反面</label>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="negative-file" id="negative-file">单击上传
                        </a>
                    </div>
                    <span class="require-star img-star">*</span>
                    <div class="clear"></div>
                    <div class="tips">
                        <p>证件要求：</p>
                        <p>请上传有效的身份证图片，非正版图片不予受理</p>
                        <p>证件必须是彩色原件电子版，可以是扫描件或者数码拍摄图片</p>
                        <p>仅支持.jpn.bmp.png.gif格式的图片。图片大小不超过2M</p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="content-row">
                <label class="label" for="address" >地址：</label>
                <div class="content-input">
                    <input type="text" id="address" name="address"  required="required" /><span class="require-star">*</span>
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="phone">联系电话：</label>
                <div class="content-input">
                    <input type="text" id="phone" name="phone"  required="required"/><span class="require-star">*</span>
                </div>
            </div>
            <div class="operate-btn">
                <a href="#" class="btn">提交审核</a>
            </div>
        </div>
	</div>
@stop

