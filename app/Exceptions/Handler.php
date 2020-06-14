<?php

namespace App\Exceptions;

use App\Http\Controllers\V1\Api\Auth\LoginController;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
           // return json(404,'抱歉，未找到数据！');
        }

        //jwt相关异常
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            //判断token是否存在
            if (!auth('api')->getToken()) {
                return json(402, 'token不存在', null, 200);
            }
            try {
                if (!JWTAuth::parseToken()->authenticate()) {
                    return json(402, '用户不存在', null, 200);
                }
            }catch(TokenExpiredException $exception){
                $Login=new LoginController();
                return $Login->refresh();
              //return json(302, 'Token过期', null, 200);
            }catch (Exception $e) {
                return json(402, 'Token错误', null, 200);
            }
        }
        //token黑名单
        if ($exception instanceof \Tymon\JWTAuth\Exceptions\TokenBlacklistedException) {
            return json(402, 'Token黑名单', null, 200);
        }
        return parent::render($request, $exception);
    }
}
//catch (\TokenExpiredException $exception) {
//    $token = $this->auth->refresh();
//    var_dump( $token );exit;
//    echo '<br>---statr-----<br>';
//    echo $token;
//    echo '<br>----end----<br>';
//    // 使用一次性登录以保证此次请求的成功
//    $sub = $this->auth->manager()->getPayloadFactory()->buildClaimsCollection()
//        ->toPlainArray()['sub'];
//    auth('api')->onceUsingId($sub);
//    return json(403, '刷新', null, 200);
//}catch (\Exception $exception) {
//    // 如果捕获到此异常，即代表 refresh 也过期了，
//    // 用户无法刷新令牌，需要重新登录。
//    return json(402, 'Token错误', null, 200);
//}
