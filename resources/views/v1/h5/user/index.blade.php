@extends('layouts.app')
@section('title', e($setting['app_name']))
@section('content')
    <div id="scrollBg"></div>
    <header class="aui-header-default aui-header-fixed aui-header-clear-bg " style="background:none; border-bottom:0">
        <a href="#" class="aui-header-item">
            <i class="aui-icon aui-icon-back-white" id="scrollSearchI" style="display:block"></i>
            <div id="scrollSearchDiv">
                <img src="{{ URL::asset('themes/img/user/head-2.jpg') }}" alt="">
            </div>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="">

            </div>
        </div>
        <a href="" class="aui-header-item-icon">
            <i class="aui-icon aui-icon-Sets"></i>
        </a>
    </header>
    <section class="aui-me-content" style="padding-top:0;">
        <div class="aui-me-content-box">
            <!--<div class="aui-me-content-info"></div> 弧度背景 临时 注释  -->
            <div class="aui-me-content-list">
                <div class="aui-me-content-item">
                    <div class="aui-me-content-item-head">
                        <div class="aui-me-content-item-img">
                            <img src="{{$user['wx_head_img']}}" alt="">
                        </div>
                        <div class="aui-me-content-item-title">{{$user['wx_nickname']}}</div>
                    </div>
                    <div class="aui-me-content-item-text">
                        <a href="">
                            <span>{{$user['credit']}}</span>
                            <span>佣金</span>
                        </a>
                        <a href="">
                            <span>{{$user['userMoney']['predict_money']}}</span>
                            <span>待结算</span>
                        </a>
                        {{--                    <a href="my-orders.html">--}}
                        {{--                        <span>99</span>--}}
                        {{--                        <span>足迹</span>--}}
                        {{--                    </a>--}}
                        {{--                    <a href="my-orders.html">--}}
                        {{--                        <span>65</span>--}}
                        {{--                        <span>分享</span>--}}
                        {{--                    </a>--}}
                    </div>
                </div>
                {{--            <div class="aui-me-content-card">--}}
                {{--                <h3><i class="aui-icon aui-card-me"></i>plus会员</h3>--}}
                {{--                <a href="my-membership.html">开通享8大权益</a>--}}
                {{--            </div>--}}
            </div>
        </div>
        <div class="aui-me-content-order">
            <a href="{{url('user/order')}}" class="aui-well aui-fl-arrow">
                <div class="aui-well-bd">我的订单</div>
                <div class="aui-well-ft">查看全部</div>
            </a>
        </div>
        <section class="aui-grid-content">
            <div class="aui-grid-row">
                <a href="{{url('user/order')}}?status=12" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-wallet"></i>
                    <p class="aui-grid-row-label">已付款</p>
                </a>
                <a href="{{url('user/order')}}?status=14" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-goods"></i>
                    <p class="aui-grid-row-label">确认收货</p>
                </a>
                <a href="{{url('user/order')}}?status=3" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-receipt"></i>
                    <p class="aui-grid-row-label">已结算</p>
                </a>
            </div>
            <div class="aui-dri"></div>
            <div class="aui-grid-row">
                <a href="{{url("user/invitation")}}" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-invitation"></i>
                    <p class="aui-grid-row-label">邀请好友</p>
                </a>
                <a href="{{url("user/help")}}" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-help"></i>
                    <p class="aui-grid-row-label">帮助中心</p>
                </a>
                {{--            <a href="my-sign.html" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-signs"></i>--}}
                {{--                <p class="aui-grid-row-label">签到领币</p>--}}
                {{--            </a>--}}
                {{--            <a href="my-coupon.html" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-coupon"></i>--}}
                {{--                <p class="aui-grid-row-label">优惠券</p>--}}
                {{--            </a>--}}
                {{--            <a href="my-purchase.html" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-fight"></i>--}}
                {{--                <p class="aui-grid-row-label">我的拼团</p>--}}
                {{--            </a>--}}
                {{--            <a href="#" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-recommend"></i>--}}
                {{--                <p class="aui-grid-row-label">商品推手</p>--}}
                {{--            </a>--}}
                {{--            <a href="#" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-recharge"></i>--}}
                {{--                <p class="aui-grid-row-label">充值中心</p>--}}
                {{--            </a>--}}

                {{--            <a href="#" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-problem"></i>--}}
                {{--                <p class="aui-grid-row-label">我的问答</p>--}}
                {{--            </a>--}}
                {{--            <a href="#" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-evaluates"></i>--}}
                {{--                <p class="aui-grid-row-label">我的评价</p>--}}
                {{--            </a>--}}
                {{--            <a href="#" class="aui-grid-row-item">--}}
                {{--                <i class="aui-icon-large aui-icon-large-sm aui-icon-shares"></i>--}}
                {{--                <p class="aui-grid-row-label">我的分享</p>--}}
                {{--            </a>--}}
            </div>

        </section>
    </section>
@endsection
