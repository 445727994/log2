<?php

namespace App\Http\Controllers\V1\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\AppSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AppSettingController extends Controller
{
    public function index($set_name){
        if(!in_array($set_name,['app_set'])){
            return json('401','参数错误');
        }
        $setting=AppSetting::getSetting($set_name);
        return json('200',$set_name.'设置返回',$setting);
    }
}
