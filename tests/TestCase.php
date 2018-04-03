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
use Xin\Support\File;

class TestCase extends UnitTestCase
{
    /** @var  Factory factory */
    public $factory;

    public function setUp()
    {
        File::getInstance()->deleteDirectory(LOG_PATH, true);

        $config = new Config([
            'application' => [
                'logDir' => LOG_PATH . '/',
            ],
        ]);

        $this->factory = new Factory($config);
    }

    public function getLines($file)
    {
        $handle = fopen($file, "r");
        $result = [];
        while (!feof($handle)) {
            $buffer = fgets($handle, 4096);
            if (!empty(trim($buffer))) {
                $result[] = trim($buffer);
            }
        }
        fclose($handle);
        return $result;
    }
}