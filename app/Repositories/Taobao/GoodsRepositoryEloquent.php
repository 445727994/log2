<?php

namespace App\Repositories\Taobao;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\Taobao\GoodsRepository;
use App\Models\Entities\Taobao\Goods;
use App\Validators\Taobao\GoodsValidator;

/**
 * Class GoodsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Taobao;
 */
class GoodsRepositoryEloquent extends BaseRepository implements GoodsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Goods::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GoodsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
