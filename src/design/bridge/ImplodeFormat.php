<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午3:05
 */

namespace src\design\bridge;


class ImplodeFormat extends FormatInterface
{
    public function format(array $data)
    {
        //parent::format($data); // TODO: Change the autogenerated stub
        return implode('+', $data);
    }
}