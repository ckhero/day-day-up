<?php
/**
 * Created by PhpStorm.
 * User: ckhero
 * Date: 2018/6/11
 * Time: 下午3:03
 */

namespace src\design\bridge;


class JsonFormat extends FormatInterface
{
    public function format(array $data)
    {
        //parent::format($data); // TODO: Change the autogenerated stub
        return json_encode($data);
    }
}