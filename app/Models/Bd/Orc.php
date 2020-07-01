<?php

namespace App\Models\Bd;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Ixudra\Curl\Facades\Curl;
class Orc extends Model
{
    protected $table='bd_orc';
    protected $guarded = [];
    const Token = '';

    public static function getData($api, $data = [])
    {

    }
    public static function getScenes($name='scenes'){
        $key='orc_scenes_';
        if(!Cache::get($key)){
            $scenes=self::query()->pluck($name, 'id');;
            if(!$scenes){
                return false;
            }
            Cache::add($key,$scenes,3600);
        }
        return Cache::get($key);
    }
    public static function returnWecaht(){
        $scenes=self::getScenes();
        $msg="回复以下数字进行对应识别：\n";
        foreach ($scenes as $k=>$v){
            $msg.=$k.",".$v."\n";
        }
        return $msg;
    }
    public static function orc($type,$imgPath)
    {
        $url = 'https://aip.baidubce.com/rest/2.0/image-classify/v1/plant?access_token=';
        $img = base64_encode(file_get_contents($imgPath));
        $bodys = array(
            'imgUrl' => $imgPath,
            'scenes'=>self::getScenes()[$type]
        );
        $resp=Curl::to($url.self::Token)
            ->withData($bodys)
            ->post();
        return $resp;
    }

    public static function combination()
    {

    }
}
