<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use \Home\Controller\APPHomeController;

class CartController extends APPHomeController {
	public function addToCart()
	{
		//判断该商品是否已经添加到了购物车
		/***
		用户登录了商品添加到数据库，否则添加到cookie中
		*如果该商品已经添加到购物车，则代表更新 ，否则添加
		****/
		$goods_id=I('goods_id');
		$amount=I('amount');
		$goods_size=I('goods_size');
		$userweight=I('userweight');
		$userheight=I('userheight');

		if(empty($goods_id) || empty($amount) || empty($goods_size))
		{
			$Blackbox=new \Component\Blackbox();
			$Blackbox->alert_back('请选择相应的参数后，再提交');
		}
		else
		{
			if(empty(session('fm_user_id')))  //非登录状态下
			{
				// 将购物车写到cookie中
				$cart = isset($_COOKIE['cart']) ? unserialize($_COOKIE['cart']) : array();

				$key = $goods_id .'-'.$goods_size;

				if(isset($cart[$key]))
				{
					$cart[$key][0] += $amount;
				}
				else 
				{
					$cart[$key] = array($amount, I('userheight'),I('userweight'));
				}

				$aMonth = 30 * 24 * 3600;
				setcookie('cart', serialize($cart), time() + $aMonth, '/', '.findme.wang');

				$data=array('isOk'=>2);
				$this->ajaxReturn($data);
			}
			else  //已经登录
			{
				$cartModel=D("cart");
				if($this->isExit(session('fm_user_id'),$goods_id,$goods_size,$userweight,$userheight))
				{
					//更新购物车商品数量
					$isOk=$cartModel->where("member_id='".session('fm_user_id')."' AND goods_id=$goods_id AND goods_size='$goods_size' AND userweight=$userweight AND userheight=$userheight")->setInc('amount',I('amount'));				
					$data=array('isOk'=>$isOk);
				}
				else
				{
					//添加商品
					$_POST['member_id']=session('fm_user_id');	
					$cartModel->create();
					$isOk=$cartModel->add();
					
					$data=array('isOk'=>$isOk);
				}

				$this->ajaxReturn($data);
			}
		}		
		
	}
	/***
	判断某个商品是否存在
	***/
	public function isExit($userid,$goodsid,$goods_size,$userweight,$userheight){
		$cartModel=D('cart');
		$goods=$cartModel->where("member_id='$userid' AND goods_id=$goodsid AND goods_size='$goods_size' AND userweight=$userweight AND userheight=$userheight")->select();
		return empty($goods)?false:true;
	}

	public function lst()
	{
		$this->assign('layoutType','Layout1');
		
		$cartModel = D('Cart');
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
		$this->display();
	}
	/****
	删除购物车中的商品
	******/
	public function ajaxDelGoods($gid, $size = '')
	{
		$cartModel = D('Cart');
		$result=$cartModel->updateGN($gid, $size, 0);

		$result=array();
	    $result['isOk']=$isOk;
	    $this->ajaxReturn($result);
	}
	/****
	修改购物车中的商品数量
	判断库存是否够
	******/
	public function ajaxUpdateGoods($gid, $size, $gn)
	{
		$cartModel = D('Cart');
		/*$goodsModel = D('Goods');
		$gnInDb = $goodsModel->getGN($gid, $gaid);
		if($gnInDb >= $gn)
		{
			$cartModel->updateGN($gid, $gaid, $gn);
			echo 0;
		}
		else 
		{
			$cartModel->updateGN($gid, $gaid, $gnInDb);
			echo $gnInDb;
		}*/
		$result=$cartModel->updateGN($gid, $size, $gn);
		$result=array();
	    $result['isOk']=$isOk;
	    $this->ajaxReturn($result);

	}
	public function info()
	{
		session('goods',null);
		$this->assign('layoutType','Layout1');
		//如果已经登录，读取用户的地址
		if(!empty(session('fm_user_id')))
		{
			$addressModel=D("address");
		    $address=$addressModel->where("member_id=".session('fm_user_id'))->select();
		    $default=array('id'=>0);
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

		    $cartModel = D('Cart');
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
			//var_dump($goodsData);
			$this->assign('totalPrice', $totalPrice);
			$this->assign('goodsData', $goodsData);		
			$this->display("info1");
		}
		else
		{
			$this->assign('layoutType','Layout1');
			$this->success('请先登录',U('Home/User/login',3));
		}	
	}
	//立即购买
	public function buynow()
	{
		if(empty(session('fm_user_id')))
		{
			$this->assign('layoutType','Layout1');
			$this->success('请先登录',U('Home/User/login',3));
		}
		else
		{
			//读取地址
			$addressModel=D("address");
		    $address=$addressModel->where("member_id=".session('fm_user_id'))->select();
		    $default=array('id'=>0);
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
		        $default['id']=$address[0];
		      }
		    }
		    $this->assign('default',$default);
		    $this->assign('allAddress',$address);
			//获取订单信息
			$goods=array();
			if(!empty(I('goods_id')))
			{		
				session('goods',null);
				$goods['goods_id']=I('goods_id');
				$goods['amount']=I('amount');
				$goods['goods_size']=I('goods_size');
				$goods['userweight']=I('userweight');
				$goods['userheight']=I('userheight');
				session('goods',$goods);
			}
			else
			{
				$goods=session('goods');
			}

			$goodsModel=D("goods");
			$goodsinfo=$goodsModel->where("goods_id=".$goods['goods_id'])->find();

			$this->assign('layoutType','Layout1');
			$this->assign('orderinfo',$goods);
			$this->assign('goodsinfo',$goodsinfo);
			$this->display("info22");		
		}		
	}
	// 下定单页面
	public function order()
	{
		//从购物车中取出数据
		//生成订单
		//将商品信息与订单号数据添加到fm_order_goods中
		//从购物车中取出商品信息
		$addressid=I('curAddress');
		$PayMethod=I('curPayMethod');
		$buyNow=I('buyNow',0);
		if(empty($addressid)||empty($PayMethod) || !is_numeric($addressid) || !is_numeric($PayMethod) )
		{
			$this->assign('layoutType','Layout1');
			$this->error($PayMethod.'非法操作gew'.$addressid);
		}
		else
		{
			//获取购物车中的信息
			$cartModel = D('Cart');
			if($buyNow ==1)
			{
				$goodsData = $cartModel->getSessionGoods();
			}
			else
			{
				$goodsData = $cartModel->getGoodsList();
			}
			// var_dump(session('goods'));
			//var_dump($goodsData);
			$totalPrice=0;
			if(!empty($goodsData))
			{
				foreach ($goodsData as  $value)
				{
					$totalPrice+=$value['amount']*$value['goods']['goods_price'];
				}
			}
			//获取地址
			$addressModel=D("address");
		    $address=$addressModel->find($addressid);
		    if(empty($address))
		    {
		    	$this->assign('layoutType','Layout1');
				$this->error('发货地址不存在，请重新提交订单');
		    }
		    else
		    {
		    	//生成订单
				$order=D('order');
				$data=array();
				$data['addtime']=date("Y-m-d H:i:s");
				$data['pay_method']=$PayMethod;
				$data['total_price']=$totalPrice;
				$data['member_id'] = session('fm_user_id');	
				/***
				收货人信息
				***/
				$data['shr_name']=$address['shr_name'];
				$data['shr_province']=$address['shr_province'];
				$data['shr_city']=$address['shr_city'];
				$data['shr_area']=$address['shr_area'];
				$data['shr_address']=$address['shr_address'];
				$data['shr_phone']=$address['shr_phone'];
				$data['shr_zip']=$address['shr_zip'];
				$data['shr_mobile']=$address['shr_mobile'];

				$order_id=$order->add($data); //添加到订单表
		    }
		    if($order_id !=0)
			{
				/***
				清除购物车的数据
				******/
				$cartModel->clear();//清除购物车
				$key = C('DES_KEY');
				$Crypt=new \Common\Crypt($key);
				$order_id=$Crypt->encrypt($order_id);
				$this->redirect("Cart/orderSumit",array('order_id'=>$order_id));			
			}
			else
			{
				//提交失败，清除订单，重新订购
					$this->assign('layoutType','Layout1');
					$this->error('发货地址不存在，请重新提交订单');
			}
		}			
	}
	public function orderSumit($order_id)
	{
		$this->assign('layoutType','Layout1');
		$this->assign('order_id',$order_id);
		$this->display('order');
	}
	// 支付宝-生成支付的按钮
	public function alipay()
	{	
		$orderid=I('orderid');
		$undealid=$orderid;
		//判断是否是大写十六进制字符串
		$idLength=strlen($orderid);
		if($idLength !=16)
		{
			$this->assign('layoutType','Layout1');
			$this->error('非法操作');
		}
		else
		{
			$key = C('DES_KEY');
			$Crypt=new \Common\Crypt($key);
			$orderid=$Crypt->decrypt($orderid);

			$order=D('order');
			$orderinfo=$order->find($orderid);
			if(empty($orderinfo))
			{
				$this->assign('layoutType','Layout1');
				$this->error('暂时没有订单信息');
			}
			else
			{			
				$data=array();
				//获取当前用户所以订单
				$data['WIDout_trade_no']=$undealid;//订单号
				$data['WIDsubject']='泛米网购';//订单名称
				$data['WIDprice']=$orderinfo['total_price'];  //总价钱
				$data['WIDbody']='感谢你对泛米网络公司的支持，请请登录http://www.findme.wang查看购物详情';  //商品表述
				$data['WIDshow_url']='WIDshow_url';  //查看物流的URL
				$data['WIDreceive_name']=$orderinfo['shr_name'];  //收获人
				$data['WIDreceive_address']=$orderinfo['shr_address'];
				$data['WIDreceive_zip']=$orderinfo['shr_zip']; //邮编
				$data['WIDreceive_phone']=$orderinfo['shr_phone'];//手机
				$data['WIDreceive_mobile']=$orderinfo['shr_mobile'];//电话
				include('./alipay/alipayapi.php');
			}
		}		
	}
	// 接收支付宝发的消息 
	public function receive()
	{
		$order=D('order');
		require_once("./alipay/alipay.config.php");
		$alipay_config['cacert']    = getcwd().'\\alipay\\cacert.pem';
		require_once("./alipay/lib/alipay_notify.class.php");
		//计算得出通知验证结果
		$alipayNotify = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyNotify();
		if($verify_result) {//验证成功
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		//请在这里加上商户的业务逻辑程序代

		//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		
	    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
		//商户订单号
		$out_trade_no = $_POST['out_trade_no'];  //支付宝传递过来的订单号
		//支付宝交易号

		$trade_no = $_POST['trade_no'];  //支付宝传递过来的总价格

		//交易状态
		$trade_status = $_POST['trade_status'];

		 $key = C('DES_KEY');
		 $Crypt=new \Common\Crypt($key);
		 $orderid=$Crypt->decrypt($out_trade_no);

		if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
		//该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款	
			//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
			//--------------确认订单--------------
			$order->where("id=$orderid")->setField("order_status",1);
	        echo "success";		//请不要修改或删除
	        //调试用，写文本函数记录程序运行情况是否正常
	        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	    }
		else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
		//该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货
		//判断该笔订单是否在商户网站中已经做过处理
		//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序					    		
			//------------------设置付款成功，记录支付宝交易号-------------
			$orderData=array("pay_status"=>1,'WIDinvoice_no'=>$trade_no);
			$order->where("id=$orderid")->save($orderData);
			echo "success";		//请不要修改或删除
	        //调试用，写文本函数记录程序运行情况是否正常
	        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	    }
		else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
			//该判断表示卖家已经发了货，但买家还没有做确认收货的操作		
			//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
			$order->where("id=$orderid")->setField("post_status",1);	
	        echo "success";		//请不要修改或删除

	        //调试用，写文本函数记录程序运行情况是否正常
	        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	    }
		else if($_POST['trade_status'] == 'TRADE_FINISHED') {
		//该判断表示买家已经确认收货，这笔交易完成
		//判断该笔订单是否在商户网站中已经做过处理
		//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序
			//------------------设置交易完成-----------------
			$order->where("id=$orderid")->setField("order_status",2);	
	        echo "success";		//请不要修改或删除

	        //调试用，写文本函数记录程序运行情况是否正常
	        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	    }
	    else if($_POST['trade_status'] =='WAIT_SELLER_AGREE') //退款协议等待卖家确认中
	    {

	    	$order->where("id=$orderid")->setField("order_status",3);
	    	echo "success";		//请不要修改或删除
	    }
	    else if($_POST['trade_status'] =='REFUND_SUCCESS') //退款成功
	    {
	    	$order->where("id=$orderid")->setField("order_status",4);
	    	echo "success";		//请不要修改或删除
	    }
	    else if($_POST['trade_status'] =='TRADE_CLOSED') //退款成功TRADE_CLOSED
	    {
	    	$order->where("id=$orderid")->setField("order_status",4);
	    	echo "success";		//请不要修改或删除
	    }
	    else {
			//其他状态判断 
	        echo "success";

	        //调试用，写文本函数记录程序运行情况是否正常
	        //logResult ("这里写入想要调试的代码变量值，或其他运行的结果记录");
	    }

		//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——	
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	}
	else {
	    //验证失败
	    echo "fail";
	    //调试用，写文本函数记录程序运行情况是否正常
	    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
	}
	}
	// 接收支付宝发的消息 
	public function payResult()
	{
		$this->assign('layoutType','Layout1');

		require_once("./alipay/alipay.config.php");
		$alipay_config['cacert']    = getcwd().'\\alipay\\cacert.pem';
		require_once("./alipay/lib/alipay_notify.class.php");
		//计算得出通知验证结果
		$alipayNotify = new \AlipayNotify($alipay_config);
		$verify_result = $alipayNotify->verifyReturn();
		if($verify_result) {//验证成功
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//请在这里加上商户的业务逻辑程序代码
			
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
		    //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

			//商户订单号eg:商户订单号： 461D4EF68025465F 商品id的编码号
			$out_trade_no = $_GET['out_trade_no'];
			$key = C('DES_KEY');
			$Crypt=new \Common\Crypt($key);
			$orderid=$Crypt->decrypt($out_trade_no);
			//支付宝交易号eg:2015041000001000930067506575 ,由支付宝自动生成
			$trade_no = $_GET['trade_no'];
			//交易状态
			$trade_status = $_GET['trade_status'];  
			$order=D('order');
		    if($_GET['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//如果有做过处理，不执行商户的业务程序
				//支付成功
		
				$curOdredr=$order->find($orderid);
				if($curOdredr['pay_status']==0)
				{
					$orderData=array("pay_status"=>1,'WIDinvoice_no'=>$trade_no);
					$order->where("id=$orderid")->save($orderData);
				}
				$this->success('恭喜您，支付成功，感谢您对我们的信任', U('Index/index'));			
		    }
		    else {
		      //尚未支付成功
		    	$curOdredr=$order->find($orderid);
				if($curOdredr['pay_status']==1)
				{
					$orderData=array("pay_status"=>0,'WIDinvoice_no'=>$trade_no);
					$order->where("id=$orderid")->save($orderData);
				}
				$this->success('恭喜您，支付成功，感谢您对我们的信任', U('Cart/lst'));	
		    }
				
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
		    //验证失败
		    //如要调试，请看alipay_notify.php页面的verifyReturn函数
		    $this->success('操作异常',"__MODULE__/Cart/lst");
		}
	}
	//删除订单
	public function delOrder()
	{
		$id=I('id');
		if(empty($id) || !is_numeric($id))
		{
			$this->ajaxReturn(array('isok' => 0 ));
		}
		else
		{
			$order=D('order');
			$orderGood=M('order_goods');
			$orderid=$order->delete($id);
			if(empty($orderid))
			{
				$this->ajaxReturn(array('isok' => 0 ));
			}
			else
			{
				$isok=$orderGood->where("order_id=".$id)->delete();
				$this->ajaxReturn(array('isok' => $isok ));
			}
			
		}
	}
	//提醒发货
	public function noticePost(){
		$order=D('order');
		$id=I('id');
		$isok=$order->noticePost($id);
		$this->ajaxReturn(array('isok'=>$isok));
	}
}