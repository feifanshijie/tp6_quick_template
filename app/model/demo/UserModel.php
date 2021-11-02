<?php

namespace app\model\demo;

use think\Model;
use think\model\relation\HasMany;
use think\model\relation\HasOne;
use think\model\relation\BelongsToMany;

class UserModel extends Model
{
    protected $name = 'demo_user';

    // 模型初始化
    protected static function init()
    {

    }

    public function has_one(): HasOne
    {
        return $this->hasOne(UserBookModel::class, 'user_id');
    }

    public function has_many(): HasMany
    {
        return $this->hasMany(UserBookModel::class, 'user_id');
    }

    public function belongs_to_many(): BelongsToMany
    {
        //belongsToMany('关联模型','中间表','外键','关联键');
        return $this->belongsToMany(UserBookModel::class, 'user_id');
    }
}