<?php

namespace app\controller\demo;

use app\base\BaseController;
use think\facade\Request;
use think\response\Json;

/**
 * 请求方式相关
 */
class DemoRequest extends BaseController
{
    private $method;

    public function __construct()
    {
        $this->method = Request::method();
    }

    public function method()
    {
        return successMsg("request: $this->method");
    }

    public function get()
    {
        return successMsg("request: $this->method");
    }

    public function post(): Json
    {
        return successMsg("request: $this->method");
    }

    public function options(): Json
    {
        return successMsg("request: $this->method");
    }

    public function put(): Json
    {
        return successMsg("request: $this->method");
    }

    public function delete(): Json
    {
        return successMsg("request: $this->method");
    }

    public function patch(): Json
    {
        return successMsg("request: $this->method");
    }
}
