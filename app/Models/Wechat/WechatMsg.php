<?php

namespace App\Models\Wechat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
class WechatMsg extends Model {
	protected $table = 'wechat_msg';
	use Notifiable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	public static function msg($text){
	    $cacheKey='wechatMsg_'.$text;
	    if(Cache::has($cacheKey)){
	        return Cache::get($cacheKey);
        }
        $msg=self::query()->where('msg',$text)->value('return');
	    if($msg){
	        Cache::add($cacheKey,$msg,3600);
	        return $msg;
        }
	    return false;
    }
}
