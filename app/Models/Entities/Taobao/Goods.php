<?php

namespace App\Models\Entities\Taobao;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Goods.
 *
 * @package namespace App\Models\Entities\Taobao;
 */
class Goods extends Model implements Transformable
{
    use TransformableTrait;
    protected $primaryKey = 'item_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    protected $table='tbk_goods';
    protected $guarded = [];
    const Field=['id','type','seller_id','item_title','item_short_title','item_desc','item_price','item_sale'
        ,'item_sale2','today_sale','item_copy','item_pic','fqcat',
        'item_end_price','shop_type','tkrates','tkmoney','coupon_url','coupon_money','coupon_surplus',
        'coupon_receive','coupon_receive2','today_coupon_receive','coupon_num','coupon_explain','coupon_starttime','coupon_endtime',
        'start_time','end_time','guide_article','seller_name','user_id','seller_nick','shop_name','discount','activityid','coupon_condition','taobao_image',
        'shop_id','son_category','general_index'];
}
