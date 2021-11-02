<?php

namespace app\validate;

use app\base\BaseValidate;

class IndexValidate extends BaseValidate
{
    protected $rule = [
        'domain' => 'alphaDash|max:32',
        'code' => 'alphaDash'
    ];

    protected $msg = [
        'domain.require' => '缺少参数二级域名',
        'domain.alphaDash' => '二级域名只允许字母、数字和下划线 破折号',
        'domain.max' => '二级域名最长32位',
        'code.alphaDash' => '安全码只允许字母、数字和下划线 破折号',
    ];

    public function __construct()
    {
        parent::_initialize($this->rule, $this->msg);
    }
}