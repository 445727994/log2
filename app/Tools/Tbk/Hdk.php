<?php
namespace App\Tools\Tbk;
use Ixudra\Curl\Facades\Curl;
class Hdk
{
    const SUFFIX='_310x310.jpg';
    public  static function  getData($api,$data=[]){
        $url='http://v2.api.haodanku.com/';
        $common_data=[
            'apikey' => 'yhtk'
        ];
        if(!empty($data)){
            $data=array_merge($data,$common_data);
        }else{
            $data=$common_data;
        }
        $resp=Curl::to($url.$api)
            ->withData($data)
            ->get();
        return $resp;
    }
    public static function picSuffix($data){
        if(is_string($data)){
            $data=explode(',',$data);
        }
        if(isset($data)&&!empty($data)&&is_array($data)){
            foreach ($data as $k=>&$v){
                $v=$v.self::SUFFIX;
            }
        }else{
            $data=$data.self::SUFFIX;
        }
        return json_encode($data,true);
    }
    public static function goods(array $params) {
        //获取最近整点时间
        $timestamp = date('H'); //当前时间的整点
        $min_id = $params['min_id'] ?? 1;
        //设置中的好单库配置
        $params = [
            'start' => $timestamp - 1,
            'end' => $timestamp,
            'min_id' => $min_id,
            'back' => 500, //请在1,2,10,20,50,100,120,200,500,1000中选择一个数值返回
        ];
        $results = self::getData('itemlist',$params);
        $results = json_decode($results);
        if ($results->code != 1) {
            throw new \InvalidArgumentException($results->msg);
        }
        return [
            'data' => $results->data,
            'min_id' => $results->min_id,
        ];
    }
    public  static  function  updateGoods($params){
        $hdkParams = [
            'sort' => $params['sort'] ?? 1,
            'back' => $params['back'] ?? 500,
            'min_id' => $params['min_id'] ?? 1,
        ];
        $results = self::getData('update_item',$hdkParams);
        $results = json_decode($results);
        if ($results ->code != 1) {
            throw new \InvalidArgumentException($results->msg);
        }
        return [
            'data' =>  $results->data,
            'min_id' =>  $results->min_id,
        ];
    }
    public  static  function  deleteGoods(array $params){
        $results = self::getData('get_down_items',$params);
        $results = json_decode($results);
        if ($results ->code != 1) {
            throw new \InvalidArgumentException($results->msg);
        }
        return $results->data;
    }
}
