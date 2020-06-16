<?php $__env->startSection('title', e($setting['app_name'])); ?>
<?php $__env->startSection('content'); ?>
    <div id="scrollBg"></div>
    <header class="aui-header-default aui-header-fixed aui-header-clear-bg " style="background:none; border-bottom:0">
        <a href="#" class="aui-header-item">
            <i class="aui-icon aui-icon-back-white" id="scrollSearchI" style="display:block"></i>
            <div id="scrollSearchDiv">
                <img src="<?php echo e(URL::asset('themes/img/user/head-2.jpg'), false); ?>" alt="">
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
                            <img src="<?php echo e($user['wx_head_img'], false); ?>" alt="">
                        </div>
                        <div class="aui-me-content-item-title" style="padding-left: 18px;"><?php echo e($user['wx_nickname'], false); ?></div>
                    </div>
                    <div class="aui-me-content-item-text">
                        <a href="">
                            <span class="f-red"><?php echo e($user['credit']??0.00, false); ?></span>
                            <span>佣金</span>
                        </a>
                        <a href="">
                            <span class="f-red" ><?php echo e($user['userPreCredit']??0.00, false); ?></span>
                            <span>待结算</span>
                        </a>
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
                
                
                
                
            </div>
        </div>
        <div class="aui-me-content-order">
            <a href="<?php echo e(url('user/order'), false); ?>" class="aui-well aui-fl-arrow">
                <div class="aui-well-bd">我的订单</div>
                <div class="aui-well-ft">查看全部</div>
            </a>
        </div>
        <section class="aui-grid-content">
            <div class="aui-grid-row">
                <a href="<?php echo e(url('user/order'), false); ?>?status=12" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-wallet"></i>
                    <p class="aui-grid-row-label">已付款</p>
                </a>
                <a href="<?php echo e(url('user/order'), false); ?>?status=14" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-goods"></i>
                    <p class="aui-grid-row-label">确认收货</p>
                </a>
                <a href="<?php echo e(url('user/order'), false); ?>?status=3" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-receipt"></i>
                    <p class="aui-grid-row-label">已结算</p>
                </a>
            </div>
            <div class="aui-dri"></div>
            <div class="aui-grid-row">
                <a href="<?php echo e(url("user/invitation"), false); ?>" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-invitation"></i>
                    <p class="aui-grid-row-label">邀请好友</p>
                </a>
                <a href="<?php echo e(url("user/help"), false); ?>" class="aui-grid-row-item">
                    <i class="aui-icon-large aui-icon-large-sm aui-icon-help"></i>
                    <p class="aui-grid-row-label">帮助中心</p>
                </a>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
                
                
                
                
                
                
                
                
                
                
            </div>

        </section>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wwwroot\log.mn\resources\views\v1\h5/user/index.blade.php ENDPATH**/ ?>