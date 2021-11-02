<?php

namespace app\base;

/**
 * @explain 接口状态码统一配置
 */
class CodeDefine
{
    /**
     * 成功时返回
     */
 	const SUCCESS_CODE    = 200;

    /**
     * 失败时返回
     */
    const FAILED_CODE     = 400;

    /**
     * 参数验证不符合规则时返回
     */
    const VALIDATE_ERROR  = 422;

    /**
     * 需要验证登录状态 验证失败时返回
     */
    const LOGIN_AUTH_CODE = 405;

    /**
     * 登录超时
     */
    const LOGIN_TIME_OUT = 406;
}