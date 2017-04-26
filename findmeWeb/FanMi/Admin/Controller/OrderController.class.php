<?php
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class OrderController extends APPAdminController
{

	public function orderList(){
		$orderModel=D('order');
		$orders=$orderModel->allorders();

		$this->assign("orders",$orders);
		$this->display();
	}

	//待发货订单
	public function notPost()
	{
		$orderModel=D('order');
		$orders=$orderModel->unPostGoodst();

		$this->assign("orders",$orders);
		$this->display();
	}
	//等待支付的订单
	public function notPay()
	{
		$orderModel=D('order');
		$orders=$orderModel->unPayOrder();

		$this->assign("orders",$orders);
		$this->display();
	}
	//获取待确认的订单
	public function notSure()
	{
		$orderModel=D('order');
		$orders=$orderModel->notSureOrder();

		$this->assign("orders",$orders);
		$this->display();
	}
	//已经完成的订单
	public function haveSure()
	{
		$orderModel=D('order');
		$orders=$orderModel->SureOrder();

		$this->assign("orders",$orders);
		$this->display();
	}
	//退货订单
	public function returnGoods()
	{
		$orderModel=D('order');
		$orders=$orderModel->returnOrder();

		$this->assign("orders",$orders);
		$this->display();
	}
	//订单详情
	public function orderinfo()
	{
		$orderid=I('orderid');
		if(empty($orderid) || !is_numeric($orderid))
		{
			$this->error('非法操作');
		}
		else
		{
			$orderModel=D('order');
			$order=$orderModel->find($orderid);
			if(empty($order))
			{
				$this->error('你查找的订单不存在');
			}
			else
			{
				//获取会员信息
				$memberModel=D('user');
				$member=$memberModel->find($order['member_id']);

				//由订单号获取商品信息以及商品号
				$orderGoodsModel=D('orderGoods');
				$orderGoods=$orderGoodsModel->where('order_id='.$orderid)->select();
				if(empty($orderGoods) || empty($member))
				{
					$orderModel->delete($orderid);
					$this->error('你查找的订单不存在');
				}
				else
				{	
					$goodsModle=D('goods');
					foreach ($orderGoods as $key => $value) {
						$orderGoods[$key]['goods']=$goodsModle->find($value['goods_id']);
					}
					$this->assign("member",$member);				
					$this->assign("order",$order);
					$this->assign("orderGoods",$orderGoods);
					$this->display();
				}
			}
		}
	}
	//发货
	public function postGoods()
	{
		$orderid=I('orderid');
		if(empty($orderid) || !is_numeric($orderid))
		{
			$this->error('非法操作');
		}
		else
		{
			$orderModel=D('order');
			$order=$orderModel->find($orderid);
			if(empty($order))
			{
				$this->error('你查找的订单不存在');
			}
			else
			{
				if( empty($order['WIDinvoice_no']) || ($order['pay_status']==0 && $order['pay_method']==2))
				{
					$this->error('订单尚未支付');
				}
				else
				{
					$key = C('DES_KEY');
					$Crypt=new \Common\Crypt($key);
					$order_id=$Crypt->encrypt($orderid);
					$this->assign("orderid",$order_id);
					$this->assign("order",$order);
					$this->display();
				}
			}
		}
	}
	public function postGoodsing()
	{
		include('./PostGoods/alipayapi.php');	
	}
}