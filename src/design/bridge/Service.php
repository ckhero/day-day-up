<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午3:06
 */

namespace src\design\bridge;


abstract class Service
{
    protected $implementation;

    public function setImplementation(FormatInterface $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get($data);
}