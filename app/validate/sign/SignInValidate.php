<?php

namespace app\validate\sign;

use app\base\BaseValidate;

class SignInValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require|min:3|max:32',
        'password' => 'require|min:8|max:32'
    ];

    protected $msg = [
        'username.require' => '请填写账号',
        'username.min' => '账号最短3位',
        'username.max' => '账号最长32位',
        'password.require' => '请填写密码',
        'password.min' => '密码最短8位',
        'password.max' => '密码最长32位',
    ];

    public function __construct()
    {
        parent::_initialize($this->rule, $this->msg);
    }
}