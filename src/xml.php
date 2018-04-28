<?php
function xml_decode($str) {

    return simplexml_load_string($str, 'SimpleXMLElement', LIBXML_NOCDATA);
}

//xml生成与解析
function xml_encode($data, $root = 'xml', $attr = []) {

    $_attr = [];
    foreach ($attr as $key => $val) {

        $_attr[] = $key.'="'.$val.'"';
    }
    $attrs = implode($_attr, ' ');
    $attrs = trim($attrs);
    $attrs = empty($attrs)? '': " {$attrs}";
    $xml = '<?xml version="1.0"'.$attrs.'?>';
    $xml .= "<{$root}>";
    $xml .= data_to_xml($data);
    $xml .= "</{$root}>";
    return $xml;
}

function data_to_xml($data) {
     
     $xml = '';
    foreach ($data as $key=> $val) {

       is_numeric($key) && $key = "item id = \"$key\"";
       $xml .= "<$key>";
       $xml .= (is_array($val) || is_object($val))? data_to_xml($val): xmlSafeStr($val);
       list($key, ) = explode(' ', $key);
       $xml .= "</$key>";
    }
    return $xml;
}

function xmlSafeStr($str)
{
    return '<![CDATA['.preg_replace("/[\\x00-\\x08\\x0b-\\x0c\\x0e-\\x1f]/",'',$str).']]>';
}
