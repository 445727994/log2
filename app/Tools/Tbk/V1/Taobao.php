<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/17
 * Time: 16:53
 */
namespace App\Tools\Tbk\V1;
use App\Jobs\Wechat\sendMsg;
use App\Models\Wechat\WechatLog;
use App\Tools\Tbk\Hdk;
use App\Tools\Tbk\Ztk;
use Yhcztk\Zhetaoke\Application;
use Vinkla\Hashids\Facades\Hashids;

class Taobao implements TBKInterface {
    use TBKCommon;
    public function search($array = []) {

    }
    public function getOrders($startTime) {
        // 查询从 2019-02-02 00:00:00 开始，1200 秒内创建的订单
        $app = new Application(config('tbk.ztk'));
        //10min 一次
        return  $app->tool->ordersByCreateAt($startTime, '70');
    }
    public function getSucOrders($startTime) {
        // 查询从 2019-02-02 00:00:00 开始，1200 秒内创建的订单
        $app = new Application(config('tbk.ztk'));
        //10min 一次
        return  $app->tool->ordersByCreateAt($startTime, '70');
    }
    public function getDetail($array = []) {

    }
    public function spider(array $params)
    {

    }

    public function goods(array $params){
        return Hdk::goods($params);
    }
    public  function updateGoods(array $params){
        return Hdk::updateGoods($params);
    }
    public function deleteGoods(array $params){
        return Hdk::deleteGoods($params);
    }
    public static function  getOauthUrl($userId='',$default='h5wechat'){
        if(!$userId){
            $userId=auth($default)->id();
        }
        $hashids=Hashids::encode($userId);
        return "https://oauth.m.taobao.com/authorize?response_type=code&client_id=" .
            config('tbk.appKey') .
            "&redirect_uri=" . config('app.url') . "/tboauth/{$hashids}";
    }
    public static  function  getUserRelation($userId='',$default='h5wechat'){
        if(!$userId){
            $userId=auth($default)->id();
        }

        return ;
    }
    public  function  itemDetail($itemId,$type,$shopType=''){
        if($type=="1"||is_numeric($this->checkUrl($itemId))){
            //根据Id搜索接口
            $res=Ztk::itemDetail($itemId);
            var_dump($res);exit;
        }elseif($this->checkIsTkl($itemId)){
            //根据淘口令搜索接口

        }else{
            //文字搜索
        }
    }
    //判断是否为网址
    protected  function  checkUrl($itemId){
        if (strpos($itemId, "a.m.taobao.com") > 0 || strpos($itemId, "a.m.tmall.com") > 0) {
            preg_match("/i(\\d+).htm/i", $itemId, $matchitemid);
            if ($matchitemid[1] > 0) {
                $itemId = $matchitemid[1];
            }
        }
        if (strpos($itemId, "ju.taobao") > 0) {
            $itemId = getParseStr($itemId, "item_id");
        }
        if (strpos($itemId, "item.taobao.com") > 0 || strpos($itemId, "detail.m.tmall.com") > 0 || strpos($itemId, "detail.tmall.com") > 0) {
            $itemId =getParseStr($itemId, "id");
        }
        if ((strpos($itemId, "item.taobao.com") > 0 || strpos($itemId, "detail.m.tmall.com") > 0 || strpos($itemId, "detail.tmall.com") > 0) && empty($itemId)) {
            preg_match("/[\\?&]id=(\\d+)/", $itemId, $matchitemid);
            if ($matchitemid[1] > 0) {
                $itemId = $matchitemid[1];
            }
        }
        return $itemId;
    }
    //判断是否为淘口令
    protected function checkIsTkl($itemId){
        //淘口令查询 调用折淘客接口查
        if (substr_count($itemId , '￥') >= 2
            || substr_count($itemId, '《') == 2
            || substr_count($itemId, '€') == 2
            || substr_count($itemId, '¢') == 2
            || substr_count($itemId, '₴') == 2
            || (substr_count($itemId, '(') == 1 && substr_count($itemId, ')') == 1 )
            || substr_count($itemId,'$') >= 2
            || substr_count($itemId,'¥') >= 2
        ){
            return true;
        }
        return false;
    }
    public function wechatTextMsg($text,$user,$relation_id=''){
        $return=Ztk::tklChange($text,$relation_id);
        WechatLog::addLog($text,$return,$user->id);
        return  $return;
    }
}
