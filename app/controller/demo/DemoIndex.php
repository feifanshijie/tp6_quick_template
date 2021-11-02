<?php

namespace app\controller;

use app\base\CodeDefine;
use app\BaseController;
use app\model\WebsiteModel;
use think\response\Json;

/**
 * 缓存操作相关示例
 */
class DemoIndex extends BaseController
{
    public function index() : Json
    {
        $domain = $params->param["domain"] ?? "www";
        $safeCode = $params->param["code"];

        if (isset($websiteDetails->id) && $websiteDetails->id > 0) {

            return res(CodeDefine::SUCCESS_CODE, 'success', $return);
        }

        return res(CodeDefine::FAILED_CODE, '未找到网站信息', []);
    }

    /**
     * 获取参数
     */
    public function param()
    {

    }
}
