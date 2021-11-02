<?php

namespace app\validate\common;

use app\base\BaseValidate;

class CommonIDValidate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|number',
    ];

    protected $msg = [
        'id.require' => '缺少参数ID',
        'id.number' => '参数ID只能是数字',
    ];


    public function __construct()
    {
        parent::_initialize($this->rule, $this->msg);
    }
}