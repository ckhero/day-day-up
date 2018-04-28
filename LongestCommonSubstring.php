<?php 

//求字符串的大回文，也就是最长公共子串的问题LCS（LongestCommonSubstring）

function getLCS($str) {
	$strrev = strrev($str);
	$len = strlen($str);
	$data = [];
	for($i = 0; $i< $len; $i++) {
		for($j = 0; $j < $len; $j++) {
			$data[$i][$j] = null;
		}
	}

	for ($i = 1; $i <= $len; $i++) {
		for($j = 1; $j <= $len; $j++) {
			if($str[$i - 1] === $strrev[$j - 1]) {
				//$data[$i][$j] = $data[$i-1][$j-1] + 1;
				$data[$i][$j] = $data[$i-1][$j-1] . $str[$i - 1];
				$resStr[] = $data[$i][$j];
				$resLen[] = strlen($data[$i][$j]);
			} else if($data[$i - 1][$j] > $data[$i][$j - 1]) {
				$data[$i][$j] = null;
			} else {
				$data[$i][$j] = null;
			}
		}
	}
	$maxLen = max($resLen);
	foreach($resLen as $k => $v) {
		if ($v == $maxLen) {
			$resArr[] = $resStr[$k];
		}
	}
	return $resArr; //得到的是最长回文的数组
}

// $str = 'elgoo3o32eg1o2oge';
// $str2 = 'elgo32ego2oge';
// var_dump(getLCS($str));

function bigWordLayBack($str)
{ //用冒泡排序实现的
	$len = strlen($str);

	for($i = 0; $i < $len; $i ++) {

		for($j = $i; $j < $len; $j ++) {

			if (ord($str[$i]) > 64 && ord($str[$i]) < 91) {
				//if (ord($str[$j]) > 96 && ord($str[$j]) < 123) {
				if (ord($str[$j]) < 65 || ord($str[$j]) > 90) {
					$tmp = $str[$i];
					$str[$i] = $str[$j];
					$str[$j] = $tmp;
					// break;
				}
			}
		}
	}
	return $str;
}
$str = 'ECB231dfasdf213123A4123';
var_dump(bigWordLayBack($str));