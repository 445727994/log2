<?php

namespace App\Http\Controllers\V1\Api\Taobao;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Taobao\TbkOrderCreateRequest;
use App\Http\Requests\Taobao\TbkOrderUpdateRequest;
use App\Repositories\Interfaces\Taobao\TbkOrderRepository;
use App\Validators\Taobao\TbkOrderValidator;

/**
 * Class TbkOrdersController.
 *
 * @package namespace App\Http\Controllers\V1\Api\Taobao;
 */
class TbkOrdersController extends Controller
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
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $tbkOrders = $this->repository->all();
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $tbkOrders,
            ]);
        }
        return view('tbkOrders.index', compact('tbkOrders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TbkOrderCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TbkOrderCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tbkOrder = $this->repository->create($request->all());

            $response = [
                'message' => 'TbkOrder created.',
                'data'    => $tbkOrder->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tbkOrder = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tbkOrder,
            ]);
        }

        return view('tbkOrders.show', compact('tbkOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbkOrder = $this->repository->find($id);

        return view('tbkOrders.edit', compact('tbkOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TbkOrderUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TbkOrderUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tbkOrder = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TbkOrder updated.',
                'data'    => $tbkOrder->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'TbkOrder deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TbkOrder deleted.');
    }
}
