<?php

namespace App\Models\Entities\Taobao;

use Illuminate\Database\Eloquent\Model;
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
}
