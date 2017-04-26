<?php
namespace Home\Controller;
use Think\Controller;
class HeaderController extends Controller {
  
    public function index(){
    	$curNavType=array(1,2,3);
    	$cateType=I('get.navType',1);
    	if( ! in_array($cateType, $curNavType))
    	{
    		$cateType=1;
    	}
    	$navigation=new \Home\Model\NavigationModel();
    	$navinfo=$navigation->getAllNav($cateType);
        $navWidth=0;
        foreach ($navinfo as  $value) {
            $navWidth+=$value['width'];
        }
        //$cart = new \User\Controller\CartController();
       // $methord=get_class_methods(get_class($cart)); 
        $ajaxcar=$this->cartInfo(0);
        $this->assign('ajaxcar',$ajaxcar);
        $this->assign('navWidth',$navWidth);
    	$this->assign('navinfo',$navinfo);
    }

    /***
    *$returnType 返回类型 0：代表返回变量类型；1：代表返回json类型
    ***/
    public function cartInfo($returnType=1){
       layout(false); // 临时关闭当前模板的布局功能
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
      $content = $this->fetch('Cart/ajaxcar');
      layout(true);
      if($returnType==0)
      {
        return $content;
      }
      else
      {
        $this->ajaxReturn(array('content'=>$content));
      }    
    }
}