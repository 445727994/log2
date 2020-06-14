<?php

namespace App\Http\Controllers\V1\Api\Wechat;

use App\Events\User\Register;
use App\Http\Controllers\Controller;
use App\Jobs\Wechat\sendMsg;
use App\Models\Setting\Setting;
use App\Models\Taoke\UserOauth;
use App\Models\User\User;
use App\Models\Wechat\WechatLog;
use App\Models\Wechat\WechatMsg;
use App\Tools\Tbk\V1\Taobao;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;

class IndexController extends Controller
{
    //微信接口服务
    public function server(Taobao $taobao)
    {
        $config = config('wechat.official_account.default');
        //验证hjbE5KD53End35Y6xL9ynBz88BX88yX5
//        $app = Factory::officialAccount($config);
//        $response = $app->server->serve();
//        return  $response->send();
      //  Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $app = Factory::officialAccount($config);
        $message=$app->server->getMessage();
        if(!isset($message['FromUserName'])||!$message['FromUserName']){
            return '';
        }
        $user=User::getUserByOpenId($message['FromUserName']);
        if(!$user){
            event(new Register($message,$app));
        }

        switch ($message['MsgType']) {
            case 'event':
                if(isset($message['Event'])&&$message['Event']=='subscribe'){
                    event(new Register($message,$app));
                }
                break;
            case 'text':
                $relation_id=UserOauth::checkOauthById($user->id);
                sendMsg::dispatch($message['FromUserName'],$taobao->getOauthUrl($user->id));
                if(!$relation_id){
                    sendMsg::dispatch($message['FromUserName'],'您还没有绑定淘宝，请在浏览器打开下面网址绑定淘宝');
                    sendMsg::dispatch($message['FromUserName'],$taobao->getOauthUrl($user->id));
                }
                $this->returnText($message,$taobao,$user,$relation_id);
                break;
            case 'image':
                break;
            case 'voice':

                break;
            case 'video':

                break;
            case 'location':

                break;
            case 'link':

                break;
            case 'file':

            // ... 其它消息
            default:
                //return '收到其它消息';
                break;
        }
        $app->server->push(function ($message){
            return 'success';
        });
        $response = $app->server->serve();
        return    $response ;
    }
    public function returnText($message,$taobao,$user,$relation_id){
        //先判断是否为数据库固定回复
        $msg=WechatMsg::msg($message['Content']);
        if($msg!=false){
            WechatLog::addLog($message['Content'],$msg,$user->id);
            sendMsg::dispatch($message['FromUserName'],Setting::getSetting('wechat_default'));
        }else{
            //sendMsg::dispatch($message['FromUserName'],$message['Content'].'|'.$user.'|'.$relation_id);
            sendMsg::dispatch($message['FromUserName'],$taobao->wechatTextMsg($message['Content'],$user,$relation_id));
        }
    }
    public function text(){
        $config = config('wechat.official_account.default');
        $taobao=new Taobao();
        $app = Factory::officialAccount($config);
        $openId=$message['FromUserName']='o8N8n56uwxv1wJj-cIOSp7HZi2-M';
        sendMsg::dispatch($message['FromUserName'],'您还没有绑定淘宝，请在浏览器打开下面网址绑定淘宝');
        exit;
        $message['Content']='￥ZRfh1f0PkiU￥';
        $user=User::getUserByOpenId($message['FromUserName']);
        $relation_id=UserOauth::checkOauthById($user->id);
        if(!$relation_id){
            sendMsg::dispatch($message['FromUserName'],'您还没有绑定淘宝，请在浏览器打开下面网址绑定淘宝');
            sendMsg::dispatch($message['FromUserName'],$taobao->getOauthUrl());
        }
        $this->returnText($message,$taobao,$user,$relation_id);
exit;

        if(!$relation_id){
            sendMsg::dispatch($message['FromUserName'],'您还没有绑定淘宝，请在浏览器打开下面网址绑定淘宝');
            sendMsg::dispatch($message['FromUserName'],'url');
        }
        $this->returnText($message,$app);exit;
        sendMsg::dispatch( $openId,json_encode($userId));
    }
}
