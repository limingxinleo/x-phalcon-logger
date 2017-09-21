<?php
// +----------------------------------------------------------------------
// | FactoryInterface.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

namespace Xin\Phalcon\Logger;

interface FactoryInterface
{
    /**
     * @desc   获取Logger对象
     * @author limx
     * @param string $name    对象名
     * @param int    $type    类型
     * @param array  $context 其他参数
     * @return mixed
     */
    public function getLogger($name = 'info', $type = Sys::LOG_ADAPTER_FILE, $context = []);
}