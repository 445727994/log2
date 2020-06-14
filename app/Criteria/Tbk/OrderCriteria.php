<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/5/5
 * Time: 10:16
 */
namespace App\Criteria\Tbk;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CouponCriteria.
 */
class OrderCriteria implements CriteriaInterface
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
        $order = request('order', 'paid_time');
        $userId=auth('h5wechat')->id();
        $status=request('status',0);
        if($status!=0){
            $model=$model->where('status',(int)$status);
        }
        $status=request('keywords','');
        if(!empty($keywords)){
            $model = $model->where('ordernum',$keywords);
        }
        if(!empty($userId)){
          //  $model=$model->where('user_id',$userId);
        }
        $orderType = request('orderType', 0);
        $orderType = $orderType == 0 ? "desc" : 'asc';
        $orderArray = ['create_at', 'item_price', 'coupon_money', 'general_index'];
        if (!in_array($order, $orderArray)) {
            $model = $model->orderBy('paid_time', 'desc');
        } else {
            $model = $model->orderBy($order, $orderType);
        }
        $model= $model->with(['tbkOrderLog' => function($query) {  //city对应上面province模型中定义的city方法名  闭包内是子查询
            if(!empty($userId)){
                return $query->select('*')->where('user_id',$userId);
            }
            return $query->select('*');
        }]);
        return $model;
    }
}
