@extends('layouts.app')
@section('title', e($setting['app_name']))

@section('content')
    <style>
        .aui-list-product-item-img img{
         height: auto;
        }
        .collapse li{
            background-color: #eee;
        }
        .collapse li.js-show .weui-flex {
            opacity: 0.8;
        }
        .collapse .weui-flex{
            margin: 0;
            padding: 0;
            text-align: center;
            line-height: 45px;
        }
        .weui-cell {
            padding: 7px 10px;
        }
    </style>
    <header class="aui-header-default aui-header-fixed aui-header-clear-bg"> <!-- aui-header-clear-bg 清除背景色 -->
        <ul class="collapse" style="width: 150px;">
            <li >
                <div class="weui-flex js-category">
                    <div class="weui-flex__item">商品类型</div>
                    <i class="icon icon-74"></i>
                </div>
                <div class="page-category js-categoryInner">
                    <div class="weui-cells page-category-content">
                        <a class="weui-cell weui-cell_access" data-type="0" href="JavaScript:;">
                            <div class="weui-cell__bd">
                                <p>淘宝</p>
                            </div>
                        </a>
                        <a class="weui-cell weui-cell_access" data-type="1"  href="JavaScript:;">
                            <div class="weui-cell__bd">
                                <p>天猫</p>
                            </div>

                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="aui-header-center aui-header-center-clear"  style="margin-right:50px;margin-left: 0px;">
            <div class="aui-header-search-box" style="background-color:#fff">
                <input type="text" id="keywords"  placeholder="输入关键字搜索" class="aui-header-search">
            </div>
        </div>
        <a href="Javascript:;" id="search" class="aui-header-item-icon" style="position:absolute; right:-35px; top:0;">
            <i class="aui-icon aui-icon-search"></i>
        </a>
        <div id="scrollBg"></div>
    </header>


    <div id="tagnav" class="weui-navigator weui-navigator-wrapper" style="margin-top: 2.8rem;position: fixed;">
        <ul class="weui-navigator-list">
            @foreach($cates as $k=> $item)
                <li  ><a class="cateClass"  data-id="{{$k}}"  href="javascript:;">{{$item}}</a></li>
            @endforeach
        </ul>
    </div>

    <div class="aui-content-box" style=" padding-top: 85px;">
        <section class="aui-list-product">
            <div class="aui-list-product-box" id="scroll">

            </div>
        </section>
    </div>
    <script src="{{URL::asset('themes/js/template-web.js')}}"></script>
    <script type="text/javascript">


        TagNav('#tagnav', {
            type: 'scrollToNext',
            curClassName: 'weui-state-active',
            index: 0,
        });
        var page = 1;
        var cate=0;
        var goodsType=0;
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

                $(".cateClass").on('click',function () {
                    cate= $(this).data("id");
                    getList(1);
                })

                $('.collapse .js-category').click(function(){
                    $parent = $(this).parent('li');
                    if($parent.hasClass('js-show')){
                        $parent.removeClass('js-show');
                        $(this).children('i').removeClass('icon-35').addClass('icon-74');
                    }else{
                        $parent.siblings().removeClass('js-show');
                        $parent.addClass('js-show');
                        $(this).children('i').removeClass('icon-74').addClass('icon-35');
                        $parent.siblings().find('i').removeClass('icon-35').addClass('icon-74');
                    }
                });
                $('.weui-cell_access').click(function () {
                    goodsType=$(this).data('type');
                    $parent = $(this).parent().parent().parent('li');
                    $parent.removeClass('js-show');
                    getList(1);
                })

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
                    getList(1);
                })
                function getList(page, sort='') {
                    is_load=true;
                    keywords=$("#keywords").val();
                    var postData = {page: page, keywords: keywords, cate: cate,sort:sort, tmall: goodsType};
                    ajaxYhc('post', "{{url('home/goods')}}", postData, function (res) {
                        is_load=false;
                        var getTpl = goods.innerHTML
                            , view = document.getElementById('scroll');
                        if(page==1){
                            view.innerHTML ='';
                            console.log('start')
                        }
                        laytpl(getTpl).render(res.data, function (html) {
                            view.innerHTML = view.innerHTML+ html;
                        });
                    }, function (res) {
                    });
                }

            })
        })
    </script>
    <script id="goods" type="text/html">
        <%#  layui.each(d, function(index, item){ %>
        <a href="{{url('home/goodsDetail')}}?itemId=<% item.tao_id %>" class="aui-list-product-item">
            <div class="aui-list-product-item-img">
                <img src="<% item.pict_url  %>" alt="">
            </div>
            <div class="aui-list-product-item-text">
                <h3 class="over-hidden"><% item.title %></h3>
                <div class="aui-list-product-mes-box">
                    <div>
						<span class="aui-list-product-item-del-price">
                            原价:<% item.size %>
						</span>
                        <br>
                        <span class="aui-list-product-item-price">
						券后价:<em>¥</em><% item.quanhou_jiage %>
						</span>
                    </div>
                    <div class="aui-comment">月销:<% item.volume %></div>
                </div>
            </div>
        </a>
        <%#  }); %>
        <%#  if(d.length === 0){ %>
        无数据
        <%#  } %>
    </script>
@endsection
