@extends('tradingCenter.layout')

@section('title')
    <title>丛丛网－身份认证</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/account/authentication.css">
@stop

@section('tradingCenter-left-nav')
    @include('components.left-nav.account-left-nav')
@stop

@section('tradingCenter-content')
	<div class="authentication-content tradingCenter-content">
		<div class="content-header">
            <p class="title">身份认证</p>
            <p class="content line-one">身份认证需要提供本人信息，身份证件扫描件或者数码拍摄照片</p>
            <p class="content">每张身份证仅限认证一次</p>
        </div>
		<div class="content-main">
            @if ($isExist == true)
            <input type="hidden" id="id" value="{{{ $id }}}}" />
            <input type="hidden" id="isExist" value="1" />
            <div class="status">
                @if ($status == 0)
                <img src="/images/icon/1.png" height="16" width="16" />
                <span style="vertical-align:top;">待审核</span>
                @elseif ($status == -1)
                <img src="/images/icon/5.gif" height="16" width="16" />
                <span style="vertical-align:top;">审核未通过</span>
                @else
                <img src="/images/icon/4.png" height="16" width="16" />
                <span style="vertical-align:top;">认证通过</span>
                @endif
            </div>
            @else
            <input type="hidden" id="isExist" value="0" />
            @endif
            <div class="content-row">
                <label class="label" for="realname">真实姓名：</label>
                <div class="content-input"> 
                    @if ($isExist == true && ($status == 1 || $status == 0))
                    <div class="content-text">{{{ $name }}}</div>
                    @else
                    <input type="text" id="realname" name="realname"  required="required" value="{{{ $name }}}" /><span class="require-star">*</span>
                    @endif
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="idnumber">身份证号码：</label>
                <div class="content-input">
                    @if ($isExist == true && ($status == 1 || $status == 0))
                    <div class="content-text">{{{ $credit_id }}}</div>
                    @else
                    <input type="text" id="idnumber" name="idnumber" required="required" value="{{{ $credit_id }}}" /><span class="require-star">*</span>
                    @endif
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="male">性别：</label>
                <div class="content-input">
                    @if ($isExist == true && ($status == 1 || $status == 0))
                        @if ($gender == 1)
                        <div class="content-text">男</div>
                        @else
                        <div class="content-text">女</div>
                        @endif
                    @else
                        @if ($gender == 1)
                        <input type="radio" id="male" name="gender" value="male"  required="required" checked="checked" /> 男 
                        <input type="radio" id="female" name="gender" value="female"  required="required"/> 女<span class="require-star">*</span>
                        @else
                        <input type="radio" id="male" name="gender" value="male"  required="required"/> 男 
                        <input type="radio" id="female" name="gender" value="female"  required="required" checked="checked" /> 女<span class="require-star">*</span>
                        @endif
                    @endif
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="id-img">身份证正面：</label>
                <div class="content-input">
                    <div class="positive img-box" id="positive-wrapper">
                        <label for="positive-file" class="file-label">正面</label>
                        @if ($isExist == true && ($status == 1 || $status == 0))
                        <div class="content-img">
                            <img src="{{{ $credit_front }}}" alt="front" width="105" height="66" />
                            <input type="hidden" id="credit-positive" value="{{{ $credit_front }}}" />
                        </div>
                        @elseif ($isExist == true && $status == -1)
                        <div class="content-img">
                            <img src="{{{ $credit_front }}}" alt="front" width="105" height="66" />
                            <input type="hidden" id="credit-positive" value="{{{ $credit_front }}}" />
                        </div>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="positive-file" id="positive-file"><span class="text">单击上传</span>
                        </a>
                        @else
                        <div class="content-img hidden">
                            <img src="" alt="front" width="105" height="66" />
                            <input type="hidden" id="credit-positive" value="" />
                        </div>
                        <div class="img-border"></div>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="positive-file" id="positive-file"><span class="text">单击上传</span>
                        </a>
                        @endif
                        <div class="clear"></div>
                    </div>
                    <div class="negative img-box" id="negative-wrapper">
                        <label for="negative-file" class="file-label">反面</label>
                        @if ($isExist == true && ($status == 1 || $status == 0))
                        <div class="content-img">
                            <img src="{{{ $credit_behind }}}" alt="behind" width="105" height="66" />
                            <input type="hidden" id="credit-negative" value="{{{ $credit_behind }}}" />
                        </div>
                        @elseif ($isExist == true && $status == -1)
                        <div class="content-img">
                            <img src="{{{ $credit_behind }}}" alt="behind" width="105" height="66" />
                            <input type="hidden" id="credit-negative" value="{{{ $credit_behind }}}" />
                        </div>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="negative-file" id="negative-file"><span class="text">单击上传</span>
                        </a>
                        @else
                        <div class="content-img hidden">
                            <img src="" alt="behind" width="105" height="66" />
                            <input type="hidden" id="credit-negative" value="" />
                        </div>
                        <div class="img-border"></div>
                        <a href="javascript:;" class="a-upload">
                            <input type="file" name="negative-file" id="negative-file"><span class="text">单击上传</span>
                        </a>
                        @endif
                        <div class="clear"></div>
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
                    @if ($isExist == true && ($status == 1 || $status == 0))
                    <div class="content-text">{{{ $address }}}</div>
                    @else
                    <input type="text" id="address" name="address"  required="required" value="{{{ $address }}}" /><span class="require-star">*</span>
                    @endif
                </div>
            </div>
            <div class="content-row">
                <label class="label" for="phone">联系电话：</label>
                <div class="content-input">
                    @if ($isExist == true && ($status == 1 || $status == 0))
                    <div class="content-text">{{{ $phone }}}</div>
                    @else
                    <input type="text" id="phone" name="phone"  required="required" value="{{{ $phone }}}" /><span class="require-star">*</span>
                    @endif
                </div>
            </div>
            <div class="operate-btn">
                @if ($isExist == true)
                    @if ($status == -1)
                    <a href="javascript::void(0);" class="btn" id="edit-btn">提交审核</a>
                    @endif
                @else
                    <a href="javascript::void(0);" class="btn" id="create-btn">提交审核</a>
                @endif
            </div>
        </div>
	</div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src="/lib/js/qiniu/qiniu.min.js"></script> 
    <script type="text/javascript" src="/lib/js/plupload/plupload.full.min.js"></script>
    <script type="text/javascript" src="/dist/js/pages/authentication.js"></script>
@stop

