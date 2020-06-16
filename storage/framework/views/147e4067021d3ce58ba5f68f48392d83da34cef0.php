





<html>
    <head>
        <title><?php echo $__env->yieldContent('title','萤火淘客'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
        <meta name="format-detection" content="telephone=no, email=no"/>
        <meta charset="UTF-8">
        <title><?php echo $__env->yieldContent('title','萤火淘客'); ?></title>
        <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/core.css'), false); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/icon.css'), false); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('themes/css/home.css'), false); ?>?version=1.0">
        <link rel="stylesheet" href="<?php echo e(URL::asset('/layui/css/layui.css'), false); ?>">
        <link rel="icon" type="image/x-icon" href="<?php echo e(URL::asset('favicon.ico'), false); ?>">
        <link href="<?php echo e(URL::asset('iTunesArtwork@2x.png'), false); ?>" sizes="114x114" rel="apple-touch-icon-precomposed">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('themes/weui/css/weui.css'), false); ?>">
        <link rel="stylesheet" href="<?php echo e(URL::asset('themes/weui/css/weuix.css'), false); ?>">
        <script src="<?php echo e(URL::asset('themes/weui/js/zepto.min.js'), false); ?>"></script>
        <script src="<?php echo e(URL::asset('themes/weui/js/zepto.weui.js'), false); ?>"></script>
        <script src="<?php echo e(URL::asset('themes/weui/js/iscroll-lite.js'), false); ?>"></script>
        <script src="https://cdn.bootcss.com/jquery/3.5.0/jquery.min.js"></script>
        <script src="<?php echo e(URL::asset('/layui/layui.js'), false); ?>"></script>
        <script src="<?php echo e(URL::asset('/layui/ajaxYhc.js'), false); ?>?time=22"></script>
    </head>
    <body style="background:#eee">
        <?php echo $__env->yieldContent('content'); ?>
    </body>
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
        <a href="Javascript:;" class="aui-footer-item <?php if($footStatus==3): ?>  aui-footer-active <?php endif; ?>">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-car"></span>
            <span class="aui-footer-item-text">待开发</span>
        </a>
        <a href="<?php echo e(url('user/index'), false); ?>" class="aui-footer-item <?php if($footStatus==4): ?>  aui-footer-active <?php endif; ?>">
            <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
            <span class="aui-footer-item-text">我的</span>
        </a>
    </footer>
</html>
<?php /**PATH D:\wwwroot\log.mn\resources\views\v1\h5/layouts/app.blade.php ENDPATH**/ ?>