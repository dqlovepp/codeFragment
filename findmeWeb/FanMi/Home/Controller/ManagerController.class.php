<?php
namespace Home\Controller;
use \Home\Controller\APPHomeController;

class ManagerController extends APPHomeController {
  private $userinfo=null;

  function __construct(){
    parent::__construct();
    if(empty(session('fm_user_id')))
    {
        $this->assign('layoutType','Layout1');
        $this->success('请先登录',U('Home/User/login',3));
        exit();
    }
    else
    {
      $id=I('id');
      if(!empty($id) && is_numeric($id))
      {    
        $userModel=D("user");
        $this->userinfo=$userModel->find($id);
        if(empty( $this->userinfo))
        {
          $this->assign('layoutType','Layout1');
          $this->success('访问的信息不存在',U('Home/User/login',3));
        }
        else
        {
           $this->assign('layoutType','Layout1');
           $this->assign("userinfo",$this->userinfo);
        }
       
      }
      else
      {
        $this->assign('layoutType','Layout1');
        $this->success('非法操作',U('Home/User/login',3));
      }
    }
  }

  public function myfm()
  {
      //获取用户信息      
      $this->display();
  }

  public function redEnvelope()
  {
    //获取所有红包编号，获取红包，排除过期的红包         
     $user=$this->userinfo;
     $userEnModel=D("user_envelope");
     $envelopeids=$userEnModel->where("userid={$user['user_id']}")->select();
     $useEnvelope=array(); //可以使用的红包
     $unUseEnvelope=array(); //不可以使用的红包
     if(!empty($envelopeids))
     {
      $envelopeModel=D("envelope");

      foreach ($envelopeids as  $envelopeid) 
      {
        $envelopes=$envelopeModel->where("id={$envelopeid['redEnveid']}")->select();
        foreach ($envelopes as  $value)
        {
           if(time()-strtotime($envelopeid['addtime']) < ($value['validtime'])*24*3600)
           {
            $value['unusetime']=date("Y-m-d H:i:s",strtotime($envelopeid['addtime'])+($value['validtime'])*24*3600);
            $useEnvelope[]=$value;
           }
           else
           {
            //过期红包
            $value['unusetime']=date("Y-m-d H:i:s",strtotime($envelopeid['addtime'])+($value['validtime'])*24*3600);
            $unUseEnvelope[]=$value;
           }
        }
      }    
     } 

     $this->assign('useEnvelope',$useEnvelope); 
     $this->assign('unUseEnvelope',$unUseEnvelope); 
     $this->display();
  }
//消费记录
  public function consume()
  {
    $user=$this->userinfo;

    $historyModle=D('history');
    $history=$historyModle->where("member_id={$user['user_id']}")->select();
    foreach ($history as $key => $value) {
      $goodSModel=D("goods");
      $goodsinfo=$goodSModel->find($value['goods_id']);
      $category_id=$goodsinfo['goods_category_id'];

      $history[$key]['goodsinfo']=$goodsinfo;
    }
    $this->assign('history',$history); 
    $this->display();
  }
  //管理地址
  public function address()
  {
    $user=$this->userinfo;
    $addressModel=D("address");
    $address=$addressModel->where("member_id={$user['user_id']}")->select();
    $default=array();
    if(!empty($address))
    {
      foreach ($address as  $value)
      {
        if($value['is_default']==1)
        {
          $default=$value;
        }
      }
      if(empty($default))
      {
        $default=$address[0];
      }
    }
    $this->assign('default',$default);
    $this->assign('allAddress',$address);
    $this->display();
  }
  //设置默认的地址
  public function setDefault()
  {
    $user=$this->userinfo;
    $addressid=I("addressid");
    $addressModel=D("address");

    $addressModel->where('is_default=1 AND member_id='.$user['user_id'])->setField('is_default',0);
    $addressModel->where('id='.$addressid)->setField('is_default',1);
    $this->redirect("address",array('id'=>$user['user_id']));
  }

  public function ajaxDefault()
  {
    $user=$this->userinfo;
    $addressid=I("addressid");
    $addressModel=D("address");
    $addressModel->where('is_default=1 AND member_id='.$user['user_id'])->setField('is_default',0);
    $isOk=$addressModel->where('id='.$addressid)->setField('is_default',1);

    $this->ajaxReturn(array('isOk' =>$isOk));
  }
  //删除地址
  public function deladdress()
  {
    $user=$this->userinfo;
    $addressid=I("addressid");

    $addressModel=D("address");
    $isOk=$addressModel->delete($addressid); 
    $result=array();
    $result['isOk']=$isOk;
    $this->ajaxReturn($result);

  }
  //添加地址
  public function addAddress()
  {
    $user=$this->userinfo;
    $data=array();
    $data['shr_name']=I('name');
    $data['shr_province']=I('province');
    $data['shr_city']=I('city');
    $data['shr_area']=I('area');
    $data['shr_address']=I('shr_address');
    $data['shr_phone']=I('shr_phone');
    $data['shr_zip']=I('shr_zip','空');
    $data['shr_mobile']=I('shr_mobile','kon');
    $data['member_id']=I('id');
    $data['is_default']=1;

    $addressModel=D("address");
    $addressModel->where('is_default=1 AND member_id='.$user['user_id'])->setField('is_default',0); 
    $isOk=$addressModel->add($data); 

    $result=array();
    $result['isOk']=$isOk;
    $this->ajaxReturn($result);
  }
  //修改地址
  public function modifyAddress()
  {
    $user=$this->userinfo;
    $data=array();
    $data['shr_name']=I('name');
    $data['shr_province']=I('province');
    $data['shr_city']=I('city');
    $data['shr_area']=I('area');
    $data['shr_address']=I('shr_address');
    $data['shr_phone']=I('shr_phone');
    $data['shr_zip']=I('shr_zip');
    $data['shr_mobile']=I('shr_mobile');
    $data['is_default']=1;
    
    $addressModel=D("address");
    $addressModel->where('is_default=1 AND member_id='.$user['user_id'])->setField('is_default',0);
    $isOk=$addressModel->where("id=".I('addressid'))->save($data); 

    $result=array();
    $result['isOk']=$isOk;
    //$result['isOk']=$data['shr_zip'].'--'.$data['shr_mobile'];
    $this->ajaxReturn($result);
  }
  //我的订单
  public function order()
  {
    $user=$this->userinfo;
    $userorder=M('order_goods');
    $userOrder= $userorder->where("member_id={$user['user_id']}")->select();

    if(!empty($userOrder))
    {
      $goodSModel=D("goods");
      $orderModel=D("order");
      $key = C('DES_KEY');
      $Crypt=new \Common\Crypt($key);
      $goodsCategory=M('goods_category');
      foreach ($userOrder as $orderid => $order) 
      {     
         $orders=$orderModel->find($order['order_id']); //获取订单信息
         $orders['dealid']=$Crypt->encrypt($orders['id']);      
         $userOrder[$orderid ]['orders']=$orders;
         $tempGoods=$goodSModel->find($order['goods_id']);  //获取商品信息
         $tempGoods['catalog']=$goodsCategory->where('category_id='.$tempGoods['goods_category_id'])->getField('navigation_id');
         $userOrder[$orderid ]['goods']=$tempGoods;  //获取商品信息        
      }

    }
    $this->assign('userOrder',$userOrder); 
    $this->display();
  }
  //收货
  public function reveiveGoods()
  { 
     $this->success('请登录支付宝，确认收货',"https://www.alipay.com");
  }
  //退货
  public function returnGoods()
  {
     $this->success('请登录支付宝，确认退货',"https://www.alipay.com");
  }
}