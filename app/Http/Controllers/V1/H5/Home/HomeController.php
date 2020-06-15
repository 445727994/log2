<?php

namespace App\Http\Controllers\V1\H5\Home;

use App\Models\Ads\Ads;
use App\Models\Taoke\UserOauth;
use App\Models\User\Level;
use App\Tools\Tbk\V1\Taobao;
use Illuminate\Http\Request;
use Yhcztk\Zhetaoke\Application;
use Yhcztk\Zhetaoke\Kernel\Exceptions\Exception;

class HomeController extends WechatController
{
    public function index()
    {
        return view('home.index', ['banners' => Ads::ads(1), 'cates' => Ads::ads(2),'footStatus'=>0]);
    }
    public  function  cate(){
        $cates=['全部','女装','母婴','美妆','居家日用','鞋品','美食','文娱车品','数码家电','男装','内衣','箱包','配饰','户外运动','家装家纺'];
        return view('home.cate',['cates'=>$cates,'footStatus'=>1]);
    }
    public function goods(Request $request)
    {
        $app = new Application(config('tbk.ztk'));
        $page = $request->get('page', 1);
        $pageSize = $request->get('pageSize', 10);
        $keywords = $request->get('keywords');
        $cate = $request->get('cate');
        $tmall = $request->get('tmall');
        $sort = $request->get('sale_num');
        $res = $app->good->pageSize($pageSize);
        if (!empty($tmall)) {
            $res = $res->tmall(true);
        }
        if (!empty($cate)) {
            $res = $res->category($cate);
        }
        if (!empty($keywords)) {
            $res = $res->keyword($keywords);
        }
        if (!empty($sort)) {
            $res = $res->keyword($sort);
        }
        return json(200, '商品信息返回', $res->list($page));
    }

    public function goodsDetail(Request $request)
    {
        $app = new Application(config('tbk.ztk'));
        $itemId = $request->get('itemId');
        $goods = $app->good->item($itemId);
        if ($goods[0]) {
            $goods = $goods[0];
        } else {
            return "";
        }
        $goods['images'] = array_merge([$goods['pict_url']], explode('|', $goods['small_images']));
        $goods['commission'] = Level::LevelCommission($goods['tkrate3'], $goods['quanhou_jiage']);
        $goods['imgDetail'] = explode('|', $goods['pcDescContent']);
        $coupon = $app->tool->smartConvert($goods['tao_id'], config('tbk.pid'));
        if ($coupon && isset($coupon['tpwd'])) {
            $goods['tkl'] = $coupon['tpwd'];
        } else {
            $url = '';
            if (isset($coupon['coupon_click_url'])) {
                $url = $coupon['coupon_click_url'];
            }
            if (empty($url)) {
                $url = $coupon['item_url'];
            }
            $goods['tkl'] = $app->tool->createTpwd('萤火淘客', $url, '');
        }

        return view('home.goodsDetail', ['goods' => $goods,'footStatus'=>0]);
    }

    public function level()
    {
        return view('home.level', ['level' => Level::LevelMsg(),'footStatus'=>2]);
    }

    public function change(Request $request)
    {
        if ($request->ajax()) {
            $text = $request->post('text');
            $app = new Application(config('tbk.ztk'));
            $related = UserOauth::checkOauthById(auth('h5wechat')->id());
            if (!$related) {
                return json(100, '请先关联您的淘宝账户', url("home/oauth"));
            }
            try {
                $tkl = $app->tool->smartConvert($text, config('tbk.pid'));
            } catch (Exception $e) {
                $tkl = $e->getMessage();
            }
            if ($tkl && isset($tkl['tpwd'])) {
                $msg = $tkl['detail']['title'] . '   ' . $tkl['coupon_info'] . ' ' . $tkl['tpwd'];
                return json(200, '淘口令返回', $msg);
            } else {
                return json(20, '请检查您输入的链接/口令', $tkl);
            }
        }
        return view('home.change',['footStatus'=>2]);
    }

    public function oauth()
    {
        return view('home.oauth', ['footStatus'=>2,'oauth' => Taobao::getOauthUrl(auth('h5wechat'))]);
    }
}
