@extends('layouts.master')

@section('title')
    <title>丛丛网－用户管理</title>
@stop
@section('css')
    @parent




    <link rel="stylesheet" type="text/css" href="/dist/css/admin/user-manager.css">
@stop

@section('body')
    @parent
    <div id="main">
        @include('components.task-banner')
        @include('components.left-nav.admin-left')
        @include('components.adminheader')

        <div class="admin-component message-setting my-self-checkbox">
            <div class="message-wrapper">

                <div class="my-order">
                    <div class="order-banner">客户数据</div>
                    <div class="list-banner">
                        <ul>
                            <li class="c_name">客户名</li>
                            <li class="c_phone">QQ</li>
                            <li class="address">地址</li>
                            <li class="more">更多信息</li>
                        </ul>
                    
                    </div>
                    <div class="messages">
                        @foreach ($users as $user)
                        <div class="one-order">
                            <div class="order-name order-component">
                                <span "c_name" id="realname" > {{{$user->username}}} </span>
                            </div>
                            <div class="order-phone order-component">
                                @if ($user->qq)
                                <span "c_phone" id="QQ"> {{{$user->qq}}} </span>
                                @else
                                    <span "c_phone" id="QQ"> 该用户尚未提交QQ </span>
                                @endif
                            </div>
                            <div class="order-address order-component">
		      @if ($user->address)
                                <span  id="address"> {{{$user->address}}} </span>
                                @else
                                    <span  id="address"> 该用户尚未提交地址</span>
                                @endif
                            </div>
                            <div class="order-more order-component">
                                <a href="/admin/user-manager-edit?id={{$user->id}}" >更多&nbsp;&nbsp;&nbsp;</a>
                                <a class="del" href="deleteUser?id={{$user->id}}"  id="del-btn">删除</a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                @if(count($users) < $users->getTotal())
                    {{$users->links();}}
                @endif
               </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop

@section('js')
    @parent
    <script type="text/javascript" src='/dist/js/pages/user-manager.js'></script>
@stop
