<?php
//normal
$step1 = microtime();
$normalMemStart = memory_get_usage();
$aa = range(1, 1000000);
foreach($aa as $key=> $val) {

	if ($key < 100) {

		//var_dump($key, $val);
	}
}
$normalMemEnd = memory_get_usage();
$step2 = microtime();
var_dump('普通方式内存消耗:', ($normalMemEnd - $normalMemStart) / 1024 / 1024);
$xRangeMemStart = memory_get_usage();
class xRange implements Iterator {

    private $start;
    private $end;
    private $step;
    private $current;
    private $key;

    public function __construct($start, $end, $step = 2) {
        $this->start = $start;
        $this->end = $end;
        $this->step = $step;
    }

    function rewind() {

        $this->current = $this->start;
        $this->key = 0;
    }

    function current() {

        return $this->current;
    }

    function key() {

        return $this->key;
    }

    function next() {

        $this->current += $this->step;
        $this->key += 1;
    }

    function valid() {

        return $this->current <= $this->end;
    }
}

$xRange = new xRange(0, 1000000);

foreach ($xRange as $key => $val) {

	if ($key < 100) {

		//var_dump('key='.$key, 'val='.$val);
	}
}
$xRangeMemEnd = memory_get_usage();
$step3 = microtime();
var_dump('迭代器方式内存消耗:', ($xRangeMemEnd - $xRangeMemStart) / 1024 / 1024);

//内存减少，消耗的时间增加

//
//
//生成器方式
//
$yieldMemStart = memory_get_usage();
$data = function ($num){

	for($i=0; $i < $num; $i++) {

		//yield $i => $i +10;//$i+10 为key
		yield $i;
	}
};


foreach($data(1000000) as $key => $val) {

// var_dump($key, $val);
}

$step4 = microtime();
$yieldMemEnd = memory_get_usage();

var_dump('迭代器方式内存消耗:', ($yieldMemEnd - $yieldMemStart) / 1024 / 1024);

var_dump('第一步',array_sum(explode(' ', $step2)) - array_sum(explode(' ', $step1)), '第二步', array_sum(explode(' ', $step3)) - array_sum(explode(' ', $step2)), '第三部', array_sum(explode(' ', $step4)) - array_sum(explode(' ', $step3)));

//生成器双向通信
function printer()
{
    while (true) {
        printf("receive: %s\n", yield);
    }
}

$printer = printer();
// {
//     while (true) {
//         printf("receive: %s\n", yield);
//     }
// }

$printer->send('hello');
$printer->send('world');

// 输出
// receive: hello
// receive: world