<?php

namespace app\controller;

use app\base\CodeDefine;
use app\BaseController;
use app\model\WebsiteModel;
use app\validate\IndexValidate;
use think\response\Json;

class Index extends BaseController
{
    public function index(IndexValidate $params): Json
    {
        $domain = $params->param["domain"] ?? "www";
        $safeCode = $params->param["code"];

        $websiteList = (new WebsiteModel)
            ->with(["links" => function($query){
                $query->where('status',0)->order(['no'=>'asc','id'=>'desc']);
            }])
            ->where($condition)
            ->order('no', 'asc')
            ->select()
            ->visible(['links' => ['link', 'name', 'blank'], 'id', 'name', 'category_id', 'star', 'color']);


        if (isset($websiteDetails->id) && $websiteDetails->id > 0) {

            return res(CodeDefine::SUCCESS_CODE, 'success', $return);
        }

        return res(CodeDefine::FAILED_CODE, '未找到网站信息', []);
    }

    public function test()
    {
        echo "test";
    }
}
