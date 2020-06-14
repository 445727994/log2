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
        <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>认证授权链接(微信内无法打开淘宝链接)</div>
        <div class="aui-prompt"><i class="aui-icon aui-prompt-sm"></i>请复制后在淘宝搜索框或浏览器中打开认证</div>
        <div class="aui-Address-box">
            <p>
                <textarea class="aui-Address-box-text" id="text" placeholder="" rows="5">{{$oauth}}</textarea>
            </p>
        </div>
        <div class="aui-out">
            <a href="javascript:;" id="change" class="red-color" style="color:#fff">转换为我的链接</a>
        </div>
    </section>
@endsection
