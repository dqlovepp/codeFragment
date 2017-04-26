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
	//获取待支付的订单
	public function unPayOrder()
	{
		return $this->where('pay_status=0 AND post_status=0')->select();
	}
	//获取待确认的订单
	public function notSureOrder()
	{
		return $this->where('post_status=1')->select();
	}
	//已经完成的订单
	public function SureOrder()
	{
		return $this->where('order_status=2')->select();
	}
	//退货订单
	public function returnOrder()
	{
		return $this->where('(order_status=3 OR order_status=4) AND post_status=1')->select();
	}
}
