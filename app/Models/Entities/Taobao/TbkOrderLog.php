<?php

namespace App\Models\Entities\Taobao;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TbkOrderLog.
 *
 * @package namespace App\Models\Entities\Taobao;
 */
class TbkOrderLog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    public function tbkOrder()
    {
        return $this->belongsTo('App\Models\Entities\Taobao\TbkOrder','ordernum','ordernum');
    }
    public static function  getUserPreCredit($userId,$status=1){
        $cacheKey='user_pre_money_'.$status;
        $credit=Cache::get($cacheKey);
        if(!$credit){
            $credit=  self::query()->where('user_id',$userId)->where('status',$status)->sum('credit');
            Cache::add($cacheKey,$credit,60);
        }
        return Cache::get($cacheKey);
    }
}
