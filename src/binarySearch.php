<?php
/**
 * [binarySearch 递归方式]
 * #Author ckhero
 * #DateTime 2018-03-14
 * @param  [type] $target [description]
 * @param  array  $arr    [description]
 * @param  [type] $start  [description]
 * @param  [type] $end    [description]
 * @return [type]         [description]
 */
function binarySearch($target, $arr = [], $start, $end)
{
	$key = floor(($start + $end) / 2);
	// // var_dump($key);
	// // if (!isset($arr[$key])) {
	// // 	return false;
	// // }
	// var_dump($start, $end);
	if ($start > $end) {
		return false;
	}
	if ($arr[$key] < $target) {
		return binarySearch($target, $arr, $key + 1, $end);
	} else if ($arr[$key] > $target) {
		return binarySearch($target, $arr, $start, $key - 1);
	} else if ($arr[$key] == $target){
		return $key + 1;
	}
	return false;
}

$a = [1,2,4,5,6,7];
var_dump(binarySearch(	9, $a, 0, count($a) - 1));

/**
 * [binarySearch2 非递归方式]
 * #Author ckhero
 * #DateTime 2018-03-14
 * @param  [type] $target [description]
 * @param  array  $arr    [description]
 * @return [type]         [description]
 */
function binarySearch2($target, $arr = [])
{
	$start = 0;
	$end = count($arr) - 1;
	while($start <= $end) {
		
		$mid = floor(($start + $end) / 2);
		if ($arr[$mid] == $target) {
			return $mid + 1;
		} else if ($arr[$mid] > $target) {
			$end = $mid - 1;
		} else if ($arr[$mid] < $target) {
			$start = $mid + 1;
		}
	}
	return false;
}

$a = [1,2,4,5,6,7];
var_dump(binarySearch2(	9, $a));