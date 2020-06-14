<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class Level extends Model {
    protected $table = 'user_level';
    use Notifiable;
    const AllField=['id','team','up','commission','level_id','recommend_nums','is_auto'];
    protected $guarded = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public static function levelCommission($rate,$price,$userLevel='1'){
        $levelMsg=self::LevelMsg($userLevel);
        $commissionRate=$levelMsg['commission']??60;
        $commission=$price*$rate*0.01* $commissionRate*0.01;
        return sprintf('%.2f',$commission);
    }
    public static function LevelMsg($level){
        $cacheKey='level_msg_'.$level;
        if(!Cache::has($cacheKey)){
            $config=self::query()->where('id',$level)
                ->select(self::AllField)
                ->first();
            Cache::add($cacheKey,$config,config('cache.default_time'));
        }
        return Cache::get($cacheKey);
    }

}
