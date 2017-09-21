# X-Phalcon-Logger

## 安装
~~~
composer require limingxinleo/x-phalcon-logger
~~~

## 使用
~~~php
<?php

use Xin\Phalcon\Logger\Factory;
use Phalcon\Config;
use Phalcon\Logger\Formatter\Line;
use Xin\Phalcon\Logger\Sys;

// 初始化工厂
$config = new Config([
    'application' => [
        'logDir' => __DIR__ . '/../logs/',
    ],
]);

$factory = new Factory($config);

$context = [
    'dir' => 'test' // 如果不设置子目录，则根据日期分目录
];

// 获取单例日志实例
$logger = $factory->getLogger('info', Sys::LOG_ADAPTER_FILE, $context);
// 设置格式化
$formatter = new Line("[%date%][%type%] %message%", "Y-m-d H:i:s");
$logger->setFormatter($formatter);

// 写入日志
$logger->info('日志数据');
~~~