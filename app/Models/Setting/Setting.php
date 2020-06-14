<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/1/21
 * Time: 15:23
 */

namespace App\Models\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'set_name';

    public static function getSetting($set_name)
    {
        $key='setting_'.$set_name;
        $cache = Cache::get($key);
        if (!$cache) {
            Cache::set($key, self::query()->where('set_name',$set_name)->value('set_value'), 3600);
        }
        return Cache::get($key);
    }
}
