<?php
//aaaa
function emoji_encode($str) 
{

    return json_encode($str);  //暴露 emoji的unicode
}

function emoji_decode($str)
{
   
    $tmpStr = preg_replace("#(\\\ue[0-9a-f]{3})#i",'','"\u7626\u7403\u7403\ud83c\udf38"'); //将emoji的unicode留下，其他不动
    return json_decode($tmpStr);
}