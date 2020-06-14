<?php
namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
class UserMoney extends Model {
    protected $table = 'user_money';
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public static function getUserMoney($id){
        $key="user_money".$id;
        $user=Cache::get($key);
        if(!$user){
            $user=self::query()->where('id',$id)->select(['money','predit_money'])->first();
            Cache::set($key,$user,3600);
        }
        return Cache::get($key);
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User\User','id','user_id');
    }
}
