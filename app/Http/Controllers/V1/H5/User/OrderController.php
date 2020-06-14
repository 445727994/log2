<?php

namespace App\Http\Controllers\V1\H5\User;

use App\Criteria\Tbk\OrderCriteria;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\Taobao\TbkOrderRepository;
use App\Validators\Taobao\TbkOrderValidator;

/**
 * Class TbkOrdersController.
 *
 * @package namespace App\Http\Controllers\V1\Api\Taobao;
 */
class OrderController extends Controller
{
    /**
     * @var TbkOrderRepository
     */
    protected $repository;

    /**
     * @var TbkOrderValidator
     */
    protected $validator;

    /**
     * TbkOrdersController constructor.
     *
     * @param TbkOrderRepository $repository
     * @param TbkOrderValidator $validator
     */
    public function __construct(TbkOrderRepository $repository, TbkOrderValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->wantsJson()) {
            $this->repository->pushCriteria(new OrderCriteria());
            $tbkOrders = $this->repository->paginate(10)->all();
            return json(200,'订单数据返回',$tbkOrders);
        }
        return view('user/order',['user'=>auth("h5wechat")->user(),'status'=>\request()->get('status',0)]);
        //return view('tbkOrders.index', compact('tbkOrders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetail()
    {
        $id=(int)\request()->get('id');
        $tbkOrder = $this->repository->find($id);
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $tbkOrder,
            ]);
        }
        return view('user/orderDetail', compact('tbkOrder'));
    }
}
