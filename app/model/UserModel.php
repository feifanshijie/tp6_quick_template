<?php

namespace app\model;

use app\base\BaseModel;

class UserModel extends BaseModel
{
    // 指定表名
    protected $name = 'user';
    // 只读字段
    protected $readonly = ['name', 'email'];
    // 软删除字段（需要时时间戳类型timestamp默认值需要时null）
    protected $deleteTime = 'deleted_time';
    // 也可以指定默认值
    protected $defaultSoftDelete = 0;
}