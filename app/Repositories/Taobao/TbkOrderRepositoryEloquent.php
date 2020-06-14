<?php

namespace App\Repositories\Taobao;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\Taobao\TbkOrderRepository;
use App\Models\Entities\Taobao\TbkOrder;
use App\Validators\Taobao\TbkOrderValidator;

/**
 * Class TbkOrderRepositoryEloquent.
 *
 * @package namespace App\Repositories\Taobao;
 */
class TbkOrderRepositoryEloquent extends BaseRepository implements TbkOrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TbkOrder::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return TbkOrderValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
