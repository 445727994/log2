<?php

namespace App\Transformers\Taobao;

use League\Fractal\TransformerAbstract;
use App\Models\Entities\Taobao\Goods;

/**
 * Class GoodsTransformer.
 *
 * @package namespace App\Transformers\Taobao;
 */
class GoodsTransformer extends TransformerAbstract
{
    /**
     * Transform the Goods entity.
     *
     * @param \App\Models\Entities\Taobao\Goods $model
     *
     * @return array
     */
    public function transform(Goods $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
