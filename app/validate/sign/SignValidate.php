<?php

namespace app\validate\sign;

use app\base\BaseValidate;

class SignValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require|alphaDash|min:4|max:32',
        'password' => 'require|alphaDash|min:4|max:32'
    ];

    protected $msg = [
        'username.require' => '请填写账号',
        'username.alphaDash' => '账号只允许字母、数字和下划线 破折号',
        'username.min' => '账号最短4位',
        'username.max' => '账号最长32位',
        'password.require' => '请填写密码',
        'password.min' => '密码最短4位',
        'password.max' => '密码最长32位',
    ];

    public function __construct()
    {
        parent::_initialize($this->rule, $this->msg);
    }
}