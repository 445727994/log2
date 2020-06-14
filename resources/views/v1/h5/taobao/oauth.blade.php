<!-- 保存在 resources/views/child.blade.php 文件中 -->
@extends('layouts.app')
@section('title', e($setting['app_name']))
@section('content')
    <style>
    .msg{
        text-align: center;
        font-size: 1.3rem;
        width: 100%;
        padding-top: 30px;
    }
    </style>
    <header class="aui-header-default aui-header-fixed ">
        <a href="{{ url('index') }}" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{$setting['app_name']}}</div>
            </div>
        </div>
        <a href="javascript:;" class="aui-header-item-icon"   style="min-width:0">

        </a>
    </header>
    <section class="aui-myOrder-content">
        <div class="aui-Sign-content">
            <div class="aui-Sign-btn">
                <div class="msg" href="javascript:;">
                    {{ $msg }}
                </div>
            </div>
        </div>
    </section>

@endsection
