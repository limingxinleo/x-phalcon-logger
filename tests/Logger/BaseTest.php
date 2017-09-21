<?php
// +----------------------------------------------------------------------
// | BaseTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Cli;

use Phalcon\Logger\Formatter\Line;
use Tests\TestCase;
use Xin\Phalcon\Logger\Factory;
use Xin\Phalcon\Logger\Sys;

class BaseTest extends TestCase
{
    public function testSimple()
    {
        $logger = $this->factory->getLogger('info'); // new 1
        $logger->info('info');
        $logger = $this->factory->getLogger('error'); // new 2
        $logger->error('error');
        $logger->info('error');
    }


    public function testContext()
    {
        $context = [
            'dir' => 'test'
        ];
        $logger = $this->factory->getLogger('error', Sys::LOG_ADAPTER_FILE, $context); // new 3
        $logger->info('自定义文件夹');
    }

    public function testFormatter()
    {
        $context = [
            'dir' => 'test'
        ];
        $logger = $this->factory->getLogger('error', Sys::LOG_ADAPTER_FILE, $context); // old 3
        $formatter = new Line("[%date%][%type%] %message%", "Y-m-d H:i:s");
        $logger->setFormatter($formatter);

        $logger->info('自定义文件夹');
    }

    public function testCount()
    {
        $this->assertTrue(3 === Factory::count());
    }
}