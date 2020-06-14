<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no, email=no"/>
    <meta charset="UTF-8">
    <title>萤火淘客</title>
    <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/core.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/icon.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/home.css'), false); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/layui/css/layui.css'), false); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(URL::asset('favicon.ico'), false); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <link href="<?php echo e(URL::asset('iTunesArtwork@2x.png'), false); ?>" sizes="114x114" rel="apple-touch-icon-precomposed">
    <style type="text/css">
        #scrollBg{ width: 100%; height: 45px; line-height: 45px;background: rgba(251,55,67,0.8); display: none; z-index:-1; position: fixed; left: 0; top:0; text-align: center; font-size: 20px; color: #fff; }
    </style>
    <script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.min.js"></script>
    <script src="<?php echo e(URL::asset('/layui/layui.js'), false); ?>"></script>
    <script src="<?php echo e(URL::asset('/layui/ajaxYhc.js'), false); ?>"></script>
    <style>
        .copy{
            -webkit-touch-callout: all;
            -webkit-user-select: all;
            -moz-user-select: all;
            -ms-user-select: all;
            user-select: all;
        }
    </style>
</head>
<body>
<header class="aui-header-default aui-header-fixed aui-header-clear-bg"> <!-- aui-header-clear-bg 清除背景色 -->
    <div class="aui-header-center aui-header-center-clear"  style="margin-right:50px;margin-left: 10px">
        <div class="aui-header-search-box" style="background-color:#fff">
            <i class="aui-icon aui-icon-small-search"></i>
            <input type="text" id="input"  placeholder="输入关键词搜索" class="aui-header-search">
        </div>
    </div>
    <a href="Javascript:;" id="search" class="aui-header-item-icon" style="position:absolute; right:-35px; top:0;">
        <i class="aui-icon aui-icon-search"></i>
    </a>
    <div id="scrollBg"></div>
</header>
<?php echo $__env->yieldContent('content'); ?>
<footer class="aui-footer-default aui-footer-fixed">
    <a href="<?php echo e(url("home/index"), false); ?>" class="aui-footer-item  <?php if($footStatus==0): ?>  aui-footer-active <?php endif; ?>">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-home"></span>
        <span class="aui-footer-item-text">首页</span>
    </a>
    <a href="<?php echo e(url("home/cate"), false); ?>" class="aui-footer-item <?php if($footStatus==1): ?>  aui-footer-active <?php endif; ?>">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-class"></span>
        <span class="aui-footer-item-text">分类</span>
    </a>
    <a href="<?php echo e(url('home/change'), false); ?>" class="aui-footer-item <?php if($footStatus==2): ?>  aui-footer-active <?php endif; ?>">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-find"></span>
        <span class="aui-footer-item-text">链接转换</span>
    </a>
    <a href="car.html" class="aui-footer-item <?php if($footStatus==3): ?>  aui-footer-active <?php endif; ?>">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
        <span class="aui-footer-item-text">待开发</span>
    </a>
    <a href="<?php echo e(url('user/index'), false); ?>" class="aui-footer-item <?php if($footStatus==4): ?>  aui-footer-active <?php endif; ?>">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
        <span class="aui-footer-item-text">我的</span>
    </a>
</footer>

<script type="text/javascript" src="<?php echo e(URL::asset('themes/js/aui.js'), false); ?>"></script>
<script>
    $(".copy").bind('click',function () {
        var msg=$(this).data("msg");
        copyText('萤火淘客淘口令：' + msg);
    })

    /**复制文本 */
    function copyText(node) {
        if (!node) {
            return;
        }
        var result;
        // 将复制内容添加到临时textarea元素中
        var tempTextarea = document.createElement('textarea');
        document.body.appendChild(tempTextarea);
        if (typeof(node) == 'object') {
            // 复制节点中内容
            // 是否表单
            if (node.value) {
                tempTextarea.value = node.value;
            } else {
                tempTextarea.value = node.innerHTML;
            }
        } else {
            // 直接复制文本
            tempTextarea.value = node;
        }
        // 判断设备
        var u = navigator.userAgent;
        if (u.match(/(iPhone|iPod|iPad);?/i)) {
            // iOS
            // 移除已选择的元素
            window.getSelection().removeAllRanges();
            // 创建一个Range对象
            var range = document.createRange();
            // 选中
            range.selectNode(tempTextarea);
            // 执行选中元素
            window.getSelection().addRange(range);
            // 复制
            result = document.execCommand('copy');
            // 移除选中元素
            window.getSelection().removeAllRanges();

        } else {
            // 选中
            tempTextarea.select();
            // 复制
            result = document.execCommand('Copy');
        }
        // 移除临时文本域
        document.body.removeChild(tempTextarea);
        if (result) {

            layui.use('layer',function () {
                layer.msg('复制成功')
            });
        } else {

            layui.use('layer',function () {
                layer.msg('复制失败，请长按手动复制')
            });
        }

        return result;
    }
</script>
</body>
</html>
<?php /**PATH D:\wwwroot\log.mn\resources\views\v1\h5/common/app.blade.php ENDPATH**/ ?>