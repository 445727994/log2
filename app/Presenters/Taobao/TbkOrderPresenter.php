<?php

namespace App\Presenters\Taobao;

use App\Transformers\Taobao\TbkOrderTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TbkOrderPresenter.
 *
 * @package namespace App\Presenters\Taobao;
 */
class TbkOrderPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TbkOrderTransformer();
    }
}
