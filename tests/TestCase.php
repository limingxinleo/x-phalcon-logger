<?php
// +----------------------------------------------------------------------
// | TestCase.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests;

use PHPUnit\Framework\TestCase as UnitTestCase;
use Xin\Phalcon\Logger\Factory;
use Phalcon\Config;

class TestCase extends UnitTestCase
{
    public $factory;

    public function setUp()
    {
        $config = new Config([
            'application' => [
                'logDir' => __DIR__ . '/../logs/',
            ],
        ]);
        $this->factory = new Factory($config);
    }
}