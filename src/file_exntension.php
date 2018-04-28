<?php

//获取文件扩展名 五个方法
// function getExtension($file)
// {
// 	return substr(strrchr($file, '.'), 1);
// }

// function getExtension($file)
// {
// 	return substr($file, strrpos($file, '.') + 1);
// }

// function getExtension($file)
// {
// 	return @end(explode('.', $file));
// }
// function getExtension($file)
// {
// 	return pathinfo($file, PATHINFO_EXTENSION);
// }

//{"dirname":".\/test","basename":"e61fc6c2-263e-c81e-b2fd-c181ddf142e3.jpg","extension":"jpg","filename":"e61fc6c2-263e-c81e-b2fd-c181ddf142e3"}
function getExtension($file):string
{
	return pathinfo($file)['extension'];
}