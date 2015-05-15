@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/seller-center/layout.css">
@append

@section('body')
    @parent
    <div id="main">
        @include('components.left-nav.seller-center-left-nav')

       	@yield('seller-content')

        <div class="clear"></div>
    </div>
@append

@section('js')
	@parent
@append

