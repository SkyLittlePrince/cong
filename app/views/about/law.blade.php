@extends('layouts.master')

@section('title')
    <title>丛丛网－公司简介</title>
@stop

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/about/law.css">
@stop

    

@section('body')
	<div class="left">
		@include('components.left-nav.about-left-nav')
	</div>
	<div class="law">
		<p class="title">丛丛提醒您：</p>
    	<p>在使用丛丛平台各项服务前，请您务必仔细阅读并透彻理解本声明。
    	您可以选择不使用丛丛平台服务，但如果您使用丛丛平台服务的，
    	您的使用行为将被视为对本声明全部内容的认可。
    	“丛丛平台”指由广州翊升网络有限公司（简称“丛丛”）
    	运营的网络交易平台，域名为mycongcong.com以及丛丛启用的其他域名。
    	</p>
    	<p>丛丛平台上关于丛丛平台会员或其发布的相关商品
    	（包括但不限于店铺名称、公司名称、 联系人及联络信息，
    	产品的描述和说明，相关图片、视讯等）的信息均由会员自行提供，
    	会员依法应对其提供的任何信息承担全部责任。
    	</p>
    	<p>丛丛尊重并保护所有使用丛丛平台服务用户的个人隐私权。
    	为了给您提供更准确、更有个性化的服务，
    	丛丛会按照本隐私权政策的规定使用和披露您的个人信息。
    	但丛丛将以高度的勤勉、审慎义务对待这些信息。
    	除本隐私权政策另有规定外，在未征得您事先许可的情况下，
    	丛丛不会将这些信息对外披露或向第三方提供。
    	丛丛会不时更新本隐私权政策。 您在同意丛丛服务协议之时，
    	即视为您已经同意本隐私权政策全部内容。
    	本隐私权政策属于丛丛服务协议不可分割的一部分。
    	</p>
	</div>
	<div class="foot"></div>
@stop

@section('js')
	@parent
	
@stop
