<?php

namespace App\Listeners\User;

use App\Events\User\Register;
use App\Jobs\Wechat\sendMsg;
use App\Models\User\User;
use App\Tools\Tbk\V1\Taobao;
use Illuminate\Support\Facades\Hash;
use Vinkla\Hashids\Facades\Hashids;

class RegisterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(Register $event)
    {
        $params = $event->params;
        $key = $params['EventKey']??'';
        $invited_id = 1;
        if ($key) {
            $invited= Hashids::decode(trim($key, 'qrscene_'));
            if (isset($invited[0])) {
                $invited_id = $invited[0];
            }
        }
        //关注自动生成账户 提示绑定淘宝
        //   $user= $app->user->get($params['FromUserName']);
        $this->registerWechatUser($params, $invited_id,$event->app);
    }

    public function registerWechatUser($wechatMsg, $invited_id=1,$app)
    {
        $user = User::query()->where('wx_openid',$wechatMsg['FromUserName'])->first();
        if (!$user) {
            if ($invited_id == 1) {
                $related = '1';
            } else {
                $related = User::query()->where('id', $invited_id)->value('related');
                $related = $related ?: 1;
                if($related){
                    $related=$invited_id.'_'.$related;
                }else{
                    $related=1;
                }
            }
            $WechatInfo =$app->user->get($wechatMsg['FromUserName']);
            $userArr = [
                'name' =>$WechatInfo['nickname'],
                'mobile' => '',
                'password' => Hash::make('12345678'),
                'wx_openid' => $wechatMsg['FromUserName'],
                'wx_nickname' =>$WechatInfo['nickname'],
                'wx_head_img' => $WechatInfo['headimgurl'],
                'invited_id' => $invited_id,
                'related' => $related,
            ];
            $user = User::query()->create($userArr);
        }
        $tbOauth = Taobao::getOauthUrl($user->id);
        sendMsg::dispatch($wechatMsg['FromUserName'], '感谢关注,请在浏览器(或淘宝APP搜索框搜索)打开下方链接绑定淘宝账户');
        sendMsg::dispatch($wechatMsg['FromUserName'], $tbOauth);
        return $user;
    }
}
