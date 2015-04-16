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
		<h3>身份认证</h3>
		<hr />
		<div class="content-main">
			<div class="content-row">
				<span class="warning">身份认证需要提供本人信息，身份证件扫描件或数码拍摄照片。</span>
				<span class="warning">每张身份证仅可认证一次。</span>
			</div>
			<div class="content-row">
				<label class="label" for="realname">真实姓名：</label>
				<div class="content-input">
					<input type="text" id="realname" name="realname" />
				</div>
				<span class="star">*</span>
			</div>
			<div class="content-row">
				<label class="label" for="id-card-num">身份证号码：</label>
				<div class="content-input">
					<input type="text" id="id-card-num" name="id-card-num" />
				</div>
				<span class="star">*</span>
			</div>
			<div class="content-row">
				<label class="label" for="gender">性别：</label>
				<div class="content-input">
					<input type="text" id="gender" name="gender" />
				</div>
				<span class="star">*</span>
			</div>
			<div class="content-row">
				<label class="label">身份证照片：</label>
				<div class="content-input">
					<div class="identity-photos">
						<div class="identity-photo">
							<span>正面</span>
							<input type="button" id="identity-card-front-btn" class="identity-card-btn btn" value="单击上传" />
							<input type="file" id="identity-card-front" class="identity-card-file" name="identity-card-front" />
						</div>
						<div class="identity-photo">
							<span>反面</span>
							<input type="button" id="identity-card-behind-btn" class="identity-card-btn btn" value="单击上传" />
							<input type="file" id="identity-card-behind" class="identity-card-file" name="identity-card-behind" />
						</div>
						<span class="star" style="line-height: 85px;">*</span>
						<div class="clear"></div>
					</div>
					<div class="text">
						证件要求：<br />
						请上传有效的身份证图片，非证件图片不予受理。<br />
						证件必须是彩色原件电子版，可以是扫描件或者数码拍摄照片。<br />
						仅支持.jpg .bmp .png .gif的图片格式。图片大小不超过 2M
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="content-row">
				<label class="label" for="address">地址：</label>
				<div class="content-input">
					<input type="text" id="address" name="address" />
				</div>
				<span class="star">*</span>
			</div>
			<div class="content-row">
				<label class="label" for="tel">联系电话：</label>
				<div class="content-input">
					<input type="text" id="tel" name="tel" />
				</div>
				<span class="star">*</span>
			</div>
			<div class="content-row">
                <a href="" class="btn" id="authentication-save-btn">提交审核</a>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
@stop
