@extends('layouts.master')

@section('title')
    <title>丛丛网－首页</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/home.css">
@stop

@section('body')
    @parent
    <div id="main">
        <div id="slider">
            <ul>
                <li>
                    <img src="/images/slider/slider1.png" alt="slider1">
                </li>
                <li>
                    <img src="/images/slider/slider1.png" alt="slider1">
                </li>
                <li>
                    <img src="/images/slider/slider1.png" alt="slider1">
                </li>
                <li>
                    <img src="/images/slider/slider1.png" alt="slider1">
                </li>
                <li>
                    <img src="/images/slider/slider1.png" alt="slider1">
                </li>
            </ul>
        </div>
        <div id="search-bar">
            <div class="search-bg">
                <div class="search-container search-container-bg"></div>
            </div>  
            <div class="search-box search-container">
                <form action="/search">
                    <div class="search-box-container">
                        <input type="text" name="search" placeholder="Search here">
                    </div>
                    <button>
                        <!-- <img src="./images/common/search-btn.png" alt="search-btn"> -->
                    </button>
                </form>
            </div>
        </div>

        <div id="button-pic">
            <img src="/images/common/button-pic.png" alt="button-pic">
        </div>

        <div id="process">
            <img src="/images/common/liucheng.png" alt="process">
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/lib/jquery/unslider.js'></script>
    <script type="text/javascript" src='/dist/js/pages/home.js'></script>
@stop
