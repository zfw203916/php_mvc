<?php

// 应用目录为当前目录
define('APP_PATH',__DIR__ . '/');

// 开启调试模式
define('APP_DEBUG', true);

// 加载框架文件
require(APP_PATH .'fastphp/Fastphp.class.php');

// 加载配置文件
$config = require(APP_PATH . 'config/config.php');

/* 实例化框架类
*  入口文件对框架类做了两步操作：实例化，调用run()方法。
*  实例化操作接受$config参数配置，并保存到类属性中。
**/
(new Fastphp($config))->run();

//$obj = (new Fastphp($config));//加载配置。 仔细理解__construct($config);
/*
$obj = (new Fastphp($config));//->run();
var_dump($obj);
*/
