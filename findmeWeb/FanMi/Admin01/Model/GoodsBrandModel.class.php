<?php
/***
author:lidequan
data:2015-01-12
***/
namespace Admin\Model;
use Think\Model;

class GoodsBrandModel extends Model{
	
	public function getGoodsBrand($brands){
		if($brands==null)
		{
			return $this->select();
		}
		else
		{
			
		}
	}
}
