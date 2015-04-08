@extends('layouts.master')

@section('title')
    <title>丛丛网－首页</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="./dist/css/employer/employerhome.css">
@stop

@section('body')
@include('components.header')
<div id="main">
    @include('components.task-banner')
    @include('components.employerleft')
    @include('components.tradingcenterheader')
</div>
@include('components.footer')
@stop

@section('js')
    @parent
@stop
