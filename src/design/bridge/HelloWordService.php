<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午3:09
 */

namespace src\design\bridge;


class HelloWordService extends Service
{
    public function get($data)
    {
        // TODO: Implement get() method.
        return $this->implementation->format($data);
    }
}