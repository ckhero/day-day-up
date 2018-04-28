<?php
$img = imagecreatefromjpeg('./img/2.jpg');
$bg = imagecolorallocatealpha($img, 191, 35, 35, 0);
// $bg = imagecolorallocatealpha($img, 255, 255, 255, 0);
$silver = imagecolorallocate($img, 192, 192, 192);

$white = imagecolorallocate($img, 255, 255, 255);
$grey = imagecolorallocate($img, 128, 128, 128);
$black = imagecolorallocate($img, 0, 0, 0);

//加文字横排
$str = "@ckhero";
$strlen = mb_strlen($str, 'utf-8');
// var_dump(imageloadfont('./simkai.ttf'));exit;
for($i =1; $i<= $strlen; $i++) {

	imagechar($img, 7, 10 * $i, 10, $str, $silver);
	$str = mb_substr($str, 1);
}

//加文字竖排
$str = "@ckhero";
$str = strrev($str);
$strlen = mb_strlen($str, 'utf-8');
for($i =1; $i<= $strlen; $i++) {

	imagecharup($img, 7, 300, 10 * $i, $str, $silver);
	$str = mb_substr($str, 1);
}
// imagefilledrectangle($img, 0, 0, 400, 400, $bg);

//写入中文
$font = './font/FZSTK.ttf';
// var_export(imageloadfont('./SIMYOU.TTF'));exit;
$text = '林忆莲2';
imagettftext($img, 12, -30, 100, 30, $black, $font, $text);


$a = imagecolorallocatealpha($img, 191, 35, 35, 100);
$b = imagecolorallocatealpha($img, 88, 191, 35, 100);
imagefilledellipse($img, 150, 150, 200, 200, $a);
imagefilledellipse($img, 200, 200, 200, 200, $b);

//二维码

// $img2 = imagecreatetruecolor(200, 200);
$weixin = imagecreatefrompng('./img/weixin.png');
//剪切部分二维码
//$weixin2 = imagecrop($weixin, ['x'=> 0, 'y'=> 0, 'width'=>250, "height"=>250]);
// $weixin2 = imagecropauto ($weixin, IMG_CROP_SIDES);


//二维码上
//imagecopy($img, $weixin, imagesx($img) - imagesx($weixin), imagesy($img) - imagesy($weixin), 0, 0, imagesx($weixin), imagesy($weixin));
//imagecopymerge($img, $weixin, imagesx($img) - imagesx($weixin), imagesy($img) - imagesy($weixin), 0, 0, imagesx($weixin), imagesy($weixin), 80);//最后一个值为透明度 0-100， 100的时候同imagecopy
// imagecopymergegray($img, $weixin, imagesx($img) - imagesx($weixin), imagesy($img) - imagesy($weixin), 0, 0, imagesx($weixin), imagesy($weixin), 80);
//imagecopyresampled() 将一幅图像中的一块正方形区域拷贝到另一个图像中，平滑地插入像素值，因此，尤其是，减小了图像的大小而仍然保持了极大的清晰度。//缩略图   图片剪切
imagecopyresampled($img, $weixin, imagesx($img) - 100, imagesy($img) - 100, 0, 0, 100, 100, imagesx($weixin), imagesy($weixin));






// imagesetstyle ($weixin, [$black, $silver]);
// imageline($weixin, 0, 0, 200, 200, $black);
// 
// 
//画虚线
$logo = imagecreatefrompng('./img/logo.png');
$xuxian = imagecreatetruecolor(200, 200);
imagefilledrectangle($xuxian, 0, 0, 200, 200, $white);
imagesetstyle($xuxian, [$black, $black,$black,$white,$white,$white,$white]);
//imageline($xuxian, 0, 0, 200, 200, $black);
imageline($xuxian, 0, 0, 200, 200, IMG_COLOR_STYLED); //虚线

$w2 = imagecolorallocate($logo, 255, 255, 255);  //表情??
imagecolortransparent($logo, $w2);
imagesetbrush($xuxian, $logo);
imageline($xuxian, 100, 0, 0, 100, IMG_COLOR_STYLEDBRUSHED);
imagecopyresampled($img, $xuxian, imagesx($img) - 300, imagesy($img) - 200, 0, 0, 200, 200, 200, 200);


imagefilter($img, IMG_FILTER_GRAYSCALE);

// $img = imagerotate($img, 180, $silver); //旋转180度
// imagesettile($img, $weixin);
// $img = imagecolortransparent($img, $silver);   //透明？？？
header('Content-type:'.image_type_to_mime_type(IMAGETYPE_PNG));
imagepng($img, './img/2_rebuild.png');


imagepng($img);
