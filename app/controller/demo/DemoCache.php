<?php

namespace app\controller\demo;

use app\base\BaseController;
use think\facade\Cache;

/**
 * 缓存操作相关示例
 */
class DemoCache extends BaseController
{
    private $cacheKey = "age";

    // 获取
    public function get()
    {
        Cache::get($this->cacheKey);
    }

    // 设置
    public function set()
    {
        Cache::set($this->cacheKey, 18, 10);
    }

    // 自增
    public function inc()
    {
        Cache::inc($this->cacheKey);
//        Cache::inc($this->cacheKey, 2);
    }

    // 自减
    public function dec()
    {
        Cache::dec($this->cacheKey);
//        Cache::dec($this->cacheKey, 2);
    }

    // 删除一个
    public function delete()
    {
        Cache::delete($this->cacheKey);
    }

    // 获取并删除
    public function pull()
    {
        Cache::delete($this->cacheKey);
    }

    // 清空缓存
    public function clear()
    {
        Cache::clear();
    }

    public function tag()
    {
        Cache::tag('tag')->set('name1','value1');
        Cache::tag('tag')->set('name2','value2');
        // 清除tag标签的缓存数据
        Cache::tag('tag')->clear();

        Cache::tag(['tag1', 'tag2'])->set('name1', 'value1');
        Cache::tag(['tag1', 'tag2'])->set('name2', 'value2');

        // 可以追加某个缓存标识到标签
        Cache::tag('tag')->append('name3');

        // 获取标签的缓存标识列表
        Cache::getTagItems('tag');

        // 使用文件缓存
        Cache::set('name','value',3600);
        Cache::get('name');

        // 使用Redis缓存
        Cache::store('redis')->set('name','value',3600);
        Cache::store('redis')->get('name');

        // 切换到文件缓存
        Cache::store('default')->set('name','value',3600);
        Cache::store('default')->get('name');
    }
}
