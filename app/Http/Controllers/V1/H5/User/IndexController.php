<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/5/4
 * Time: 21:16
 */
namespace App\Http\Controllers\V1\H5\User;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use EasyWeChat\Factory;
use Vinkla\Hashids\Facades\Hashids;


class IndexController extends Controller
{
    public function index(){
        $user=User::query()->with(['userMoney'])->find(auth('h5wechat')->id());
        $user->wx_nickname=base64_decode($user->wx_nickname);
        return view('user/index',['user'=>$user,'footStatus'=>4]);
    }
    public function invitation(){
        $userInvited=User::query()->where('invited_id',auth('h5wechat')->id())->count('id');
        $config = config('wechat.official_account.default');
        $app = Factory::officialAccount($config);
        $userCode=Hashids::encode(auth('h5wechat')->id());

        $result = $app->qrcode->temporary($userCode, 6 * 24 * 3600);
        $url = $app->qrcode->url($result['ticket']);
        return view("user/invitation",['userInvited'=>$userInvited,'url'=>$url,'footStatus'=>4]);
    }
}
