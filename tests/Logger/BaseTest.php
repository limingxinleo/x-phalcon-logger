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
        $date = date('Ymd');
        $logger = $this->factory->getLogger('info'); // new 1

        $logger->info('info');
        $this->assertTrue(is_dir(LOG_PATH . '/' . $date));
        $logs = $this->getLines(LOG_PATH . '/' . $date . '/info.log');
        $this->assertEquals(1, count($logs));


        $logger = $this->factory->getLogger('error'); // new 2
        $logger->error('error');
        $logger->info('error');
        $logs = $this->getLines(LOG_PATH . '/' . $date . '/error.log');
        $this->assertEquals(2, count($logs));
    }


    public function testContext()
    {
        $context = [
            'dir' => 'test'
        ];
        $logger = $this->factory->getLogger('error', Sys::LOG_ADAPTER_FILE, $context); // new 3
        $logger->info('自定义文件夹');

        $this->assertTrue(is_dir(LOG_PATH . '/test'));
        $logs = $this->getLines(LOG_PATH . '/test/error.log');
        $this->assertEquals(1, count($logs));
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