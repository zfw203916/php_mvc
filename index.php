<?php

// 应用目录为当前目录
define('APP_PATH',__DIR__ . '/');

// 开启调试模式
define('APP_DEBUG', true);

// 加载框架文件
require(APP_PATH .'fastphp/Fastphp.php');

$config = require(APP_PATH . 'config/config.php');

// 实例化框架类
//$obj = (new Fastphp($config));//加载配置。 仔细理解__construct($config);
/*
$obj = (new Fastphp($config));//->run();
var_dump($obj);
*/
(new Fastphp($config))->run();