<?php
namespace User\Controller;
use Think\Controller;

class CartController extends Controller {
 
    public function cartInfo(){
       $cartModel = new \Home\Model\CartModel();
       $goodsData = $cartModel->getGoodsList();
      //获取购物车中总钱数
       $totalPrice=0;
       if(!empty($goodsData))
       {
         foreach ($goodsData as  $value)
         {
           $totalPrice+=$value['amount']*$value['goods']['goods_price'];
         }
       }
      $this->assign('totalPrice', $totalPrice);
      $this->assign('goodsData', $goodsData);
      $content = $this->fetch('Cart/cartInfo');
      return $content;
    }
    public function cartInfo2()
    {
      echo $this->cartInfo();
    }
}