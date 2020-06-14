@extends('layouts.app')
@section('title', e($setting['app_name']))
@section('content')


    <header class="aui-header-default aui-header-fixed ">
    <a href="javascript:history.back(-1)" class="aui-header-item">
        <i class="aui-icon aui-icon-back"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <div class="aui-header-title-default">
            邀请好友，我得奖
        </div>
    </div>
    <a href="#" class="aui-header-item-icon"   style="min-width:0">
        <i class="aui-icon aui-icon-share"></i>
    </a>
</header>
<div class="aui-invitation-bg"></div>
<div class="" style="text-align: center;margin: .5rem">
    <img src="{{$url}}" style="width: 300px">
</div>

@endsection

