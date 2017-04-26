<?php
/***
*author:lidequan
*date:2015-3-30
*function：订单管理模型
****/
namespace Admin\Model;
use Think\Model;

class OrderModel extends Model
{
	//获取待发货的订单
	//已经付款过的商品
	public function unPostGoodst()
	{
		return $this->where('pay_status=1 AND post_status=0')->select();
	}
	//获取所有订单信息
	public function allorders()
	{
		return $this->select();
	}
}
