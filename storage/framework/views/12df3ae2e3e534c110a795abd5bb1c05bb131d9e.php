<?php $__env->startSection('title', e($setting['app_name'])); ?>
<?php $__env->startSection('content'); ?>
    <div class="aui-content-box">
        <div class="aui-banner-content " data-aui-slider>
            <div class="aui-banner-wrapper">
                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="aui-banner-wrapper-item">
                        <a href="<?php echo e($item['url'], false); ?>">
                            <img src="<?php echo e(qnImg($item['img']), false); ?>">
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="aui-banner-pagination"></div>
        </div>
        <section class="aui-grid-content">
            <div class="aui-grid-row aui-grid-row-clears"> <!-- aui-grid-row-clear 清除 a标签 上下的边距 -->
                <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="my-sign.html" class="aui-grid-row-item ">
                        <i class="aui-icon-large" style="background-image:url(<?php echo e(qnImg($item['img']), false); ?>)"></i>
                        <p class="aui-grid-row-label"><?php echo e($item['title'], false); ?></p>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
        <section class="aui-list-product">
            <div class="aui-list-product-box" id="scroll">

            </div>
        </section>
    </div>
    <script src="<?php echo e(URL::asset('themes/js/template-web.js'), false); ?>"></script>
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
                    getList(1);
                })
                function getList(page, cate = "", sort = "", tmall = "") {
                    is_load=true;
                    keywords =$("#input").val()
                    var postData = {page: page, keywords: keywords, cate: cate, sort: sort, tmall: tmall};
                    ajaxYhc('post', "<?php echo e(url('home/goods'), false); ?>", postData, function (res) {
                        is_load=false;
                        var getTpl = goods.innerHTML
                            , view = document.getElementById('scroll');
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
        <a href="<?php echo e(url('home/goodsDetail'), false); ?>?itemId=<% item.tao_id %>" class="aui-list-product-item">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wwwroot\log.mn\resources\views\v1\h5/home/index.blade.php ENDPATH**/ ?>