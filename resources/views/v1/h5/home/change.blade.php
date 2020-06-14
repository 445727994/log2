@extends('common.app')
@section('title', e($setting['app_name']))
@section('content')
<style>
        .m-cell {
            background-color: #FFF;
            position: relative;
            z-index: 1;
            margin-bottom: .35rem;
            height: 3rem;
            line-height: 3rem;
        }
        /* 有些资料显示需要写，有些显示不需要，但是在编辑器webstorm中该属性不被识别 */
        ::-webkit-input-placeholder {
            /* WebKit browsers */
            color: #888;
        }

        :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: #888;
        }

        ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: #888;
        }

        :-ms-input-placeholder {
            /* Internet Explorer 10+ */
            color: #888;
        }
    </style>
<header class="aui-header-default aui-header-fixed ">
    <a href="javascript:history.back(-1)" class="aui-header-item">
        <i class="aui-icon aui-icon-back"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <div class="aui-header-center-logo">
            <div class="">新建地址</div>
        </div>
    </div>
    <a href="#" class="aui-header-item-icon"   style="min-width:0">
        <!--<i class="aui-icon aui-icon-search"></i>-->
    </a>
</header>
<section class="aui-myOrder-content">
    <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>待转换的链接</div>
    <div class="aui-Address-box">
        <p>
            <textarea class="aui-Address-box-text" id="text" placeholder="请将您要推广的原始链接（口令/链接）粘贴刀片这里并确定链接的完整性" rows="5"></textarea>
        </p>
    </div>
    <div class="aui-out">
        <a href="javascript:;" id="change" class="red-color" style="color:#fff">转换为我的链接</a>
    </div>
</section>
<script type="text/javascript" >
$('#change').bind('click',function () {
    var text=$("#text").val();
    if(text==""||text==undefined){
        layui.use('layer',function () {
            layer.msg('原始链接/口令为空');
        });
        return false;
    }
    var postData={text:text};
    ajaxYhc('post', "{{url('home/change')}}", postData, function (res) {
        $('#text').val(res.data);
    }, function (res) {
    });
})
</script>
@endsection
