<?php
namespace Home\Model;
use Think\Model;

class CartModel extends Model 
{
	var $mid;
	public function __construct()
	{
		parent::__construct();
		$this->mid = (int)session('fm_user_id');
	}

	public function addToCart()
	{
		// 先把属性的ID转化成属性的字符串
		
	}
	public function clear()
	{
		if($this->mid)
		{
			$this->where('member_id='.$this->mid)->delete();
		}
		else 
		{
			setcookie('cart', '', 1, '/', '.findme.wang');		
		}
		session('goods',null);
	}
	// $gn=0代码删除这件商品,否则设置商品数量
	/***
	gid 商品编号
	size 商品尺寸
	gn 设置商品购买数量
	***/
	public function updateGN($gid, $size, $gn)
	{
		if($this->mid)
		{
			if($gn == 0)
				$this->where('member_id='.$this->mid.' AND goods_id='.$gid.' AND goods_size="'.$size.'"')->delete();
			else 
				$this->where('member_id='.$this->mid.' AND goods_id='.$gid.' AND goods_size="'.$size.'"')->setField('amount', $gn);
		}
		else 
		{
			// 先取出购物车的数组
			$cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
			// 拼出这件商品对应数组中的下标
			$key = $gid.'-'.$size;
			if($gn == 0)
				unset($cart[$key]);
			else 
				$cart[$key][0] = $gn;
			// 把修改之后的数组存回到cookie中
			$aMonth = 30 * 24 * 3600;
			setcookie('cart', serialize($cart), time() + $aMonth, '/', '.findme.wang');
		}
	}
	//取出购物车中的商品
	public function getGoodsList()
	{
		$goods = array();
		$goodsModel = D('Goods');
		//1. 先取出购物车中的数据
		$goodsCategory=M('goods_category');
		if($this->mid) //登录的状态
		{
			$data = $this->where('member_id='.$this->mid)->select();
			// 循环购物车中的每一件商品，取出商品的LOGO,名称，和会员价格
			if(!empty($data))
			{		
				foreach ($data as $k => $v)
				{
					// 计算会员价格
					//$price = $goodsModel->computeML($v['goods_id']);
					// 商品信息
					$tempGoods=$goodsModel->find($v['goods_id']);  //获取商品信息
         			$tempGoods['catalog']=$goodsCategory->where('category_id='.$tempGoods['goods_category_id'])->getField('navigation_id');					
					$v['goods']=$tempGoods;
					$goods[] = $v;			
				}
			}			
		}
		else //没有登录的状态
		{
			// 先取出购物车的数组
			$data = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
			// 循环购物车中的每一件商品，取出商品的LOGO,名称，和会员价格

			foreach ($data as $k => $v)
			{
				// 从数组中键中获取商品ID和属性的ID
				$_attr = explode('-', $k);
				// 计算会员价格
				//$price = $goodsModel->computeML($_attr[0]);
				$orderData=array();
				$orderData['goods_size']=$_attr[1];
				$orderData['amount']=$v[0];
				$orderData['userheight']=$v[1];
				$orderData['userweight']=$v[2];
				$tempGoods=$goodsModel->find($_attr[0]);  //获取商品信息
         		$tempGoods['catalog']=$goodsCategory->where('category_id='.$tempGoods['goods_category_id'])->getField('navigation_id');

				$orderData['goods']=$tempGoods;
				$goods[] =$orderData;
			}
		}
		return $goods;
	}
	public function moveDataFromCookieToDb()
	{
		if(session('fm_user_id'))
		{
			$data = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();
			foreach ($data as $k => $v)
			{
				$_k = explode('-', $k);
				$this->add(array(
					'goods_id' => $_k[0],
					'member_id' => session('fm_user_id'),
					'goods_size'=>$_k[1],
					'userweight'=>$v[2],
					'userheight'=>$v[1],
					'amount'=>$v[0]
				));
			}
			// 清空购物车
			setcookie('cart', '', 1, '/', '.findme.wang');
		}
	}
	public function getSessionGoods()
	{
		//获取session中的商品
		$goodsModel=D("goods");
		$goodsinfo=session('goods');
		$goodsinfo['goods']=$goodsModel->find($goodsinfo['goods_id']);

		$alldata=array();
		$alldata[]=$goodsinfo;

		return $alldata;
	}
}





