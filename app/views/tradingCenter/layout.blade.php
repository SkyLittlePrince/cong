@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/layout.css">
@append

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')

        @yield('tradingCenter-left-nav')

       	@include('components.tradingcenterheader')

       	@yield('tradingCenter-content')
    </div>
    @include('components.footer')
@append

@section('js')

@append
