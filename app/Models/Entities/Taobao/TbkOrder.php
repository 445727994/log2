<?php

namespace App\Models\Entities\Taobao;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TbkOrder.
 *
 * @package namespace App\Models\Entities\Taobao;
 */
class TbkOrder extends Model implements Transformable
{
    use TransformableTrait;
    protected $table='tbk_order';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    public function tbkOrderLog()
    {
        return $this->hasMany('App\Models\Entities\Taobao\TbkOrderLog','ordernum','ordernum');
    }
}
