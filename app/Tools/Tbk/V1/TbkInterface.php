<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/15
 * Time: 12:06
 */


namespace App\Tools\Tbk\V1;

interface TBKInterface
{


    /**
     * 超级搜索.
     * @return mixed
     */
    public function getDetail();

    /**
     * 搜索.
     * @return mixed
     */
    public function search();

    /**
     * 获取订单.
     * @param array $array
     * @return mixed
     */
    public function getOrders($startTime);

    /**
     * 获取结算订单.
     * @param array $array
     * @return mixed
     */
    public function getSucOrders($startTime);

    /**
     * 爬虫.
     * @param array $params
     * @return mixed
     */
    public function spider(array $params);
}
