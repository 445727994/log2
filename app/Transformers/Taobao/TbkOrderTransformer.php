<?php

namespace App\Transformers\Taobao;

use League\Fractal\TransformerAbstract;
use App\Models\Entities\Taobao\TbkOrder;

/**
 * Class TbkOrderTransformer.
 *
 * @package namespace App\Transformers\Taobao;
 */
class TbkOrderTransformer extends TransformerAbstract
{
    /**
     * Transform the TbkOrder entity.
     *
     * @param \App\Models\Entities\Taobao\TbkOrder $model
     *
     * @return array
     */
    public function transform(TbkOrder $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */
            'status'=>$this->status($model->status),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

}
