<?php

namespace App\Http\Controllers\V1\Api\Taobao;

use App\Http\Controllers\Controller;
use App\Models\Setting\AppSetting;
use App\Models\Setting\Setting;
use App\Models\Taoke\UserOauth;
use App\Tools\Tbk\TbSdk;
use App\Tools\Tbk\V1\Taobao;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;
use Vinkla\Hashids\Facades\Hashids;

class OauthController extends Controller
{
    public function tbOauth($hashid){
        $AppSetting=AppSetting::getSetting('app_set');
        $userid = Hashids::decode($hashid);
        if(empty($userid)||empty($userid[0])){
            $arr= ['setting' =>$AppSetting,'status'=>1,'msg'=>Setting::getSetting('oauth_error')];
        }else{
            $userid=$userid[0];
            $code = request('code');
            $data = request('data');
            if (!$data) {
                $parameter = [
                    'client_id' => config('tbk.appKey'),
                    'client_secret' => config('tbk.appSecret'),
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => config('app.url') . "/tbcallback",
                    'state' => $hashid,
                    'view' => 'wap',
                ];
                $rest = Curl::to('https://oauth.taobao.com/token')
                    ->withData($parameter)
                    ->asJsonResponse()
                    ->post();
            }else{
                $rest = json_decode($data);
            }
            if (isset($rest->access_token)){
                $isset= UserOauth::query()->where('taobao',$rest->taobao_user_id)->value('user_id');
                if($isset && $isset!=$userid){
                    $arr= ['setting' =>$AppSetting,'status'=>1,'msg'=>Setting::getSetting('oauth_repeat')];
                }else{
                    $updateArr=[
                        'session_key' => $rest->access_token ?? '',
                        'nickname' => urldecode($rest->taobao_user_nick),
                        'openid' => $rest->taobao_user_id ?? '',
                        'taobao' => $rest->taobao_user_id ?? '',
                        'open_uid'=>$rest->taobao_opne_uid??"",
                        'expire_time' => date('Y-m-d H:i:s', substr($rest->expire_time,0,-3)),
                    ];
                    $relation=TbSdk::getInstance()->publisherSave($updateArr['session_key'],$hashid,'');
                    var_dump($relation);
                    if($relation){
                        $updateArr['relation_id']=$relation->relation_id??"";
                        $updateArr['account_name']=$relation->account_name??"";
                        $updateArr['special_id']=$relation->special_id??"";
                    }
                    UserOauth::query()->updateOrCreate([
                        'user_id' => $userid,
                    ],$updateArr);
                    var_dump($updateArr);
                    $arr= ['setting' =>$AppSetting,'status'=>0,'msg'=>Setting::getSetting('oauth_suc')];
                }
            }else{
                $arr= ['setting' =>$AppSetting,'status'=>1,'msg'=>Setting::getSetting('oauth_error')];
            }
        }
$arr['footStatus']=0;
        return view('taobao.oauth',$arr);
    }
    public  function  relationCallback(){
        $taobao=new Taobao();
        $taobao->getUserRelation();
        file_put_contents('text.txt',json_encode($_REQUEST));
    }
}
