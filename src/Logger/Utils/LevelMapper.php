<?php
// +----------------------------------------------------------------------
// | Mapper.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Phalcon\Logger\Utils;

use Phalcon\Logger;
use Psr\Log\LogLevel;
use Xin\Traits\Common\InstanceTrait;

class LevelMapper
{
    use InstanceTrait;

    protected $mapper = [
        LogLevel::EMERGENCY => Logger::EMERGENCY,
        LogLevel::CRITICAL => Logger::CRITICAL,
        LogLevel::ALERT => Logger::ALERT,
        LogLevel::ERROR => Logger::ERROR,
        LogLevel::WARNING => Logger::WARNING,
        LogLevel::NOTICE => Logger::NOTICE,
        LogLevel::INFO => Logger::INFO,
        LogLevel::DEBUG => Logger::DEBUG,
    ];

    public function getLevel($level)
    {
        if (is_string($level)) {
            $level = isset($this->mapper[$level]) ? $this->mapper[$level] : Logger::EMERGENCE;
        }

        return $level;
    }
}