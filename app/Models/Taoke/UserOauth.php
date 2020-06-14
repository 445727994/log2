<?php

namespace App\Models\Taoke;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class UserOauth extends Model
{
    protected $table = 'tbk_user_oauth';
    protected $guarded = [];
    public static function checkOauthById($id,$type='tb'){
        $key='oauths_tb_'.$id;
        if(!Cache::get($key)){
            $taobao=self::query()->where('user_id',$id)->value('taobao');
            if(!$taobao){
                return false;
            }
            Cache::add($key,$taobao,3600);
        }
        return Cache::get($key);
    }
    public function oauthUrl(){

    }
}
