@extends('common.app')
@section('title', e($setting['app_name']))
@section('content')
<script src="__WEUI__/js/iscroll-lite.js"></script>
<link rel="stylesheet" href="__WEUI__/css/weui.css"/>
<link rel="stylesheet" href="__WEUI__/css/weuix.css"/>
<link rel="stylesheet" href="__LAY__/css/font.css">
<link rel="stylesheet" href="__LAY__/lib/layui/css/layui.css">
<meta name="referrer" content="no-referrer" />
<script src="__WEUI__/js/zepto.min.js"></script>
<script src="__WEUI__/js/zepto.weui.js"></script>
<script type="text/javascript" src="__STA__/ajaxweui.js"></script>
<script type="text/javascript" src="__LAY__/lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript">
    $.toast.prototype.defaults.duration=1000;
</script>
<div class="aui-content-box">
    <div class="aui-banner-content " data-aui-slider>
        <div class="aui-banner-wrapper">
            @foreach($banners as $item)
            <div class="aui-banner-wrapper-item">
                <a href="{{$item['url']}}">
                    <img src="{{ qnImg($item['img'])  }}">
                </a>
            </div>
            @endforeach
        </div>
        <div class="aui-banner-pagination"></div>
    </div>
    <section class="aui-grid-content">
        <div class="aui-grid-row aui-grid-row-clears"> <!-- aui-grid-row-clear 清除 a标签 上下的边距 -->
            @foreach($cates as $item)
            <a href="my-sign.html" class="aui-grid-row-item ">
                <i class="aui-icon-large" style="background-image:url({{qnImg($item['img'])}})"></i>
                <p class="aui-grid-row-label">{{$item['title']}}</p>
            </a>
            @endforeach
        </div>
    </section>
    <div id="tagnav" class="weui-navigator weui-navigator-wrapper">
        <ul class="weui-navigator-list">
            <li><a class="cateChange" data-id="0" href="javascript:;">全部</a></li>
            @foreach($cates as $item)
            <li><a class="cateChange" data-id="{$item.id}" href="javascript:;">{{$item['title']}}</a></li>
            @endforeach
        </ul>
    </div>
    <section class="aui-list-product" >
        <div class="aui-list-product-box" id="tagnav" >
            <a href="ui-product.html" class="aui-list-product-item">
                <div class="aui-list-product-item-img">
                    <img src="{{ URL::asset('themes/img/pd/sf-15.jpg')  }}" alt="">
                </div>
                <div class="aui-list-product-item-text">
                    <h3>KOBE LETTUCE 秋冬新款 女士日系甜美纯色半高领宽松套头毛衣针织衫</h3>
                    <div class="aui-list-product-mes-box">
                        <div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								399.99
							</span>
                            <span class="aui-list-product-item-del-price">
								¥495.65
							</span>
                        </div>
                        <div class="aui-comment">986评论</div>
                    </div>
                </div>
            </a>
            <a href="ui-product.html" class="aui-list-product-item">
                <div class="aui-list-product-item-img">
                    <img src="{{ URL::asset('themes/img/pd/sf-15.jpg')  }}" alt="">
                </div>
                <div class="aui-list-product-item-text">
                    <h3>KOBE LETTUCE 秋冬新款 女士日系甜美纯色半高领宽松套头毛衣针织衫</h3>
                    <div class="aui-list-product-mes-box">
                        <div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								399.99
							</span>
                            <span class="aui-list-product-item-del-price">
								¥495.65
							</span>
                        </div>
                        <div class="aui-comment">986评论</div>
                    </div>
                </div>
            </a>
            <a href="ui-product.html" class="aui-list-product-item">
                <div class="aui-list-product-item-img">
                    <img src="{{ URL::asset('themes/img/pd/sf-15.jpg')  }}" alt="">
                </div>
                <div class="aui-list-product-item-text">
                    <h3>KOBE LETTUCE 秋冬新款 女士日系甜美纯色半高领宽松套头毛衣针织衫</h3>
                    <div class="aui-list-product-mes-box">
                        <div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								399.99
							</span>
                            <span class="aui-list-product-item-del-price">
								¥495.65
							</span>
                        </div>
                        <div class="aui-comment">986评论</div>
                    </div>
                </div>
            </a>
            <a href="ui-product.html" class="aui-list-product-item">
                <div class="aui-list-product-item-img">
                    <img src="{{ URL::asset('themes/img/pd/sf-15.jpg')  }}" alt="">
                </div>
                <div class="aui-list-product-item-text">
                    <h3>KOBE LETTUCE 秋冬新款 女士日系甜美纯色半高领宽松套头毛衣针织衫</h3>
                    <div class="aui-list-product-mes-box">
                        <div>
							<span class="aui-list-product-item-price">
								<em>¥</em>
								399.99
							</span>
                            <span class="aui-list-product-item-del-price">
								¥495.65
							</span>
                        </div>
                        <div class="aui-comment">986评论</div>
                    </div>
                </div>
            </a>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(function () {
        //绑定滚动条事件
        //绑定滚动条事件
        $(window).bind("scroll", function () {
            var sTop = $(window).scrollTop();
            var sTop = parseInt(sTop);
            if (sTop >= 40) {
                if (!$("#scrollBg").is(":visible")) {
                    try {
                        $("#scrollBg").slideDown();
                    } catch (e) {
                        $("#scrollBg").show();
                    }
                }
            }
            else {
                if ($("#scrollBg").is(":visible")) {
                    try {
                        $("#scrollBg").slideUp();
                    } catch (e) {
                        $("#scrollBg").hide();
                    }
                }
            }
        })
        $("#search").bind('click',function () {
            window.location.href="{{url('home/search')}}?keywords="+$("#input").val();
        })
    })
</script>
<script src="{{URL::asset('themes/js/aui-pull-refresh.js')}}"></script>
<script type="text/html" id="goodList">
    <ul>
        <% # layui.each(d, function(index, item){ %>
        <li>
            <a href="{:url('goodList/detail')}?id=<% item.id %>" class="imgs weui-media-box_appmsg">
                <img class="weui-media-box__thumb" src="<% item.img %>">
            </a>
        </li>
        <% # }) %>
    </ul>
</script>
<script>
    TagNav('#tagnav', {
        type: 'scrollToNext',
        curClassName: 'weui-state-active',
        index: 0
    });
    laytpl.config({
        open: '<%',
        close: '%>'
    });
    var loading;
    var page = 1;
    var pageSize = 10;
    var cate = 0;
    getList(page, pageSize, cate);
    $(document).on('click', '.cateChange', function () {
        cate = $(this).data("id");
        getList(page, pageSize, cate);
    })

    $(document.body).infinite().on("infinite", function () {
        if (loading == true) return;
        loading = true;
        page = page + 1;
        getList(page, pageSize, cate);
        loading = false;
    });

    function getList(page, pageSize, cate) {
        ajaxYhc('POST', '{:url("index")}', {page: page, pageSize: pageSize, cate: cate}, function (result) {
            if (result.code == 0) {
                var count = result.data.length;
                if (count == 0) {
                    $.toast('没有更多了', 'text');
                    if (page == 1) {
                        var laytpl = layui.laytpl;
                        var getTpl = goodList.innerHTML
                            , view = document.getElementById('list');
                        laytpl(getTpl).render(result.data, function (html) {
                            view.innerHTML = html;
                        });
                    }
                    return false;
                }
                layui.use('laytpl', function () {
                    var laytpl = layui.laytpl;
                    var getTpl = goodList.innerHTML
                        , view = document.getElementById('list');
                    if (page == 1) {
                        laytpl(getTpl).render(result.data, function (html) {
                            view.innerHTML = html;
                        });
                    } else {
                        laytpl(getTpl).render(result.data, function (html) {
                            view.innerHTML = view.innerHTML + html;
                        });
                    }

                });
            }
        });
    }
</script>
@endsection
