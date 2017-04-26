<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
 
    public function index(){
        /***
         $right=I('get.right','right');
         $this->assign('right',$right);
         ***/
    	 $this->display();
    }

    public function head(){
    	 $this->display('top');
    }

    public function left(){

    	 $this->display('menu');
    }

    public function right(){
         $orderModel=D('order');
         $orders=$orderModel->allorders();
         /***
        *unpost
         ***/
         $detailOrder=array('unpost'=>0,'unpay'=>0,'unsure'=>0,'success'=>0,'return'=>0);
         foreach ($orders as  $value) {
            if($value['pay_status ']==0)
            {
                $detailOrder['unpay']+=1;
            }
            else
            {
                if($value['unpost']==0)//发货状态， 0：未发货， 1：已发化 2：已收货
                {
                    $detailOrder['unpost']+=1; //未发货
                }
                else if($value['unpost']==2)
                {                  
                    //退货状态 0:不退货 1:正在退货 2:已经退货
                    if($value['return_status']==1)
                    {
                         $detailOrder['return']+=1; //已收货,
                    }
                    else
                    {
                        $detailOrder['success']+=1; //已收货,
                    }
                }
                else
                {
                    $detailOrder['unsure']+=1; //已发化,mei收货
                }
            }
         }

         $this->assign('detailOrder',$detailOrder);
    	 $this->display('main');
    }

    public function buttom(){
    	 $this->display();
    }
 
}