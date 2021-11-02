<?php
// 应用公共文件
use app\base\CodeDefine;

function request($url, array $data = [], $mode = 'GET', array $header = [])
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    // 只获取页面内容，但不输出
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 60);   //只需要设置一个秒的数量就可以
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 120);
    // 验证是否是https请求
    if (substr($url, 0, 5) == 'https') {
        // https请求，不验证证书
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        // https请求，不验证HOST
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
//    if ($mode == 'POST') {
//        if (isset($header["Content-Type"]) && $header["Content-Type"] == "application/json") {
//            $data = json_encode($data);
//        }
//        // 设置请求方式为POST请求
//        curl_setopt($curl, CURLOPT_POST, 1);
//        // POST请求数据
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//    }
//    if (!empty($header)) {
//        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
//    }

    $result = curl_exec($curl);
    curl_close($curl);
    var_dump($result);
    var_dump("===");
    return $result;
}

/**
 * 强制中断返回JSON
 */
if (!function_exists('msg')) {
    function msg($code = 200, $msg = '', $data = null, $status = 1)
    {
        header('Access-Control-Allow-Origin: *');
        header('content-type:application/json;charset=utf-8');
        $data = empty($data) ? (object)[] : $data;
        exit (json_encode(['code' => $code, 'msg' => $msg, 'data' => $data, 'status' => $status]));
    }
}

function res($code = 200, $msg = '', $data = null, $status = 1): \think\response\Json
{
    if (empty($data)) $data = [];
    return json(['code' => $code, 'msg' => $msg, 'data' => $data, 'status' => $status]);
}

function success($data = []): \think\response\Json
{
    if (empty($data)) $data = [];
    return json(['code' => CodeDefine::SUCCESS_CODE, 'msg' => "success", 'data' => [], 'status' => 1]);
}

function successMsg($msg = ''): \think\response\Json
{
    if (empty($data)) $data = [];
    return json(['code' => CodeDefine::SUCCESS_CODE, 'msg' => $msg, 'data' => [], 'status' => 1]);
}

function GetRandomStr($length, $fixed = true): string
{
    $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $randStr = str_shuffle($str);//打乱字符串
    return substr($randStr, 0, $length);//substr(string,start,length);返回字符串的一部分
}