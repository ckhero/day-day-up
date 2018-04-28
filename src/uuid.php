<?php
function uuid($prefix = null):string
{

   $str = md5(uniqid(mt_rand(), true));
   return substr($str, 0, 8).'-'.
          substr($str, 8, 4).'-'.
          substr($str, 12, 4).'-'.
          substr($str, 16, 4).'-'.
          substr($str, 20, 12);
}