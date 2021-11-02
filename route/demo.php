<?php

use think\facade\Route;


Route::group('demo', function () {
    // 请求方式
    Route::group('request', function () {
        Route::any('method', 'method');
        Route::get('get', 'get');
        Route::post('post', 'post');
        Route::options('options', 'options');
        Route::put('put', 'put');
        Route::delete('delete', 'delete');
        Route::patch('patch', 'patch');
    })->prefix("demo.DemoRequest/");

    // 缓存
    Route::group('cache', function () {
        Route::get('get', 'get'); // 获取
        Route::get('set', 'set'); // 设置
        Route::get('inc', 'inc');// 自增
        Route::get('dec', 'dec'); // 自减
        Route::get('delete', 'delete'); // 删除
        Route::get('pull', 'pull'); // 获取并删除
        Route::get('delete', 'delete');
    })->prefix("demo.DemoCache/");
})->prefix("demo.");