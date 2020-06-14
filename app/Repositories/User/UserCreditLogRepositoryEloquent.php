<?php

namespace App\Repositories\User;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\User\UserCreditLogRepository;
use App\Models\Entities\User\UserCreditLog;
use App\Validators\User\UserCreditLogValidator;

/**
 * Class UserCreditLogRepositoryEloquent.
 *
 * @package namespace App\Repositories\User;
 */
class UserCreditLogRepositoryEloquent extends BaseRepository implements UserCreditLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserCreditLog::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
