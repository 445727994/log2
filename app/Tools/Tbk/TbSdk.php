<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2020/6/4
 * Time: 19:54
 */
namespace App\Tools\Tbk;
use TopClient;
class TbSdk{
    //https://mos.m.taobao.com/inviter/register?inviterCode=HHDB63&src=pub&app=common
    protected $invitedCode='HHDB63';
    protected $c;
    private static $instance = null;
    private function __construct(){
        $c = new TopClient;
        $c->appkey =config('tbk.appKey');
        $c->secretKey =config('tbk.appSecret');
        $this->c=$c;
    }
    public static function getInstance()
    {
        //检测当前类属性$instance是否已经保存了当前类的实例
        if (self::$instance == null) {
            //如果没有,则创建当前类的实例
            self::$instance = new self();
        }
        //如果已经有了当前类实例,就直接返回,不要重复创建类实例
        return self::$instance;
    }
//克隆方法私有化:禁止从外部克隆对象
    private function __clone(){}
    //因为用静态属性返回类实例,而只能在静态方法使用静态属性
    //所以必须创建一个静态方法来生成当前类的唯一实例
    public function publisherSave($sessionKey,$note,$info){
        $req = new \TbkScPublisherInfoSaveRequest;
        $req->setRelationFrom("1");
        $req->setOfflineScene("1");
        $req->setOnlineScene("1");
        $req->setInviterCode($this->invitedCode);
        $req->setInfoType("1");
        $req->setNote($note);
        $req->setRegisterInfo($info);
        $resp =$this->c->execute($req, $sessionKey);
        if(isset($resp->data)){
            return $resp->data;
        }
        return false;
    }

}
