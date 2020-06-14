<?php

namespace App\Presenters\Taobao;

use App\Transformers\Taobao\GoodsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class GoodsPresenter.
 *
 * @package namespace App\Presenters\Taobao;
 */
class GoodsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new GoodsTransformer();
    }
}
