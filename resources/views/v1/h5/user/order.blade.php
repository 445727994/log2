@extends('layouts.app')
@section('title', e($setting['app_name']))
@section('content')

    <header class="aui-header-default aui-header-fixed  aui-header-clear-bg">
        <a href="javascript:history.back(-1)" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-search-box" style="background-color:#fff">
                <i class="aui-icon aui-icon-small-search"></i>
                <input type="text" id="search_input"  placeholder="输入订单号搜索" class="aui-header-search">
            </div>
        </div>
        <a href="javaScript:;" id="search" class="aui-header-item-icon"   style="position:absolute; right:-35px; top:0;">
            <i class="aui-icon aui-icon-search"></i>
        </a>
        <div id="scrollBg"></div>
    </header>
    <section class="aui-myOrder-content">
        <div class="m-tab demo-small-pitch" data-ydui-tab>
            <div class="aui-myOrder-fix">
                <ul class="tab-nav">
                    <li class="tab-nav-item @if($status==0)  tab-active  @endif"><a href="javascript:;">全部</a></li>
                    <li class="tab-nav-item @if($status==12)  tab-active  @endif" data-status="12"><a href="javascript:;">已付款</a></li>
                    <li class="tab-nav-item @if($status==14)  tab-active  @endif" data-status="14"><a href="javascript:;">确认收货</a></li>
                    <li class="tab-nav-item @if($status==3)  tab-active  @endif" data-status="3"><a href="javascript:;">结算成功</a></li>
                </ul>
            </div>
{{--            <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>双十一期间发货及物流时效公告</div>--}}
            <div class="tab-panel">
                <div class="tab-panel-item tab-active"  >
                    <ul id="scroll">


                    </ul>
                </div>

            </div>
        </div>
    </section>
    <script src="{{URL::asset('themes/js/template-web.js')}}"></script>
    <script type="text/javascript">
        var page = 1;
        $(function () {
            var windowHeight = $(window).height();
            layui.use('laytpl', function (laytpl) {
                var winH = $(window).height();
                laytpl.config({
                    open: '<%',
                    close: '%>'
                });
                var is_load=false;
                getList(page);
                //绑定滚动条事件
                //绑定滚动条事件
                $(window).bind("scroll", function () {
                    var sTop = $(window).scrollTop();
                    //搜索栏事件
                    if (sTop >= 40) {
                        if (!$("#scrollBg").is(":visible")) {
                            try {
                                $("#scrollBg").slideDown();
                            } catch (e) {
                                $("#scrollBg").show();
                            }
                        }
                    } else {
                        if ($("#scrollBg").is(":visible")) {
                            try {
                                $("#scrollBg").slideUp();
                            } catch (e) {
                                $("#scrollBg").hide();
                            }
                        }
                    }
                    var scrollHeight = $("#scroll").outerHeight(true);
                    if (sTop + windowHeight > scrollHeight){
                        if(is_load){
                            return ;
                        }
                        page = page+1;
                        console.log(page);
                        getList(page);
                    }
                    //滑动加载
                })
                $("#search").bind('click', function () {
                    getList(page)
                })
                function getList(page, cate = "", sort = "") {
                    is_load=true;
                    var status=$('.tab-active').data('status');
                    var keywords=$("#search_input").val();
                    var postData = {page: page,status:status, keywords: keywords, cate: cate, sort: sort};
                    ajaxYhc('post', "{{url('user/order')}}", postData, function (res) {
                        is_load=false;
                        var getTpl = orders.innerHTML
                            , view = document.getElementById('scroll');
                        laytpl(getTpl).render(res.data, function (html) {
                            if(page==1){
                                view.innerHTML ='';
                            }
                            view.innerHTML = view.innerHTML+ html;

                        });
                    }, function (res) {
                    });
                }
                $(".tab-nav-item").on("click",function () {
                    console.log('a');
                    $(".tab-nav-item").removeClass('tab-active');
                    $(this).addClass('tab-active');
                    getList(page);
                })
            })
        })
        function money($arr) {
            if($arr[0]!='' && $arr[0]!=undefined){
                return '佣金：'+$arr[0].credit;
            }
            return "";
        }
        function status($status) {
            switch ($status){
                case 1:
                    $status='超时未付款';
                    break;
                case 2:
                    $status='取消订单';
                    break;
                case 3:
                    $status='退款成功';
                    break;
                case 12:
                    $status='订单付款';
                    break;
                case 13:
                    $status='订单关闭';
                    break;
                case 14:
                    $status='确认收货';
                    break;
                default:
                    $status='未知';
                    break;
            }
            return $status;
        }
    </script>
    <script id="orders" type="text/html">
        <%#  layui.each(d, function(index, item){ %>
        <li>
            <div class="aui-list-title-info">
                <a href="#" class="aui-well ">
                    <div class="aui-well-bd"><% item.paid_time %></div>
                    <div class="aui-well-ft"><% status(item.status) %></div>
                </a>
                <a href="javascript:;" class="aui-list-product-fl-item">
                    <div class="aui-list-product-fl-img">
                        <img src="<% item.item_img %>" alt="">
                    </div>
                    <div class="aui-list-product-fl-text">
                        <h3 class="aui-list-product-fl-title"><% item.title %></h3>
                        <div class="aui-list-product-fl-mes">
                            <div>
									<span class="aui-list-product-item-price">
										<em>¥</em>
										<% item.final_price %>
									</span>
                                {{--                                <span class="aui-list-product-item-del-price">--}}
                                {{--										¥495.65--}}
                                {{--									</span>--}}
                            </div>
                            <div class="aui-btn-purchase">
                                订单号：<% item.ordernum %>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="aui-list-title-btn">
                <span><% money(item.tbk_order_log) %></span>
{{--                <a href="{{url('user/orderDetail')}}?id=<% item.id %>" class="red-color">订单详情</a>--}}
                <a href="javaScript:;" class="red-color">订单详情</a>
            </div>
            <div class="aui-dri"></div>
        </li>
        <%#  }); %>
        <%#  if(d.length === 0){ %>
        <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>暂无该类型订单</div>
        <%#  } %>
    </script>
@endsection

