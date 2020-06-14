<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/17
 * Time: 11:00
 */
namespace App\Models\Taoke;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Category.
 */
class SpiderLog extends Model implements Transformable
{
    use TransformableTrait;
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'tbk_spider_logs';

    /**
     * @var array
     */
    protected $guarded = [];

}
