<?php 

/**
 * 两个有序 int数组求相同元素个数 最优算法
 * 思路。利用有序int这概念
 */

function findSame($a, $b) 
{
	$aNum = count($a);
	$bNum = count($b);
	$i = $j = 0;
	while($i < $aNum && $j < $bNum) {
		if ($a[$i] == $b[$j]) {
			$res[] = $a[$i];
			$i++;
			$j++;
		} else if ($a[$i] < $b[$j]) {
			$i++;
		} else if ($a[$i] >$b[$j]) {
			$j++;
		}
	}
	return array_unique($res);
}

$a = [1,2,4,5,5,6];
$b = [1,2,4,5,5,6,8];
var_dump(findSame($a, $b));


/**
 * 打乱数组
 */
function shuffle2($arr)
{
	$num = count($arr);
	for ($i = 0; $i < $num; $i++) {
		$key = rand(0, $num - 1);
		if ($arr[$key] != $arr[$i]) {
			$tmp = $arr[$i];
			$arr[$i] = $arr[$key];
			$arr[$key] = $tmp;
		}
	}
	return $arr;

}
var_dump(shuffle2([1,2,3,4,5,6,7]));


/**
 * 给一个有数字和字母的字符串，让连着的数字和字母对应#
 * '1a3bb44a2ac'
 */
function cutStr($str) {
	$numbers = preg_split('/[a-zA-Z]+/', $str, 0, PREG_SPLIT_NO_EMPTY);
	$alpabets = preg_split('/\d+/', $str, 0, PREG_SPLIT_NO_EMPTY);
	$num = count($numbers);
	$i = 0;
	$strRes = '';
	while($i < $num) {
		$strRes .= $numbers[$i].":".($alpabets[$i]?? null).";";
		$i++;
	}
	return $strRes;
}
var_dump(cutStr('ck1a3bb44a2ac3'));




/**
 * 求n以内的质数（质数的定义：在大于1的自然数中，除了1和它本身意外，无法被其他自然数整除的数）#
思路： 1.（质数筛选定理）n不能够被不大于根号n的任何质数整除，则n是一个质数
2.除了2的偶数都不是质数
 */

function findPrime($n)
{
	$prime = [2];
	for ($i= 3; $i <= $n; $i += 2) { //偶数肯定不是基数
		$sqrt  = intval(sqrt($i));
		for ($j = 3; $j <= $sqrt; $j += 2) {
			
			if ($i % $j == 0) {
				break;
			} 
		}
		if ($j > $sqrt) {
			$prime[] = $i;
		}
		
	}
	return $prime;
}
var_dump(findPrime(100));






/**
 * [yuesefu 相关题目：一群猴子排成一圈，按1,2,…,n依次编号。然后从第1只开始数，数到第m只,把它踢出圈，从它后面再开始数， 再数到第m只，在把它踢出去…，如此不停的进行下去， 直到最后只剩下一只猴子为止，那只猴子就叫做大王。要求编程模拟此过程，输入m、n, 输出最后那个大王的编号。]
 * #Author ckhero
 * #DateTime 2018-03-14
 * @param  [type] $m [description]
 * @param  [type] $n [description]
 * @return [type]    [description]
 */
function yuesefu($m, $n)
{	
	$arr = range(1, $n);
	$i = 0;
	while(count($arr) > 1) {
		$i ++;
		$survice = array_shift($arr);
		if ($i % $m != 0) {
			$arr[] = $survice;
		}
	}
	return $arr;
}
var_dump(yuesefu(7, 100));



/**
 * 如何快速寻找一个数组里最小的1000个数
 * 思路：假设最前面的1000个数为最小的，算出这1000个数中最大的数，然后和第1001个数比较，如果这最大的数比这第1001个数小的话跳过，如果要比这第1001个数大则将两个数交换位置，并算出新的1000个数里面的最大数，再和下一个数比较，以此类推。
 */

function getMinArray($arr, $n)
{
	$num = count($arr);
	$minArr = array_slice($arr, 0, $n);
	//return getMaxPos($minArr);
	for ($i= $n; $i < $num; $i++) {
		if ($i == $n) {
			$maxPos = getMaxPos($minArr);
		}
		if ($minArr[$maxPos] > $arr[$i]) {
			$tmp = $minArr[$maxPos];
			$minArr[$maxPos] = $arr[$i];
			$maxPos = getMaxPos($minArr);
			// $arr[$i] = $tmp;
		}
	}
	return $minArr;
}
function getMaxPos($arr)
{
	$pos = 0;
	$num = count($arr);
	for ($i =0; $i < $num; $i ++) {
		if ($arr[$i] > $arr[$pos]) {
			$pos = $i;
		}
	}
	return $pos;
}
$arr = [1, 100, 20, 222, 33, 44, 55, 66, 23, 79, 18, 20, 11, 9, 129, 399, 145, 2469, 58];
var_dump(getMinArray($arr, 7));







/**
 * 给定一个有序整数序列，找出绝对值最小的元素#
 * 关键点有序
 */

function getMinAbsValue($arr)
{	
	$num = count($arr) - 1;
	if ($arr[0] * $arr[$num] > 0) {
		return $arr[0] > 0? $arr[0]: $arr[$num];
	}
	$start = 0;
	$end = $num;
	while($start <= $end) {
		if ($start += 1 == $end) {
			return abs($arr[$start]) > abs($arr[$end])? $arr[$end]: $arr[$start]; 
		}
		$mid = floor(($start + $end) / 2);
		if ($arr[$mid] < 0) {
			$start = $mid + 1;
		} else {
			$end = $mid - 1;
		}
	}
}
var_dump(getMinAbsValue([-9,-8,-6,-1,3,45]));


/**
 * 两个文件相对位置
 */
$a = "/x/y/m/a.txt";
$b = "/x/y/n/b.tx";

function findPos($a, $b)
{
	$aArr = explode('/', $a);
	$bArr = explode('/', $b);
	$diff1 = array_diff($aArr, $bArr);
	$diff2 = array_diff($bArr, $aArr);
	$str = '';
    array_pop($diff1);
	foreach ($diff1 as $val) {
		$str .= "../";
	}
	return $str.implode('/', $diff2);
}
var_dump(findPos($a, $b));