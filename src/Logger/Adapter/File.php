<?php
// +----------------------------------------------------------------------
// | File.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Phalcon\Logger\Adapter;

use Phalcon\Logger\Adapter\File as FileLogger;
use Psr\Log\LoggerInterface;
use Xin\Phalcon\Logger\Utils\LevelMapper;

class File extends FileLogger implements LoggerInterface
{
    public function log($type, $message = null, array $context = null)
    {
        $type = LevelMapper::getInstance()->getLevel($type);
        parent::log($type, $message, $context);
    }
}