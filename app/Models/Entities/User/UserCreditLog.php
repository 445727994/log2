<?php

namespace App\Models\Entities\User;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserCreditLog.
 *
 * @package namespace App\Models\Entities\User;
 */
class UserCreditLog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    public static function add($userId,$credit,$remark='',$type=1){
       return  self::query()->insert(
            ['user_id'=>$userId,'remark'=>$remark,'credit'=>$credit,'type'=>$type]
        );
    }
}
