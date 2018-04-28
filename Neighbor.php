<?php 

/**
 * 计算数组的某个元素的前后两个元素
 */

class Neighbor
{
	public $curr;
	public $data;
	public $count;

	public function setData($data = [])
	{
		$this->data = $data;
		$this->count = count($data);
	}

	public function setCurrentKey($key)
	{
		return $this->curr = $key;
	}
	public function setCurrent()
	{
		reset($this->data);
		
		for($i = 0; $i < $this->count; $i++) {
			if ($this->curr == key($this->data)) {
				break;
			}
			next($this->data);
		}
	}

	public function getCurrent()
	{
		
		$this->setCurrent();
	    return key($this->data);//返回键
		return current($this->data); //返回值
	}

	public function getPrev()
	{
		$this->setCurrent();
		prev($this->data);
		return key($this->data); //返回键
		return prev($this->data); //返回值
	} 

	public function getNext()
	{
		$this->setCurrent();
		next($this->data);
		return key($this->data); //返回键
		return next($this->data); //返回值
	} 
}