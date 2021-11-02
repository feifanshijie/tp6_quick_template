<?php

namespace app\validate\common;

use app\base\BaseValidate;

class CommonIDStrValidate extends BaseValidate
{
    protected $rule = [
        'id' => 'require',
    ];

    protected $msg = [
        'id.require' => '缺少参数ID',
    ];


    public function __construct()
    {
        parent::_initialize($this->rule, $this->msg);
    }
}