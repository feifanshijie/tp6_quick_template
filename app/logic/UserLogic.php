<?php

namespace app\logic;
use app\model\UserModel;
use app\model\WebsiteCategory;

class UserLogic
{
    public function getList($user_id)
    {
        $condition = ["user_id" => $user_id, 'status' => 0];

        $list = (new WebsiteCategory)
            ->where(function ($query) use ($condition) {
                $query->where($condition)->whereOr(['user_id' => 0]);
            })
            ->order('no', 'desc')
            ->select();

        $returnList = [];

        foreach ($list as $item) {
            $returnList[$item->id] = $item->name;
        }
        return $returnList;
    }

    private function getUserDomain($id)
    {
        $user_info = UserModel::find($id);
        if (isset($user_info->domain)) {
            return $user_info->domain;
        }
        return "";
    }
}
