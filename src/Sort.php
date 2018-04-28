<?php
namespace Src;

class Sort
{
	/**
	 * [quickSort 简单来说就是每次都把比基准值大的放右边 小的放左边 O(nlogn)]
	 * #Author ckhero
	 * #DateTime 2018-01-31
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function quickSort($data)
	{
		$len = count($data);
		if ($len > 1) {
			$tmp = $data[0];
			$x = [];
			$y = [];
			for ($i = 1; $i < $len; $i++){
				if ($data[$i] < $tmp) {
					$x[] = $data[$i];
				} else {
					$y[] = $data[$i];
				}
			}
			$x = self::quickSort($x);
			$y = self::quickSort($y);
			$data = array_merge($x, [$tmp], $y);
		}
		return $data;
	}

	/**
	 * [bubbleSort 它重复地走访过要排序的数列，一次比较两个元素，如果他们的顺序错误就把他们交换过来。走访数列的工作是重复地进行直到没有再需要交换，也就是说该数列已经排序完成。O(n方)
	 * 比较相邻的元素。如果第一个比第二个大，就交换他们两个。
对每一对相邻元素作同样的工作，从开始第一对到结尾的最后一对。在这一点，最后的元素应该会是最大的数。
针对所有的元素重复以上的步骤，除了最后一个。
持续每次对越来越少的元素重复上面的步骤，直到没有任何一对数字需要比较
	 * ]
	 * #Author ckhero
	 * #DateTime 2018-01-31
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function bubbleSort($data)
	{
		$len = count($data);
		for ($i = 0; $i < $len; $i ++) {
			for($j = 0; $j < $len - 1 - $i; $j ++) {
				if ($data[$j] > $data[$j + 1]) {
					$tmp = $data[$j + 1];
					$data[$j + 1] = $data[$j];
					$data[$j] = $tmp;
				}
			}
		}
		return $data;
	}

	/**
	 * [insertSort 一般来说，插入排序都采用in-place在数组上实现。具体算法描述如下：
⒈ 从第一个元素开始，该元素可以认为已经被排序
⒉ 取出下一个元素，在已经排序的元素序列中从后向前扫描
⒊ 如果该元素（已排序）大于新元素，将该元素移到下一位置
⒋ 重复步骤3，直到找到已排序的元素小于或者等于新元素的位置
⒌ 将新元素插入到下一位置中
⒍ 重复步骤2~5]
	 * #Author ckhero
	 * #DateTime 2018-01-31
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public static function insertSort($data)
	{
		$len = count($data);
		for($i = 0; $i < $len - 1; $i ++) {
			$tmp  = $data[$i];
			for($j = $i -1; $j >= 0; $j --) {
				if ($data[$j] > $tmp) {
					$data[$j + 1] = $data[$j];
					$data[$j] = $tmp;
				} else {
					break;
				}
			}
		}
		return $data;
	}

	/**
	 * [merge2SortArray 合并两个排好序的数组]
	 * #Author ckhero
	 * #DateTime 2018-03-13
	 * @param  array  $a [description]
	 * @param  array  $b [description]
	 * @return [type]    [description]
	 */
	function merge2SortArray($a = [], $b = []) {
		$aNum = count($a);
		$bNum = count($b);
		$int = [];
		$i = 0;
		$j = 0;
		while($i < $aNum && $j < $bNum) {

			$int[] = ($a[$i]?? 0) < ($b[$j]?? 0)? $a[$i++]: $b[$j++];
		}

		while ($i < $aNum) {
			$int[] = $a[$i++];
		}
		while ($j < $bNum) {
			$int[] = $b[$j++];
		}
		return $int;
	}
}

$str = [342,3,2,341,12,1];
var_dump(Sort::quickSort($str));
var_dump(Sort::bubbleSort($str));
var_dump(Sort::insertSort($str));