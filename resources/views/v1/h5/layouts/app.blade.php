{{--/**--}}
{{-- * Created by yhc<445727994@qq.com>--}}
{{-- * Author: 萤火虫--}}
{{-- * Date: 2020/1/21--}}
{{-- * Time: 10:36--}}
{{-- */--}}
<html>
    <head>
        <title>@yield('title','萤火淘客')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta name="format-detection" content="telephone=no, email=no"/>
        <meta charset="UTF-8">
        <title>@yield('title','萤火淘客')</title>
        <link rel="stylesheet" href="{{ URL::asset('themes/css/core.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/css/icon.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/css/home.css') }}?version=1.0">
        <link rel="stylesheet" href="{{ URL::asset('/layui/css/layui.css') }}">
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('favicon.ico') }}">
        <link href="{{ URL::asset('iTunesArtwork@2x.png') }}" sizes="114x114" rel="apple-touch-icon-precomposed">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/weui/css/weui.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('themes/weui/css/weuix.css') }}">
        <script src="{{ URL::asset('themes/weui/js/zepto.min.js') }}"></script>
        <script src="{{ URL::asset('themes/weui/js/zepto.weui.js') }}"></script>
        <script src="{{ URL::asset('themes/weui/js/iscroll-lite.js') }}"></script>
        <script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.min.js"></script>
        <script src="{{ URL::asset('/layui/layui.js') }}"></script>
        <script src="{{URL::asset('/layui/ajaxYhc.js')}}?time=22"></script>
    </head>
    <body style="background:#eee">
        @yield('content')
    </body>
    <footer class="aui-footer-default aui-footer-fixed">
        <a href="{{url("home/index")}}" class="aui-footer-item  @if($footStatus==0)  aui-footer-active @endif">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-home"></span>
            <span class="aui-footer-item-text">首页</span>
        </a>
        <a href="{{url("home/cate")}}" class="aui-footer-item @if($footStatus==1)  aui-footer-active @endif">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-class"></span>
            <span class="aui-footer-item-text">分类</span>
        </a>
        <a href="{{url('home/change')}}" class="aui-footer-item @if($footStatus==2)  aui-footer-active @endif">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-find"></span>
            <span class="aui-footer-item-text">链接转换</span>
        </a>
        <a href="Javascript:;" class="aui-footer-item @if($footStatus==3)  aui-footer-active @endif">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
            <span class="aui-footer-item-text">待开发</span>
        </a>
        <a href="{{url('user/index')}}" class="aui-footer-item @if($footStatus==4)  aui-footer-active @endif">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
            <span class="aui-footer-item-text">我的</span>
        </a>
    </footer>
</html>
