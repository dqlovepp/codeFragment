<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model {
	// 计算会员价格
	public function computeML($gid)
	{
		if(session('fm_user_id'))
		{
			// 取出当前会员的级别ID
			$level_id = session('level_id');
			$rate = session('rate');
		}
		else 
		{
			$level_id = 0;
			$rate = 1;
		}
		// 如果商品设置了会员价格就用会员价格
		// 如果没有设置就用本店价格乘上这个会员级别的折扣率
		$mpModel = M('MemberPrice');
		$mp = $mpModel->where('goods_id='.$gid.' AND level_id='.$level_id)->find();
		if($mp)
			return $mp['price'];
		else 
		{
			// 如果没有会员价格就用本店从乘折扣率
			$this->field('shop_price')->where('id='.$gid)->find();
			return $this->shop_price * $rate;
		}
	}
}