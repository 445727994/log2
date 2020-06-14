<?php

namespace App\Http\Controllers\V1\Api\Taobao;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\Taobao\TbkOrderLogCreateRequest;
use App\Http\Requests\Taobao\TbkOrderLogUpdateRequest;
use App\Repositories\Interfaces\Taobao\TbkOrderLogRepository;
use App\Validators\Taobao\TbkOrderLogValidator;

/**
 * Class TbkOrderLogsController.
 *
 * @package namespace App\Http\Controllers\V1\Api;
 */
class TbkOrderLogsController extends Controller
{
    /**
     * @var TbkOrderLogRepository
     */
    protected $repository;

    /**
     * @var TbkOrderLogValidator
     */
    protected $validator;

    /**
     * TbkOrderLogsController constructor.
     *
     * @param TbkOrderLogRepository $repository
     * @param TbkOrderLogValidator $validator
     */
    public function __construct(TbkOrderLogRepository $repository, TbkOrderLogValidator $validator)
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
        $tbkOrderLogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tbkOrderLogs,
            ]);
        }

        return view('tbkOrderLogs.index', compact('tbkOrderLogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TbkOrderLogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TbkOrderLogCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $tbkOrderLog = $this->repository->create($request->all());

            $response = [
                'message' => 'TbkOrderLog created.',
                'data'    => $tbkOrderLog->toArray(),
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
        $tbkOrderLog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $tbkOrderLog,
            ]);
        }

        return view('tbkOrderLogs.show', compact('tbkOrderLog'));
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
        $tbkOrderLog = $this->repository->find($id);

        return view('tbkOrderLogs.edit', compact('tbkOrderLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TbkOrderLogUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TbkOrderLogUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $tbkOrderLog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'TbkOrderLog updated.',
                'data'    => $tbkOrderLog->toArray(),
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
                'message' => 'TbkOrderLog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'TbkOrderLog deleted.');
    }
}
