<?php
/**
 * Created by yhc<445727994@qq.com>
 * Author: 萤火虫
 * Date: 2019/12/13
 * Time: 17:23
 */
//if (!function_exists('camelize')) {
//    /**
//    　　* 下划线转驼峰
//    　　* 思路:
//    　　* step1.原字符串转小写,原字符串中的分隔符用空格替换,在字符串开头加上分隔符
//    　　* step2.将字符串中每个单词的首字母转换为大写,再去空格,去字符串首部附加的分隔符.
//    　　*/
//    function camelize($uncamelized_words,$separator='_')
//    {
//        $uncamelized_words = $separator. str_replace($separator, " ", strtolower($uncamelized_words));
//        return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator );
//    }
//}
//
//if (!function_exists('uncamelize')) {
//    /**
//    　　* 驼峰命名转下划线命名
//    　　* 思路:
//    　　* 小写和大写紧挨一起的地方,加上分隔符,然后全部转小写
//    　　*/
//    function uncamelize($camelCaps,$separator='_')
//    {
//        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
//    }
//}

/**
 * @param $url
 * @param $key
 * @return mixed|string
 */
function getParseStr($url, $key) {
    $res = '';
    $query = parse_url($url);
    parse_str($query['query'], $params);
    if (!empty($params[$key])) {
        $res = $params[$key];
    }
    return $res;
}
if (!function_exists('db')) {

    /**
     * @param $table
     * @return \Illuminate\Database\Query\Builder
     */
    function db($table) {
        return \Illuminate\Support\Facades\DB::table($table);
    }
}
if (!function_exists('include_route_files')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function include_route_files($folder) {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);
            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }
                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
if (!function_exists('json')) {
    /**
     * @param int $code 状态码
     * @param string $message 状态描述
     * @param null $data 返回数据
     * @param int $statusCode
     * @param boolean $numberCheck
     * @return \Illuminate\Http\JsonResponse
     */
    function json(int $code, string $message, $data = [], $statusCode = 200, $numberCheck = false) {
        $array = [
            'code' => $code,
            'msg' => $message,
        ];


        $array['data'] = $data;

        if (!$numberCheck) {
            return response()->json($array, $statusCode);
        }

        return response()->json($array, $statusCode, [], JSON_NUMERIC_CHECK);
    }
}
if(!function_exists('qnImg')){
    function qnImg($url){
        return config('filesystems.disks.qiniu.url').'/'.$url ;
    }
}
