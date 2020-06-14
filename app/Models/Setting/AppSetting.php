<?php
namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AppSetting extends Model {
    protected $table = 'app_setting';
    protected $primaryKey = 'set_name';
    public static function getSetting($set_name){
        $key='AppSetting_'.$set_name;
        $cache=Cache::get($key);
        if(!$cache){
            Cache::set($key,self::find($set_name),3600);
        }
        return Cache::get($key);
    }
}
