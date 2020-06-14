<?php

namespace App\Models\Wechat;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class WechatLog extends Model {
	protected $table = 'wechat_log';
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
	public static function addLog($msg,$return_msg,$user_id){
        return  self::create(['msg'=>$msg,'return_msg'=>$return_msg,'user_id'=>$user_id]);
    }
}
