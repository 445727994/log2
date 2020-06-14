<?php

namespace App\Http\Controllers\V1\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    public function index(ResetPasswordRequest $request){
       if(!Hash::check(request('old_password'),auth("api")->user()->getAuthPassword())){
            return json(501,'原密码错误');
       };
       try{
           User::where('id' ,auth("api")->user()->getAuthIdentifier())->update(['password' => Hash::make(request('password'))]);
           return json(200,'修改成功');
       }catch (\Exception $e){
           return json(501,'修改失败,请稍后尝试');
       }
    }
}
