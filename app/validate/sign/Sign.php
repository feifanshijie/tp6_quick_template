<?php

namespace app\validate\sign;

use think\Validate;

class Sign extends Validate
{
    protected $rule = [
        'account' => 'require|max:32|min:6',
        'password' => 'require|min:6|max:32',
    ];

    protected $message = [
        'account.max' => '账号最长32位',
        'account.min' => '账号最短6位',
        'password.max' => '密码最长32位',
        'password.min' => '密码最短6位',
    ];
}