<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/12
 * Time: 16:48
 */
namespace App\Tools\Tbk;
use Ixudra\Curl\Facades\Curl;

class Ztk{
    public  static function  getData($api,$data=[],$num='10001',$second=false){
        $url='https://api.zhetaoke.com:'.$num.'/api/';
        $common_data=[
            'appkey'=>config('tbk.ztk.app_key')
            ,'sid'=>config('tbk.ztk.sid')
            ,'pid'=>config('tbk.pid')
        ];
        if(!empty($data)){
            $data=array_merge($data,$common_data);
        }else{
            $data=$common_data;
        }
        $resp=Curl::to($url.$api)
            ->withData($data)
            ->get();
        if($second==true){
            $resp=json_decode($resp,true);
            if(isset($resp['url'])){
                $resp=Curl::to($resp['url'])
                    ->get();
                return json_decode($resp,true);
            }
        }
        return json_decode($resp,true);
    }
    public  static function  itemDetail($itemId){
        $resp=self::getData('api_detail.ashx',['tao_id'=>$itemId],'10002');
        if($resp['status'] && $resp['status']==200 &&$resp['content'][0]){
            return $resp->results->n_tbk_item;
        }
        return [];
    }

    public static function tklSearch($Tkl,$type=4){
        $resp=self::getData('open_gaoyongzhuanlian_tkl.ashx',['	tkl'=>$Tkl]);
        if($resp && $resp->tbk_item_info_get_response){
            return $resp->results->n_tbk_item;
        }
        return [];
    }
    public  static function publisher($hashids='',$invitedCode='HHDB63'){
        $resp=self::getData('open_sc_publisher_save.ashx',['inviter_code'=>$invitedCode,'type'=>1,'backurl'=>config('app.url') . "/relationCallback/{$hashids}"]);
        var_dump($resp);exit;
        if($resp && $resp->tbk_item_info_get_response){
            return $resp->results->n_tbk_item;
        }
        return [];
    }
    public  static function invitedCoed($type=3){
        $resp=self::getData('open_sc_invitecode_get.ashx',['relation_app'=>'common','code_type'=>$type,'relation_id'=>'2494492898']);
        var_dump($resp);exit;
    }
    public static function shortUrl($url,$type=3){

    }
    public static function getOrder($start,$end,$query_type='2',$pageSize=100,$page=''){
        $params=  ['start_time'=>$start,'end_time'=>$end,'query_type'=>$query_type,'page_size'=>$pageSize];
        if($page!=''){
            $params['position_index']=$page;
        }
        $resp=self::getData('open_dingdanchaxun2.ashx',$params,'10001',true);
        $data=[];
        if(isset($resp['tbk_sc_order_details_get_response']['data'])){
            $data=$resp['tbk_sc_order_details_get_response']['data'];
        }
        return $data;
    }
    public static function tklChange($tkl,$relation_id='720732350'){
        $resp=self::getData('open_gaoyongzhuanlian_tkl.ashx',['tkl'=>urlencode($tkl),'relation_id'=>$relation_id,'signurl'=>'4'],'10001');
        if(isset($resp['tbk_privilege_get_response']['result']['data']['tkl'])){
            $data=$resp['tbk_privilege_get_response']['result']['data'];
            $str='';
            if(isset($data['title'])){
                $str.='【'.$data['title'].'】';
            }
            if(isset($data["zk_final_price"])&&!empty(  $data['zk_final_price'])){
                $str.="\n". '折扣价:'.  $data["zk_final_price"];
            }
            if(isset($data['coupon_info'])&&!empty($data['coupon_info'])){
                $str.="\n". '优惠券:'.  $data['coupon_info'];
            }
            if(isset($data['tkl'])&&!empty(  $data['tkl'])){
                $str.="\n". '淘口令:'. $data['tkl'];
            }
            return $str;
        }
        return '口令转换失败,商品不属于淘客推广商品';
    }
    public static function tklChange2($tkl,$relation_id='720732350'){
        $resp=self::getData('open_tkl_create.ashx',['text'=>$tkl,'relation_id'=>$relation_id,'signurl'=>'3'],'10001');
        return [];
    }
    public static function transformable(){
        $arr=[
            'tao_id'=>'item_id',
            'tao_title'=>'item_title',
            'title'=>'item_short_title',
            'jianjie'=>'item_desc',
            'pict_url'=>'item_pic',
            'seller_id'=>'user_id',
            'volume'=>'item_sell',
            'quanhou_jiage'=>'item_end_price',
            'size'=>'item_price',
            'tkrate3'=>'tkrate',
            'tkfee3'=>'tkmoney',
            'coupon_id'=>'activityid',
            'coupon_info_money'=>'coupon_money',
            'coupon_total_count'=>'coupon_num',
            'coupon_remain_count'=>'coupon_surplus',
            'coupon_info'=>'coupon_explain',
            'nick'=>'seller_nick',
            'small_images'=>'taobao_image',
            'shop_title'=>'seller_name'
        ];
    }
}
