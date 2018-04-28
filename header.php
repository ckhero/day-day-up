<?php

//进行页面跳转；location和：之间不能有空格，会出错
//•在用header前不能有任何的输出（注释：这点大家都知道的，如果header之前有任何的输出，包括空白，就会出现header already sent by xxx的错误）；
//header 后面的东西还会执行的；//所以一般要exit();
header('Location:'.$url);
//exit();

//设置文件类型和网页编码
header('Content-Type:text/html;charset=utf-8');

//使用header返回response 状态码       header('HTTP/1.1 404 Not Found');
header(sprintf('%s %d %s', $http_version, $status_code, $description));

//使用header在某个时间后执行跳转
header("Refresh: {$delay}; url={$url}");


//使用header控制浏览器缓存  etag?
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");


//执行http验证
//$_SERVER['PHP_AUTH_USER']    $_SERVER['PHP_AUTH_PW']
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="Top Secret"');

//下载文件
header('Content-Type: application/octet-stream');//设置内容类型
header('Content-Disposition: attachment; filename="example.zip"'); //设置MIME用户作为附件下载 如果将attachment换成inline意思为在线打开
header('Content-Transfer-Encoding: binary');//设置传输方式
header('Content-Length: '.filesize('example.zip'));//设置内容长度
// load the file to send:
readfile('example.zip');//读取需要下载的文件