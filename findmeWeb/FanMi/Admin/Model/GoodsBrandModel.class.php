<?php
/***
author:lidequan
data:2015-01-12
***/
namespace Admin\Model;
use Think\Model;

class GoodsBrandModel extends Model{
	
	public function getGoodsBrand($brands=null){
		if($brands==null)
		{
			return $this->select();
		}
		else
		{
			return $this->find($brands);
		}
	}
}
