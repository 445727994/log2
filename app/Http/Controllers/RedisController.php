<?php

namespace App\Http\Controllers;

use App\Jobs\Taoke\GetOrder;
use App\Tools\Tbk\TbSdk;
use App\Tools\Tbk\V1\Taobao;
use App\Tools\Tbk\Ztk;
use Vinkla\Hashids\Facades\Hashids;

class RedisController extends Controller
{

    public function testRedis()
    {
        $id=25;
        $ids=Hashids::encode($id);
        $tbkSdk=TbSdk::getInstance()->publisherSave('6200f131dffc671bfc433ZZc773a35c15492be3a90dc2c71121372610',$ids,'');
        exit;
     // $res=  Ztk::invitedCoed(2);
      $code='';
      $id=3;
     $ids=Hashids::encode($id);
    $res=Ztk::publisher($ids);
      var_dump($res);
//        Redis::set('name', 'yhc');
//        $values = Redis::get('name');
//        dd($values);
//        exec("cmd.exe");
//        $cmd='start cmd.exe @cmd /k "ping 127.0.0.1"';
//        $res=pclose(popen("start /B ". $cmd, "r"));
//        var_dump($res);exit;
//        exit;
        //每5分钟查询一次订单  付款订单写入  结算订单结算
//        $kl='￥TOQb1ozJ8jW￥';
//        $user=json_decode('{"id":2,"name":"\u8424\u706b\u866b","email":null,"mobile":"","wx_openid":"o8N8n58Nu6KziLfzq2zXjciWy9u0","wx_nickname":"\u8424\u706b\u866b","wx_head_img":"","level":"1","invited_id":1,"related":"1","team_id":0}');
//        $relation_id='720732350';
//        $taobao=new Taobao();
//       $res= $taobao->wechatTextMsg($kl,$user,$relation_id);
//       var_dump($res);exit;
        $start='2020-05-10 19:00:30';
        $end='2020-05-10 20:00:40';
        $rest =Ztk::getOrder($start,$end,2,100);
        var_dump($rest);exit;
        $GetOrder=new GetOrder($rest);
        $GetOrder->handle();
//        $this->repository->pushCriteria(new OrderCriteria());
//        $tbkOrders = $this->repository->paginate(10)->all();
//        foreach ($tbkOrders as $k=>$v){
//
//        }
//
//        var_dump($tbkOrders);exit;
        exit;
    }
}
