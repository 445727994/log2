<?php

namespace App\Repositories\Taobao;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\Taobao\TbkOrderLogRepository;
use App\Models\Entities\Taobao\TbkOrderLog;
use App\Validators\Taobao\TbkOrderLogValidator;

/**
 * Class TbkOrderLogRepositoryEloquent.
 *
 * @package namespace App\Repositories\Taobao;
 */
class TbkOrderLogRepositoryEloquent extends BaseRepository implements TbkOrderLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TbkOrderLog::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return TbkOrderLogValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
