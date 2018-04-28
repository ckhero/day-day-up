<?php
class verifyCode
{
	public $height = 50;
	public $width = 100;
    public $str = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
    public $fontPath = './font/FZSTK.ttf';
    public $pixel = 300;
    public $lineNum = 5;

    /**
     * [index description]
     * #Author ckhero
     * #DateTime 2018-01-30
     * @api            {get}          /user/:id name
     * @apiVersion     0.3.0
     * @apiName        apiName
     * @apiGroup       apiGroup
     * @apiPermission  none
     * @apiDescription apiDescription
     * @apiParam       {type}         name      desc.
     * @apiSuccess     {Number}                               id            The Users-ID.
     * @param          integer        $length   [description]
     * @return         [type]                   [description]
     */
    public function index($length = 4)
    {
    	
    	// echo $this->generateRandomString($length);
    	$img = imagecreatetruecolor($this->width, $this->height);
    	$black = imagecolorallocate($img, 0, 0, 0); //黑色
    	$white = imagecolorallocate($img, 255, 255, 255); //白色
    	$yellow = imagecolorallocate($img, 139,  139,  0); //黄色
    	imagefilledrectangle($img, 0, 0, $this->width, $this->height, $yellow);
        
        //加黄色的边框
    	$img2 = imagecreatetruecolor($this->width - 2, $this->height - 2);
    	imagefilledrectangle($img2, 0, 0, $this->width, $this->height, $white);
    	imagecopyresampled($img, $img2, 1, 1, 0, 0, $this->width - 2, $this->height - 2, $this->width - 2, $this->height - 2); //化一个黄色的边框

    	//输入文字
    	$str = $this->generateRandomString($length);
    	$stepWidth = ceil($this->width / $length);
    	// imagettftext($img, 35, 0, 0, 35, $yellow, $this->fontPath,'陈凯');
    	foreach($str as $key => $word)
    	{
    		//var_dump($this->fontPath, $word);
    		$color = imagecolorallocate($img, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    		imagettftext($img, 24, mt_rand(0, 80), $key * 25 + 10, 35, $color, $this->fontPath, $word);
    	}

    	//加噪点
    	for ($i = 0; $i < $this->pixel; $i++) {

    		$color = imagecolorallocate($img, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    		imagesetpixel($img, mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
    	}

    	//加干扰线条
    	
    	for ($i = 0; $i< $this->lineNum; $i++) {

    		$color = imagecolorallocate($img, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    		imageline($img, mt_rand(0, 100), mt_rand(0, 50), mt_rand(0, 100), mt_rand(0, 50), $color);
    	}


    	header('Content-Type:'.image_type_to_mime_type(IMAGETYPE_PNG));
    	imagepng($img);
    	//释放内存
    	imagedestroy($img);  
    }
    public function generateRandomString($length = 4)
    {
    	$strLen = mb_strlen($this->str) - 1;
    	$str = [];
    	for ($i =0 ; $i < $length; $i++) {

    		$str[] = $this->str[mt_rand(0, $strLen)];
    	}
    	return $str;
    }
}

$a = new verifyCode();
$a->index(4);
