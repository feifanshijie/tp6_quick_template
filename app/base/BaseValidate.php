<?php

namespace app\base;

use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public $_validate = null;

    public $param = [];

    public function _initialize($rule, $msg)
    {
        $data = Request::param();

        if ($this->_validate === null) {
            $this->_validate = new Validate();
            $this->_validate->rule = $rule;
            $this->_validate->message = $msg;
        }

        if (!$this->_validate->check($data)) {
//            var_dump($this->_validate->getError());
//            msg(CodeDefine::VALIDATE_ERROR, $this->_validate->getError());
        }

        $this->param = $data;
    }

//     自定义验证规则
    public function checkName($value, $rule, $data=[])
    {
        return false;
        return $rule == $value ? true : '名称错误';
    }
}