<?php

namespace App\Presenters\Taobao;

use App\Transformers\Taobao\TbkOrderLogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TbkOrderLogPresenter.
 *
 * @package namespace App\Presenters\Taobao;
 */
class TbkOrderLogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TbkOrderLogTransformer();
    }
}
