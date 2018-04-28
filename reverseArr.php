<?php 
/**
 * [reverseArr 反转数组]
 * #Author ckhero
 * #DateTime 2018-03-14
 * @param  [type] $arr [description]
 * @return [type]      [description]
 */
function reverseArr($arr)
{
	$i = 0;
	$j = count($arr) - 1;
	while($i < $j) {

		$tmp = $arr[$i];
		$arr[$i++] = $arr[$j];
		$arr[$j--] = $tmp;
	}
	return $arr;
}

var_dump(reverseArr([1,2,3,4,5,6,7,8,9]));