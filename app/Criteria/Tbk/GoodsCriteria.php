<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/18
 * Time: 14:54
 */
namespace App\Criteria\Tbk;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CouponCriteria.
 */
class GoodsCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository.
     *
     * @param string $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        //搜索
        //排序
        $order=request('order','general_index');
        $orderType=request('orderType',0);
        $orderType=$orderType==0?"desc":'asc';
        $orderArray=['item_sale','item_price','coupon_money','general_index'];
        if(!in_array($order,$orderArray)){
            $model=$model->orderBy('general_index','desc');
        }else{
            $model=$model->orderBy($order,$orderType);
        }
        return $model;
    }
}
