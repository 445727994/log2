<?php

namespace App\Transformers\Taobao;

use League\Fractal\TransformerAbstract;
use App\Models\Entities\Taobao\TbkOrderLog;

/**
 * Class TbkOrderLogTransformer.
 *
 * @package namespace App\Transformers\Taobao;
 */
class TbkOrderLogTransformer extends TransformerAbstract
{
    /**
     * Transform the TbkOrderLog entity.
     *
     * @param \App\Models\Entities\Taobao\TbkOrderLog $model
     *
     * @return array
     */
    public function transform(TbkOrderLog $model)
    {
        return [
            'id'         => (int) $model->id,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
