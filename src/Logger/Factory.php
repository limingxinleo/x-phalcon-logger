<?php
// +----------------------------------------------------------------------
// | Client.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Xin\Phalcon\Logger;

use Phalcon\Config;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Logger\Adapter;

class Factory implements FactoryInterface
{
    protected $config;
    protected static $instances = [];

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    private function getClient($name, $type, $context)
    {
        switch ($type) {
            case Sys::LOG_ADAPTER_FILE:
            default:
                $dir = date('Ymd');
                if (isset($context['dir'])) {
                    $dir = $context['dir'];
                }
                $dir = $this->config->application->logDir . $dir;
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                $file = $name . '.log';
                $logger = new FileLogger($dir . "/" . $file);

        }

        return $logger;
    }

    /**
     * @desc   获取单例类
     * @author limx
     * @param string $name    日志名
     * @param int    $type    日志类型 FILE...
     * @param array  $context 配置
     * @return mixed
     */
    public function getLogger($name = 'info', $type = Sys::LOG_ADAPTER_FILE, $context = [])
    {
        $config = [$name, $type, $context];
        $key = md5(json_encode($config));
        if (!isset(self::$instances[$key]) || !(self::$instances[$key] instanceof Adapter)) {
            self::$instances[$key] = $this->getClient($name, $type, $context);
        }
        return self::$instances[$key];
    }

    /**
     * @desc   返回实例数量
     * @author limx
     * @return int
     */
    public static function count()
    {
        return count(static::$instances);
    }

}