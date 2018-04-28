<?php 
$dir = './img/zhaopian/';
$imgs = scandir($dir);
unset($imgs[0]);
unset($imgs[1]);
$imgs = array_values($imgs);
$width = 6750;
$height=  3870;
$img = imagecreatetruecolor($width, $height);

// header('Content-Type:'.image_type_to_mime_type(IMAGETYPE_JPEG));
// imagejpeg($img);
// imagedestroy($img);
for ($i = 0; $i < 25; $i++) {

	for ($j = 0; $j<10; $j ++) {

		$img2 = imagecreatefromjpeg($dir.$imgs[$j * 25 + $i]);
		imagecopyresampled($img, $img2, $i * 270, $j * 387, 0, 0, 270, 387, 270, 387);
	}
}
$white = imagecolorallocate($img, 255, 255, 255);
$black = imagecolorallocate($img, 0, 0, 0);
// 画一个黑色的圆
// imagearc($img, 3375, 1935, 6750, 3870, 0, 360, $white);
header('Content-Type:'.image_type_to_mime_type(IMAGETYPE_JPEG));
imagejpeg($img, './img/test.jpg');
imagedestroy($img);
header('Content-Type: application/octet-stream');//设置内容类型
header('Content-Disposition: attachment; filename="test.jpg"'); //设置MIME用户作为附件下载 如果将attachment换成inline意思为在线打开
header('Content-Transfer-Encoding: binary');//设置传输方式
header('Content-Length: '.filesize('./img/test.jpg'));//设置内容长度
readfile('./img/test.jpg');