<?php

namespace App\Http\Controllers\V1\Api\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreditLogCreateRequest;
use App\Http\Requests\UserCreditLogUpdateRequest;
use App\Repositories\Interfaces\User\UserCreditLogRepository;
use App\Validators\User\UserCreditLogValidator;

/**
 * Class UserCreditLogsController.
 *
 * @package namespace App\Http\Controllers\V1\Api\User;
 */
class UserCreditLogsController extends Controller
{
    /**
     * @var UserCreditLogRepository
     */
    protected $repository;

    /**
     * @var UserCreditLogValidator
     */
    protected $validator;

    /**
     * UserCreditLogsController constructor.
     *
     * @param UserCreditLogRepository $repository
     * @param UserCreditLogValidator $validator
     */
    public function __construct(UserCreditLogRepository $repository, UserCreditLogValidator $validator)
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
        $userCreditLogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCreditLogs,
            ]);
        }

        return view('userCreditLogs.index', compact('userCreditLogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreditLogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserCreditLogCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userCreditLog = $this->repository->create($request->all());

            $response = [
                'message' => 'UserCreditLog created.',
                'data'    => $userCreditLog->toArray(),
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
        $userCreditLog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userCreditLog,
            ]);
        }

        return view('userCreditLogs.show', compact('userCreditLog'));
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
        $userCreditLog = $this->repository->find($id);

        return view('userCreditLogs.edit', compact('userCreditLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserCreditLogUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserCreditLogUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userCreditLog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserCreditLog updated.',
                'data'    => $userCreditLog->toArray(),
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
                'message' => 'UserCreditLog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserCreditLog deleted.');
    }
}
