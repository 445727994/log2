<?php

namespace App\Models\Ads;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Ads extends Model
{
    protected $table = 'tbk_ads';
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public static function selectOption($where = [], $add = '') {
        if(empty($where)){
            $res = AdCate::pluck('name', 'id');
        }else{
            $res = AdCate::where($where)->pluck('name', 'id');
        }
        if ($add != '') {
            $res = array_merge(['0' => $add], json_decode(json_encode($res), true));
        }
        return $res;
    }
    public static function  ads($cateId){
        $key='TbkAds_'.$cateId;
        $cache=Cache::get($key);
        if(!$cache){
            Cache::set($key,self::query()->where(['cate_id'=>$cateId])->get(),3600);
        }
        return Cache::get($key);
    }
}
