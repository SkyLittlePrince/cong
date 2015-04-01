<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	@section('title')
	<title></title>
	@show
	<meta http-equiv="keywords" content="丛丛网">
	<meta http-equiv="description" content="丛丛网">
	@section('css')
	<link rel="stylesheet" href="/dist/css/common.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/dist/css/components.css" rel="stylesheet" type="text/css">
	@show
</head>

<body style="margin:0">
	<div id="container">
		@section('body')
			<div></div>
		@show
	</div>
	@section('js')
	<script type="text/javascript" src='/dist/js/lib/jquery/jquery-1.11.2.min.js'></script>
	<script type="text/javascript" src='/dist/js/common.js'></script>
	@show
</body>
<html>
