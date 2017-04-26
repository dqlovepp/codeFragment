<?php
namespace Home\Model;
use Think\Model;
class OrderModel extends Model {
  protected $_validate = array(
    );   
  /***
member_id,addtime,shr_name,shr_province,shr_city
  ***/
protected function _before_insert(&$data,$options) {

}
    // 插入成功后的回调方法
protected function _after_insert($data,$options) {
  //将商品与订单对应的编号添加到fm_order_goods中
  $cartModel = D('Cart');
  $buyNow=I('buyNow',0);
  if(!empty(session('goods')))
  {
        $goodsData = $cartModel->getSessionGoods(); //代表立即购买
  }
  else
  {
        $goodsData = $cartModel->getGoodsList();
  }

  //添加到数据库中
  $orderGoodsModel=M("order_goods");

  foreach ($goodsData as  $value) {
    $orderGoodsdata=array();
    $orderGoodsdata["order_id"]=$data['id'];
    $orderGoodsdata["member_id"]=session('fm_user_id');
    $orderGoodsdata["price"]=$value['goods']['goods_price'];
    $orderGoodsdata["goods_number"]=$value['amount'];
    $orderGoodsdata["goods_id"]=$value['goods_id'];
    $orderGoodsdata["goods_size"]=$value['goods_size'];
   // var_dump($goodsData);
    $orderGoodsModel->add($orderGoodsdata);
  } 
}
public function noticePost($id){
    return $this->where('id='.$id.' AND noticeTimes<128')->setInc('noticeTimes');
  }
}