<?php

namespace app\base;

use think\Model;
use think\model\concern\SoftDelete;

class BaseModel extends Model{
    use SoftDelete;
}