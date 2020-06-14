@extends('common.app')
@section('title', e($setting['app_name']))
@section('content')
    <style>
        .m-button {
            padding: 0 0.24rem;
        }

        .btn-block {
            text-align: center;
            position: relative;
            border: none;
            pointer-events: auto;
            width: 100%;
            display: block;
            font-size: 1rem;
            height: 2.5rem;
            line-height: 2.5rem;
            margin-top: 0.5rem;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #04BE02;
            color: #FFF;
        }

        .btn-warning {
            background-color: #FFB400;
            color: #FFF;
        }
        .mask-black {
            background-color: rgba(0, 0, 0, 0.6);
            position: fixed;
            bottom: 0;
            right: 0;
            left: 0;
            top: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            z-index:999;
        }

        .m-actionsheet {
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: #fff;
            -webkit-transform: translate(0, 100%);
            transform: translate(0, 100%);
            -webkit-transition: -webkit-transform .3s;
            transition: -webkit-transform .3s;
            transition: transform .3s;
            transition: transform .3s, -webkit-transform .3s;
        }
        .actionsheet-toggle {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        .actionsheet-item {
            display: block;
            position: relative;
            font-size: 0.8rem;
            color: #555;
            height: 2rem;
            line-height: 2rem;
            background-color: #FFF;
        }
        .actionsheet-item:after {
            content: '';
            position: absolute;
            z-index: 2;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            border-bottom: 1px solid #D9D9D9;
            -webkit-transform: scaleY(0.5);
            transform: scaleY(0.5);
            -webkit-transform-origin: 0 100%;
            transform-origin: 0 100%;
        }
        .actionsheet-action {
            display: block;
            margin-top: .15rem;
            font-size: 0.8rem;
            color: #555;
            width:25px;
            height:25px;
            background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAOHUlEQVR4Xu2daZBcVRWAz3nTM5OEJTOASBEWo4gsAiIRBIqlCGBBoUEgCIWSIMoymel7XyYkIIgNipCY0Pd0kwgBQ0ALgSAgiiKyGEA2RUFBZFFASDCyzAzRbDP9jnXC667Xj9fd73W/XkLNrZofqb733HO/Pn2Xc889QRgtDSGADelltBMYBd0gIxgFPQq6QQQa1E1LW7RS6qMA8DEA+AgAdHn+1gPAoPxZljXAzCsGBwdfWbp06boGcYvcTcuA7uvr2yGRSBzrOM6RALCnAEbEcVFGxMz/BoCXEfFhRHwgnU7fF6V9Pes2FXQymdzPsqyTmXkKIn6qHgNl5t8w8y1jx469fe7cuUP16COMzIaD1lrLFNDHzNMQ8RNhlIyxzs8dx7k6k8ncE6PMUKIaBrqvr29Ly7KSiDgbALYIpd37lV4EgH8BwLvM/C4ivgMAYwFgK2beChG3ZuZdEVHm8bBlOTNfRESPhG1Qa72GgNZazwCASwVOGYVXM/OTiPgoADyRy+X+ns1m/xF2gD09PZu3t7fvblnWvsx8AAAcCAC7l2vPzL9CxBnGmFfD9lNtvbqCtm17L2ZeCgCfLaHgCADczcxLVq5cefeyZcty1Q4kqJ1t2xOYeToAfB0APh5Uh5llp3JZd3f3vFQqtSHO/r2y6gZaaz0XAGSa+EBh5vcQkZh5IRGtqtfgvHKVUl9AxAsA4LASOr0AACcT0V/qoU/soGfOnLljLpe7FRE/H6DwIDPP7ezsXDhv3rzV9RhQJZla64MB4HsAcHhQXcdxzs1kMldXkhP181hB27Z9tOM4yxBxywBFlgwPD89euHChLGZNL1rrk5g5jYg7+JWR7SARnRKnkrGBtm17mjsf+/V7MZfLTctms4/HqXgcsqZPnz6mq6vruwAwKwD2I2PGjDkurr13LKCVUhchoihcVJj5+qGhoZ5WPhqLwlprmUaWAcA23gEws8zbh8WxjtQMWmv9HQBI+SE7jnNaJpO5KQ7La4QM169yOyIe5IMtW8yDa4VdE2il1NmI6F84VudyuaNbcaqo9IWlUqmOwcHBOwHgGB/sZ4eHhw9ctGjRfyvJKPV51aC11qcCQJHFMvMqZj4yk8k8W61CrdBOKXUdIp7pg/0oEcmOpapSFeje3t7d2trankbETk+vg47j7J/JZF6qSpMWa6SUki3qVB/sRUQkp9zIJTLoWbNmbTYyMvI0AOyS701OV5ZlHZJOp/8YWYMWbTB16tS2CRMm3AsAR/hgTyGiu6KqHRm01voWOUH5OjrRGHN71M5bvb5rVH8CgF09uspBa++o/pFIoG3bnsLMslgUCjNfRUR9rQ6tWv36+vr2sCzrKUQc4/kF309EckERuoQGLZv78ePHv+Q7ST3T1dU1KZVKiXPoQ1uSyeQ5lmX90Gdg4heRvXeoEhq0UupyRDzf862Kp21PIpJN/Ye+KKWWI+KhnoG+KRcX6XR6bZjBhwLd09OzXUdHx2sA0OERmjXGJMN08mGoo7XenZn/iohtHmO7kIi+H2Z8oUBrrRcAwEyPwLc3bNgwsZYNfBjlWq2OUooQsWBczPzW0NDQTmFcDBVBz5kzZ/z69evfdK+PNo6dmRURZVoNRL31ERbr1q17AxE391h1HxFdVanviqC11t92r6Hyst40xmxfSXClz11HjjjhlxtjflepfrWfy2UwIk5zDeQGY4zEg1Rd/GsVALxmjJHYk7IlDGhxqhSugeKwZhfygx7NzjDGyJVXrMW9cZd+PuMKftoYs28tncyYMWPr9vb2172/cEQ8PJ1OLy8ntyxopdQBiFjwI8sJ0HGcrmw2K5FCVRettXj7xOvnLbHCDoC8sS9jTEXjqjQwrfW1APANT73FxpizawHtn/xvJKKNP8NaitZaLOzPATJigV0KsjtNBV5hRRmPbduHMXNhumPmge7u7m1SqZRTSk4li16BiN75eLIx5oEoSpWqq7WW2+nr44ZdBvIzck9Y6xyd11cp9Roi7pT/NyIeVS4ErSRo2TcCwN/ygpj5HSIquoGoFXjcsBsFWcatlLoSEW0PnyuISG7ZA0s50OK/KGzhmPkOIjqhVrj+9nHBbiRkGYPf78PMfyCi/asBLc6jKZ5vrG5751phNxqyC1pC0rw3+k4ikdhy/vz5/wuCXdKilVJF8zMz71Ov4BJRrFrYzYDsmaefQcS98/92HOeITCbj3bYWmAeCPuuss8aNGzeu8M0wc667u7uj3Koax5QSFXYzIbvG8RMAOM3zq59BRItCW3QymTzIsqzfewS8QES7xQGzkoywsJsN2V0QL0bESzycSvrmAy06mUyeYVnWEg+UO40xX64EKa7PK8FuBcjuPC1B9HLjtLEw82+J6OjQFq21Fk+deOzyAjJEpOICGUZOKdjMPAMRv+k5VufFxbpPDqOjbduTZLfh4fQsEe0VGrRS6nxEvNzT4EpjTH+YzuOsU8ay/d00HLIo0NvbOzGRSPzTA3oVEW0XBbR/7vkBEQWG4MYJNkhWCNhNgSy6yiuGtra2wrsYZmYiskKD1lpLdL64R/NTR9lTT71hK6V6EHGhvx9mfl22V3Edq6sZh9aave06Ozu7ggIjAxdDrfWFbgxxXkbTrq3KLHx53WJxRFUDWdr4QedyufHZbPY9v7xA0EopedRDHou+nojkeUJDSwjITYUt72Y6OjqKAupLuWHDbu9uM8YUhUfVm3gpyO50sWNA/w237N7e3u0TicQKjy6rjTFBQfjB2Q2UUici4m0ei36QiIpCo+oJutI+GQCOr4eLNeqYlFJ7I6Isxvm17A0iCjKCYNAB+8OVRDQhqiLV1K8EOb/wVTrUVNN31Da2bfsPLI8Q0SFBcgKnjtmzZ2+xYcOGogm9q6urs57Pw9yFRV7Veu/48joHbuGaDVsp5d8G/4iIvFdcBeblvHcSiVPYfDuOMymTyTwV9VsPWz+sJfvlNRO21lriwyVOPF/OM8bMD23RUjEgBKrXGPOBvWxYkOXqVQs5L7NZsLXW8nS6MCcj4pfS6fQvooL2x9otIyJ/uG7NnGuF3CzYWmuJ5XjFC6DUYUXqlJs6jkJECcTOr6j1uDOMNCdX+lYbadkBfZWNGSkJ2n2D54+U3NcYI9H+NZe4LLlZc7ZS6mZE/Iqn//nGmPNKgakUbnAfIk4OKywKfa21fGH7+NrE4iCqt2X7nUkbp4Zqww2kccAFwH+MMZLnqKaitdYAkK4H5Apz9qAxprsm5d/fKJyJiNd55Eg8opwzihxM3n7KWnTQWd5xnGNqzeASADoWSw4xjQwZY2RdqKkopR5HRMkJki+XG2O+VU5oxTg0pdQNiHh6Xggz1/TezmNx+XAGCQ48vl6uTq21HNfzAZS61mDKgABNucLamYhkq1eyVATtJpjyP2uLLTSsJtNqQmOl1GPeFBnMfA8RFb20DVKrImhppJS6VyZ7j4DHjDFFb6abMOaGd5lMJidbllWU4k3etaTT6YcrKRMKtNZaPHf3e4Ux8ylEVLgBrtTRpv55KpWyBgYGnkPEQthFlGk0FGjXqv0LwIo1a9bsunjx4jWbOsQw+gftlCQZYiaTKTLAUrJCg545c+Y+juP4DyvzjDFzwii6KdeRLJOWZT3vfbsCAJEuQ0KDFlBaa4kuLbySlVtfRDwyrpjpFv0yUCn1BCJ+zqPfWmaeGCWHRyTQrp/6ZQDY1rPdW+U4zl7ZbPatFgVVk1pKqcsQ0b9H7jfGXBlFcCTQrlUHLYwPEVFgmrMoyrRaXXcPfodvE1Ay7KumfXRQY6XUJYh4sU+Bu4hIDgclj6GtBrKcPlpryQQp71QKr4Ul8YtlWXuk0+l3o44lskXnO1BK+R1OckK6hojOiapEq9V3HzM95M+hysyHVJvPtGrQbi5QOSV92mfZy7q7u0+pdyx1vb4cpdShiPhLL2R30T+plpwkVYOWgc6aNWvb4eHhRwPSE4u1y7VOqJf/9YIWVa6bdPAmRGz3Gc85RHRNVHne+jWBFkFuRKUcQYvCEZhZElidtKmkmVBKXYGIQWeCkheuUcDXDFo6k5xxiCgnJEkZXyjMvIaZezOZTNB7wih61q1uf3//ziMjIz9DxP18uueY+fS4cvfFAloUdH3Xcscoq3VRkfTviUTi7AULFkjOj5YoqVQqMTAwIO8EJTajkK1AlJOn2Mx8XNjjdZgBxQbasxspeujos5JL29vb55V6IhZG4TjquMlq5fn1B97lSJpMy7JOTKfTz8XRV15G7KBFsG3bX2TmHwPA+ADrfgcR0x0dHZlGpzZOJpPHWpZ1UdCvzrXkG9euXXtuPRxldQEtSosjpq2tbbE//WQevJuse0kul7s2m80WnkLHaUUiy03s8lUAkHcv/svgfHdvSwr6dDp9a9z919Wivcq6W6arELHcpe6TACC+bblQeKzWwdq2vQszy1ohlxVfKyePmRc5jnNBUPB4rXp429fNor2duM4o2TrJ7fdmlQbAzOL7luxjkv7tJYmJHhkZGWhraxsQj5l73b+V4zhbW5a1LTN/EgDkbxdEnORPT1yiv1/ncrkLs9lsUDqLSipG/rwhoPNa2bYtcM5DRHG1VgQeeTThGshh6oJGp/dsKOg8B7Hw4eHhExzHOdUN0EmEY1RdLWaWX8bNAPBTY8zz1UmprVVTQHtV7u/v3yaXyx3HzDKfTq4wl4ceLTNLnLVY7z3GGMkv2tTSdND+0ctzBWaWfKAT5RYDEXd259z8//4m6RvWIOKA+z/Ayf84JMmkXkVEie58eXBw8PEwuegaSb7lQDdy8I3saxR0g2iPgh4F3SACDepm1KJHQTeIQIO6+T+w45K1LrcMugAAAABJRU5ErkJggg==');
            background-repeat:no-repeat;
            background-size:25px;
            position:absolute;
            top:10px;
            right:10px;
        }
    </style>
    <header class="aui-header-default aui-header-fixed ">
        <a href="javascript:history.back(-1)" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div id="scrollSearchPro">
                    <span class="current">商品</span>
                    <span>评价</span>
                    <span>详情</span>
                </div>
            </div>
        </div>
        <a href="javascript:;" class="aui-header-item-icon select"    style="min-width:0;">
            <i class="aui-icon aui-icon-share-pd selectVal" onselectstart="return false"></i>
            <div class="aui-header-drop-down selectList">
                <div class="aui-header-drop-down-san"></div>
                <div class="">
                    <p class="" onclick="location='http://www.a-ui.cn/'" >消息</p>
                    <p class="" onclick="location='index.html'">首页</p>
                    <p class="" onclick="location='index.html'">帮助</p>
                    <p class="" onclick="location='index.html'">分享</p>
                </div>
            </div>
        </a>
    </header>
    <div class="aui-banner-content aui-fixed-top" data-aui-slider>
        <div class="aui-banner-wrapper">
            @foreach($goods['images'] as $item)
                @if(!empty($item))
                <div class="aui-banner-wrapper-item">
                    <a href="javascript:;" >
                     <img src="{{$item}}">
                    </a>
                </div>
                @endif
            @endforeach
        </div>
        <div class="aui-banner-pagination"></div>
    </div>
    <div class="aui-product-content">
        <div class="aui-real-price clearfix">
			<span>
				<i>￥</i>{{$goods['quanhou_jiage']}}
			</span>
            <del><span class="aui-font-num">￥{{$goods['size']}}</span></del>
            <div class="aui-settle-choice">
                <span>折后价</span>
            </div>
        </div>
        <div class="aui-product-title">
            <h2>
                {{$goods['title']}}
            </h2>
            <p>
                {{$goods['tao_title']}}
            </p>
        </div>
        <div class="aui-product-boutique clearfix">
            <span class="aui-product-tag-text">月销量:{{$goods['volume']}}</span>
            <span class="aui-product-tag-text">总销量:{{$goods['sellCount']}}</span>
            <span class="aui-product-tag-text">商品描述分:{{$goods['shop_dsr']}}</span>
        </div>

        <div class="aui-product-coupon">
            <!-- 弹窗A end-->
            <a href="javascript:;" class="aui-address-cell  aui-fl-arrow-clear" >
                <div class="aui-address-cell-ft">
                    <span>{{$goods['coupon_info']}} ({{$goods['coupon_end_time']}}截至)</span>
                    <span>自购返:{{$goods['commission']}}</span>
                </div>
            </a>
        </div>
        <div class="aui-product-coupon">
            <!-- 弹窗A end-->
            <a href="javascript:;" class="aui-address-cell copy" data-msg="{{$goods['tkl']}}" >
                <div class="aui-address-cell-ft">
                    <span>点击复制淘口令({{$goods['tkl']}})</span>
                </div>
            </a>
        </div>
        <div class="aui-dri"></div>
{{--        <div class="aui-product-evaluate">--}}
{{--            <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">--}}
{{--                <div class="aui-address-cell-bd">商品评价   <em>(3290)</em></div>--}}
{{--                <div class="aui-address-cell-ft">--}}
{{--                    <span>好评 100%</span>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="aui-dri"></div>
        <div class="aui-product-evaluate">
            <a href="#" class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-bd">
                    <div class="clearfix">
                        <div class="aui-product-shop-img">
                            <img src="@if(empty($goods['shopIcon']))@if($goods['user_type']==0)data:image/webp;base64,UklGRtIFAABXRUJQVlA4WAoAAAAQAAAAOwAAOwAAQUxQSC0BAAANT8OwbdtIJ7nt/fuvm3SKiMiDLS0tfSHhpOWhRpaxMpexJsFFhZbtNYopea2fCotyUgtx0JEYNqDbtq0s2XR3d2MrYYvYdHd3vv8LNOh3fjtGRP8Tu2yjx2FWcfD3WauUSVaXOMRy3inAEFdtcbhb9znsCyMGMMpxhdMPU+yI42CcFzKfTbARxEHh953PsGK9gOZEF8XKbgVROFFm34JKGHjWa0HmzXtAJ7TbQGg3gdCsAaFaBEI5KKWgZOG/4AyUo4EMdP2GFnT1ohV0pYwDdOmUiw+qQaGd84MqhtVjQAya3hdWldgTCxSLIDbvvEtQRFnYLK4NVywwvYiMsTO/mb3KwGwnwMLe8vPj4lQG5ro/3zhYf0uaHWa1UoIVT4jfjqdYDfvNYraGPQAAAFZQOCB+BAAA0BYAnQEqPAA8AD6JOJdHpSOiISwYDzCgEQlsAMa1QVheDH3H8XPw5+Turf2PgFjqelPwPOV8wD9H/Mz/WD3AeYD9o/Vy/wH6ze4D9bPYA/aPrAPQA/Yj0zP2V+C/9zP3O9ph5Lo122ryda/Zofj9+p+mZ9hnogfsAj1tQXuVcitM5RQRoK4Bz6pXzH/zUc4VrcbDF0986A/R1QF3urllnqUU+UC1cMLEKOGPIeGWdCiBjsLBn+EB+lsEDEnn8ywA/v6/y7bkzLN/krBc33mDwaOzw6inxwQ2JrG4taZSSft5W/k4oFIMRWk8D/5VwIcOGueTfZ5aV1IZ/+lhUKfQfiUFyLveN4O7U1vHXMWO7V/ix06/O3zrhj/iJrPqF4FfjYv7JqXCypcE3zIXAwn+4/PMKZ51mYYKwdGEFC/YCq2e7k1K3zvTDfyJEM8j06UYQ6cbx+lSyZaGjVyZmrTOPN97ke5p+EMbmN9cJjoqWYNZ0Nruzijk4rtTJC35Y2/sBePYdqbm8jop8aLGu/LhKmU6cSjBdCjkejimS8K/q9zeptKioHz2CzkDfEeNAZNa7OMjN5jZ6fahqMTSsfF8/kZZHAhc0BKFqIPSee+POyPv3npNB6KL9RQw9QMupGBIPjM1O7VPSe5m/fvQGcj5ODMyyVuStIB8C3E7/w3dnFzUwtW/Tjxts3VtLSeWLiYHtIT6ipw5fb048qoC9FcQJap5gNhOt4/J9tkyB35CkEx7labVClYVDF4VbrxKotehrZu0CB8viRnZxoqwS6jyyvSAGb8E8F/ktk3u36OzTffqJ08g/b/6f4mWMfMfBIiVQhf4LrmCyqgUPdqxqagfg9deMHTJTZwO+snYPBQO4sQNej3UFoBH97UkJ77xXA5rDYmqUhEWN/2pikatYMXnl8gT/il8nUZ30udx/Ly/qICtacT6ITXlf4wN9BlwXJEjDd+yUzpgqAQyfeHHLRylz7SCOHBP3k2sxy0Zw1ihuNYsizlkGRwOG8dx6FtOUBQU2acvdvE9EjqIOrvzt0/oshM2wKxAiX6d2Kue6Bb02Rbe1gPoLFrMNRrAh+K0qtI/s5S4vApopBWWYzUryIawg/qyHLsAG3zfJd+7yndRi8SFc8U0kWXVaNWozdZESUbeDycER437GxzDLSFIJv+wGr9Hx9dCB9mT8xoSzovU0BlCd9CJB45NfEBuCuQ+OSKK3SPQdVWIfzzsvOzpi0yTcJ8aq9K8shP0R6SbBYLN7aBqORmktnHAx8oAer9vgel9MUebUSlFaOqRGdncFe836BHHlpop6wF7MHw7QFjCRUey6N2Xp8BDA6nMx7+/juDC7/a0gyzu59G+tFuQ9euKcxIRJ3My/tzx2PyBBma8rUDafyKangqwmHLiYwpD6/7z117KfgarAvvMpkSbNpa0qFD8pwhGzg97GDHm5AAAAFQjxvzt5qLwyHPdV9VgM+epHXH2V9GytP10q238TxwtvKy75X8zR74vXM7fZbJ/zrn2V1+/+MgADOZX4jAAAA==
@else
data:image/webp;base64,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
@endif
 @endif
{{$goods['shopIcon']}}" alt="">
                        </div>
                        <div class="aui-product-shop-text">
                            <h3>{{$goods['shop_title']}}</h3>
                            <p>{{$goods['provcity']}}</p>
{{--                            <p>店铺等级:{{$goods['creditLevel']}}</p>--}}
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="aui-product-boutique clearfix">
            <span class="aui-product-tag-text">宝贝描述分:{{$goods['score1']}}</span>
            <span class="aui-product-tag-text">卖家服务分:{{$goods['score2']}}</span>
            <span class="aui-product-tag-text">物流服务分:{{$goods['score3']}}</span>
        </div>
        <div class="aui-dri"></div>
{{--        <div class="aui-slide-box">--}}
{{--            <div class="aui-slide-list">--}}
{{--                <ul class="aui-slide-item-list">--}}
{{--                    <li class="aui-slide-item-item">--}}
{{--                        <a href="#" class="v-link">--}}
{{--                            <img class="v-img" src="themes/img/pd/sf-1.jpg">--}}
{{--                            <p class="aui-slide-item-title aui-slide-item-f-els">NIKE耐克男女鞋 ROSHE ONE 男女情侣小黑鞋奥利奥轻便休闲鞋</p>--}}
{{--                            <p class="aui-slide-item-info">--}}
{{--                                <span class="aui-slide-item-price">¥349</span>&nbsp;&nbsp;<span class="aui-slide-item-mrk">¥499</span>--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--           --}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="aui-dri"></div>
        <div class="aui-product-pages">
            <div class="aui-product-pages-title">
                <h2>图文详情</h2>
            </div>
            <div class="aui-product-pages-img">
                @foreach($goods['imgDetail'] as $item)
                    @if(!empty($item))
                        <img src="{{$item}}">
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
