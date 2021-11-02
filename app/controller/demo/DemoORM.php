<?php

namespace app\controller;

use app\base\BaseController;
use app\model\demo\UserModel;
use think\facade\Db;

/**
 * ORM操作相关示例
 */
class DemoORM extends BaseController
{
    // 创建操作
    public function create()
    {
        $data = [

        ];
        // 获取插入后的主键ID
        $result = UserModel::insertGetId($data);

        // 添加一条
        $user = new UserModel();
        $user->save([
            "username" => "helloworld",
        ]);

        // 添加多条
        $list = [
            ['name' => 'xiaoming', 'email' => 'xiaoming@qq.com'],
            ['name' => 'xiaohong', 'email' => 'xiaohong@qq.com']
        ];
        $user->saveAll($list);

        // 使用create添加一条
        $user = UserModel::create([
            'name' => 'xiaoming',
            'email' => 'xiaoming@qq.com'
        ]);

        // 只允许写入name和email字段的数据
        $user = UserModel::create([
            'name' => 'xiaoming',
            'email' => 'xiaoming@qq.com'
        ], ['name', 'email']);

        // replace替换操作
        $user = UserModel::create([
            'name' => 'xiaoming',
            'email' => 'xiaoming@qq.com'
        ], ['name', 'email'], true);
    }

    // 更新操作
    public function update()
    {
        $data = [
            "username" => "helloworld"
        ];

        $condition = [
            "id" => 1,
        ];
        $result = UserModel::update($data, $condition);
        // 只允许更新username字段
        $result = UserModel::update($data, $condition, ["username"]);

        // 查找后更新
        $user = UserModel::find(1);
        $user->name = 'xiaoming';
        $user->email = 'xiaoming@qq.com';
        // 生成原生sql语法
        $user->score = Db::raw('score+1');
        // 不会更新未变化的数据
        $user->save();
        // 强制更新
        $user->force()->save();

        return success($result);
    }

    // 删除操作
    public function delete()
    {
        // 根据主键删除（如果开启软删除就是软删除）
        UserModel::destroy(1);
        // 批量删除（如果开启软删除就是软删除）
        UserModel::destroy([1, 2, 3]);
        // 真实删除
        UserModel::destroy(1,true);

        // 按条件删除
        UserModel::destroy(function ($query) {
            $query->where('id', '>', 10);
        });
        // 按条件删除（如果开启软删除就是软删除）
        UserModel::where('id', '>', 10)->delete();
        // 真实删除
        UserModel::where('id', '>', 10)->force()->delete();

        // 查询包含软删除的数据
        UserModel::withTrashed()->find();
        UserModel::withTrashed()->select();
        // 仅查询包含软删除的数据
        UserModel::onlyTrashed()->find();
        UserModel::onlyTrashed()->select();
        // 恢复被软删除的数据
        $user = UserModel::onlyTrashed()->find(1);
        $user->restore();

        return success();
    }

    // 查询操作
    public function query()
    {
        $condition = ['status' => 0];

        // 取1条
        UserModel::where($condition)->find();
        // 找不到就返回一个空模型
        $user = UserModel::findOrEmpty(1);
        // 判断是否是空模型（找没找到）
        if ($user->isEmpty()) {
            echo "empty";
        }
        // 根据主键获取多个数据
        $list = UserModel::select([1, 2, 3]);
        // 对数据集进行遍历操作
        foreach ($list as $key => $user) {
            echo $user->name;
        }

        // where
        $result = UserModel::where($condition)->select();
        $result = UserModel::where("name", "小明")->select();
        // where in
        $result = UserModel::whereIn("id", [])->select();

        // or where
        $result = UserModel::query()
            ->where(function ($query) use ($condition) {
                $query->where($condition)->whereOr(['user_id' => 0]);
            })
            ->select();
        // 获取某列

        // 其他操作 排序 分页等
        $result = UserModel::where($condition)->order("id desc")->limit(10)->select();


        // sql
        $sql = "SELECT * FROM user WHERE id = ?";
        $res = Db::execute($sql, [1]);

        return success($result);
    }

    /**
     * 一对一
     */
    public function hasOne()
    {

    }

    /**
     * 一对多
     */
    public function hasMany()
    {
        (new UserModel)
            ->with(["links" => function ($query) {
                $query->where('status', 0)->order(['no' => 'asc', 'id' => 'desc']);
            }])
            ->select()
            ->visible(['links' => ['link', 'name', 'blank'], 'id', 'name', 'category_id', 'star', 'color']);
    }

    /**
     * 多对多
     */
    public function belongToMany()
    {

    }
}
