<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/13
 * Time: 15:53
 */
namespace App\Http\Requests\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'mobile'=> ['required', 'string', 'max:12', 'unique:users','regex:/^1[345789][0-9]{9}$/'],
            'password'=> ['required', 'string', 'min:8', 'confirmed']
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(response()->json([
            'code'=>501,
            'msg'=>$validator->errors(),
        ],200)));
    }

    public function messages()
    {
        return  [
            'name.required'=>'请填写用户名',
            'mobile.required'=>'手机号码必填',
            'mobile.regex'=>'手机号码填写错误',
            'password.required'=>'密码必填',
            'password.min' => '密码最少8位',
        ];
    }
}
