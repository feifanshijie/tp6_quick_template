<?php

namespace app\logic;
use app\model\WebsiteCategory;

class CategoryLogic
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
}
