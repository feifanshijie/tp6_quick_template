<?php

use think\facade\Route;

Route::get('/', function () {
    return 'Hello, world!';
});

Route::any('/index', 'Index/index');
