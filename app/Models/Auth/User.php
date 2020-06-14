<?php

namespace App\Models\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable  implements JWTSubject
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'wx_openid', 'wx_nickname', 'wx_head_img',
    ];
    /**
     * 获取token
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {

        return [];
    }
}
