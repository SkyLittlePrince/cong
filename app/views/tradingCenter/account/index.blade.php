@extends('layouts.master')

@section('title')
    <title>悬赏任务</title>
@stop
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="/dist/css/tradingCenter/index.css">
@stop

@section('body')
@include('components.header')
@section('page')
    
@show
@include('components.footer')
@stop

@section('js')
    @parent
@stop
