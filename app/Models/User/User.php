<?php

namespace App\Models\User;

use App\Jobs\Wechat\sendMsg;
use App\Models\Entities\User\UserCreditLog;
use App\Models\Taoke\UserOauth;
use App\Tools\Tbk\V1\Taobao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class User extends Model {
	protected $table = 'users';
	use Notifiable;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'mobile', 'wx_openid', 'wx_nickname', 'wx_head_img','related','invited_id','login_ip','team_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];
	const AllField=['id','name','email','mobile','wx_openid','wx_nickname',
        'wx_head_img','level','invited_id','related','team_id'
    ];
	//定义普通字段
	const FIELD = [
		'id' => ['sort' => true, 'name' => '用户序号', 'quickSearch' => 'equal'],
		'name' => ['name' => '姓名', 'type' => 'text', 'quickSearch' => 'like'],
		'mobile' => ['name' => '手机', 'type' => 'mobile', 'quickSearch' => 'like'],
		'email' => ['name' => '邮箱', 'type' => 'email', 'quickSearch' => 'like'],
		'wx_nickname' => ['name' => '微信昵称', 'type' => 'text'],
		'wx_head_img' => ['name' => '微信头像', 'type' => 'text'],
		'created_at' => ['sort' => true, 'name' => '创建时间'],
		'updated_at' => ['sort' => true, 'name' => '创建时间'],
	];
	const PAGE = 20;
	const SEARCH = ['name', 'id', 'email', 'mobile', 'wx_nickname'];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
	//关联用户select
	public static function selectOption($where = []) {
		return User::where($where)->pluck('name', 'id')->toArray();
	}
    public static function getUserByOpenId($openid){
        $key="users_".$openid;
        $user=Cache::get($key);
        if(!$user){
            $user=self::query()->where('wx_openid',$openid)->select(self::AllField)->first();
            Cache::add($key,$user,3600);
        }
        return Cache::get($key);
    }
    public static function getUserByRelated($related){
        $key="user_related_".$related;
        $user=Cache::get($key);
        if(!$user){
            $user=UserOauth::query()->where('openid',$related)->value('user_id');
            Cache::add($key,$user,3600);
        }
        $userId=Cache::get($key);
        return self::getUserById($userId);
    }
    public static function getUserById($id){
        $key="user_id_".$id;
        $user=Cache::get($key);
        if(!$user){
            $user=self::query()->where('id',$id)->select(self::AllField)->first();
            Cache::add($key,$user,3600);
        }
        return Cache::get($key);
    }
    public static function userCredit($userId,$credit,$remark='',$type=''){
        if($credit>0){
            self::query()->increment('credit', $credit);
        }else{
            self::query()->decrement('credit', abs($credit));
        }
        UserCreditLog::add($userId,$credit,$remark,$type);
    }
    public function userMoney()
    {
        return $this->hasOne('App\Models\User\UserMoney','user_id','id');
    }
}
