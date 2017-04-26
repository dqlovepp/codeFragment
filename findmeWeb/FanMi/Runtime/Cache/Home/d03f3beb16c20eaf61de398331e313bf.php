<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="职业装,fanmi,衣服,泛米网,网购">
<meta property="wb:webmaster" content="683e4f1d604b6645" />
<title>泛米网</title>
<link href="<?php echo (APP_HOME_STYLE); ?>fanmi_index.css" rel="stylesheet" type="text/css">
<link href="<?php echo (APP_HOME_STYLE); ?>fanmi_content.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>base.css" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>global.css" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>header.css" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>common.css" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>bottomnav.css" type="text/css">
<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>footer.css" type="text/css">
<script type="text/javascript" src="<?php echo (APP_COMMON_JS); ?>jquery-1.9.1.js"></script>
<script src="http://kefu.qycn.com/vclient/state.php?webid=102907" language="javascript" type="text/javascript">
</script>
<script type="text/javascript">
		/****
	$(function(){
	
		$('#customer-help').mouseover(function(){
			var CustomerService=$('#Customer-service');
			CustomerService.css('display','block');
				$(this).mouseout(function(){
					CustomerService.mouseover(function(){
						CustomerService.css('display','block');
						return false;
					});	
					CustomerService.mouseout(function(){
						CustomerService.css('display','none');
						return false;
					});	
					CustomerService.css('display','none');
				});
		});
		
		$('.navType').each(function(){
			var curObj=$(this);
			curObj.mouseover(function(){
				var navigatorBox=$('#navigator-box');
				navigatorBox.animate(
					{
				    height:'50px',
				   },1000
				);
			});
		});
	});
	****/
	
</script>

</head>
<body>
<div id="header_cont">
	<div id="header_box">
	<div id="header_Area">
		<div class="header_left">
			<ul>
			<?php if(!empty($_SESSION['fm_user_id'])): ?><li>亲，欢迎回来</li>
				<li style="margin-left:10px"><a href="/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html" target="" class="user-login"><?php echo (session('fm_user_name')); ?></a></li>
				<li style="margin-left:10px"><a href="/Home/User/logout" target="" class="user-login">退出</a></li>
			<?php else: ?>
				<li>亲，欢迎访问泛米网</li>
				<li><a href="/Home/User/login" target="" class="user-login">请登录</a></li>
				<li><a href="/Home/User/register" target="" class="user-register">免费注册</a></li><?php endif; ?>
			</ul>
		</div>
		<div class="header_right">
			<ul>
				<li><a href="/Home/Cart/lst.html" target="" class="purchase-cat">购物车</a></li>
				<li><a href="/Home/Manager/order/id/<?php echo (session('fm_user_id')); ?>.html"  class="purchase-order">我的订单</a></li>
				<!-- <li>
				<div>
				<a href="javascript:;"  id="customer-help">客服服务</a>
				<div id="Customer-service" class="header-secondLevel">
					<div><a href="" target="">帮助中心</a></div>
					<div><a href="" target="">在线服务</a></div>
					<div><a href="" target="">售后服务</a></div>
					<div><a href="" target="">投诉中心</a></div>
				</div>
				</li> -->
			</ul>
		</div>
	</div>
	</div>
	<?php switch($layoutType): case "Empty": break;?> 
       	 <?php case "Layout1": ?><div id="navgator_first">
			<div id="webLogo">
				<a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>webName.png" width="200px" height="100px" border="0"></a>
			</div>
			<!--navigator-->
			<div class="navigator-type">
				<ul>
					<li><a href="/Home/index/index" class="navType">系列</a></li>
					<li><a href="/Home/index/index" class="navType">品牌</a></li>
					<li><a href="/Home/index/index" class="navType">服务</a></li>
				</ul>
			</div>
		</div>
			<div id="navigator-box">
				<div class="navigator-title" style="width:<?php echo ($navWidth); ?>px">
					<ul>
						<?php if(is_array($navinfo)): foreach($navinfo as $key=>$list): ?><li><a href="/Home/<?php echo ($list["control"]); ?>/<?php echo ($list["action"]); ?>/catalog/<?php echo ($list["id"]); ?>.html"  style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
</div> 
       	 <link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>list.css" type="text/css">
       	 <script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>jquery-1.8.3.min.js"></script>
		 <script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>header.js"></script>
		 <script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>list.js"></script>
		 <div style="width:899px; height:50px;">
		</div>
		<!-- 头部 start -->
		<div class="header w1210 bc mt15">
			<!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
			<div class="logo w1210">
				<h1 class="fl"><a href="<?php echo (APP_HOME_IMG); ?>erweima.jpg"><img src="<?php echo (APP_HOME_IMG); ?>erweima.jpg" width="100px" alt="京西商城"></a></h1>
				<!-- 头部搜索 start -->
				<div class="search fl">
				</div>
				<!-- 头部搜索 end -->
				<!-- 用户中心 start-->
				<div class="user fl">
					<dl>
						<dt>
							<em></em>
							<a href="/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html">用户中心</a>
							<b></b>
						</dt>
						<dd>
							<div class="prompt">
								<?php if(!empty($_SESSION['fm_user_id'])): echo (session('fm_user_name')); ?>,您好
								<?php else: ?>
								您好，请<a href="/Home/Home/login">登录</a><?php endif; ?>
							</div>
							<div class="uclist mt10">
								<ul class="list1 fl">
									<li><a href="/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html">用户信息></a></li>
									<li><a href="/Home/Manager/order/id/<?php echo (session('fm_user_id')); ?>.html">我的订单></a></li>
									<li><a href="/Home/Manager/address/id/<?php echo (session('fm_user_id')); ?>.html">收货地址></a></li>
								</ul>

								<ul class="fl">
									<li><a href="/Home/Manager/consume/id/<?php echo (session('fm_user_id')); ?>.html">消费记录></a></li>
									<li><a href="/Home/Manager/redEnvelope/id/<?php echo (session('fm_user_id')); ?>.html">我的红包></a></li>
								</ul>

							</div>
						</dd>
					</dl>
				</div>
				<!-- 用户中心 end-->

				<!-- 购物车 start -->
				<div class="cart fl">
					<dl>
						<dt>
							<a href="/Home/Cart/lst.html">去购物车结算</a>
							<b></b>
						</dt>
						<dd>
							 <?php echo ($ajaxcar); ?>
						</dd>
					</dl>
				</div>
				<!-- 购物车 end -->
			</div>
			<!-- 头部上半部分 end -->
			
			<div style="clear:both;"></div>
		</div>
		<!-- 头部 end-->
		<div style="clear:both;"></div>
		<div style="width:899px; height:80px;">
		</div><?php break;?>
       	 <?php default: ?>
       	 <div id="navgator_first">
			<div id="webLogo">
				<a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>webName.png" width="200px" height="100px" border="0"></a>
			</div>
			<!--navigator-->
			<div class="navigator-type">
				<ul>
					<li><a href="/Home/Manager/order/navType/1" class="navType">系列</a></li>
					<li><a href="/Home/Manager/order/navType/2" class="navType">品牌</a></li>
					<li><a href="/Home/Manager/order/navType/3" class="navType">服务</a></li>
				</ul>
			</div>
		</div>
			<div id="navigator-box">
				<div class="navigator-title" style="width:<?php echo ($navWidth); ?>px">
					<ul>
						<?php if(is_array($navinfo)): foreach($navinfo as $key=>$list): ?><li><a href="/Home/<?php echo ($list["control"]); ?>/<?php echo ($list["action"]); ?>/catalog/<?php echo ($list["id"]); ?>.html"  style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<div style="width:100%; height:10px;">
			</div>
</div><?php endswitch;?>
 	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>home.css" type="text/css">
	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>user.css" type="text/css">
	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>bottomnav.css" type="text/css">
	<script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>home.js"></script>	
	<style type="text/css">
	.orderbox{border: 1px solid #DDD; width: 910px; height:180px; padding: 5px; margin-bottom: 5px;}
	.orderbox:hover{border: 1px solid #AAA;}
	.orderTitle{width: 890px; height: 35px; line-height: 35px}
	.orderTitle p{float: left;}
	.orderTitle a{display:block; float: right;}
	.orderStatus p{width: 100%; height: 28px; line-height: 28px; margin-bottom: 5px;}
	</style>
	<div style="clear:both;"></div>
	<!-- 页面主体 start -->
	<div class="main w1210 bc mt10">	
		<!-- 左侧导航菜单 start -->
		<div class="menu fl">
			<h3>我的泛米</h3>
			<div class="menu_wrap">
				<dl>
					<dt>账户中心 <b></b></dt>
					<dd><b>.</b><a href="/Home/Manager/myfm/id/<?php echo ($userinfo["user_id"]); ?>.html">基本信息</a></dd>
					<dd><b>.</b><a href="/Home/Manager/redEnvelope/id/<?php echo ($userinfo["user_id"]); ?>.html">我的红包</a></dd>			
					<dd><b>.</b><a href="/Home/Manager/consume/id/<?php echo ($userinfo["user_id"]); ?>.html">消费记录</a></dd>
					<dd><b>.</b><a href="/Home/Manager/address/id/<?php echo ($userinfo["user_id"]); ?>.html">收货地址</a></dd>
				</dl>
				<dl>
					<dt>订单中心 <b></b></dt>
					<dd><b>.</b><a href="/Home/Manager/order/id/<?php echo ($userinfo["user_id"]); ?>.html" class="curmenua">我的订单</a></dd>
				</dl>
			</div>
		</div>
		<!-- 左侧导航菜单 end -->

		<!-- 右侧内容区域 start -->
		<div class="content fl ml10">
			<div class="user_hd">
				<h3>我的订单</h3>
			</div>

			<div class="user_bd mt10" style="color:#666">
				<?php if(empty($userOrder)): ?>暂时没有订单信息
				<?php else: ?>
				<?php if(is_array($userOrder)): $i = 0; $__LIST__ = $userOrder;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$myorder): $mod = ($i % 2 );++$i;?><div class="orderbox">					
					<ul>
						<li class="orderTitle">
							<p class="left"><?php echo ($myorder["orders"]["addtime"]); ?></p>
							<?php if(($myorder['orders']['order_status'] == 4) OR ($myorder['orders']['order_status'] == 2)): ?><a class="right" href="javascript:;" onclick="delOrder(this,<?php echo ($myorder["orders"]["id"]); ?>)">删除</a><?php endif; ?>							
						</li>
						<li class="orderCon">
							<table cellspacing="0" cellpadding="2" border="0">
								<tr>
									<td width="200px" align="center">
									<a href="/Home/Products/goods/catalog/<?php echo ($myorder["goods"]["catalog"]); ?>/Category/<?php echo ($myorder["goods"]["goods_category_id"]); ?>/id/<?php echo ($myorder["goods"]["goods_id"]); ?>.html">
									<img src="<?php echo (URL); ?>Public/<?php echo ($myorder["goods"]["goods_mid_img"]); ?>" >
									</a>
									</td>
									<td  width="200px" align="center" >
										<a href="/Home/Products/goods/catalog/<?php echo ($myorder["goods"]["catalog"]); ?>/Category/<?php echo ($myorder["goods"]["goods_category_id"]); ?>/id/<?php echo ($myorder["goods"]["goods_id"]); ?>.html"><?php echo ($myorder["goods"]["goods_name"]); ?>
										</a>
									</td>
									<td width="100px" align="center"><?php echo ($myorder["price"]); ?></td>
									<td width="100px"><?php echo ($myorder["goods_number"]); ?>件</td>
									<td width="100px"><?php echo ($myorder["orders"]["total_price"]); ?></td>
									<td width="100px" align="center" class="orderStatus">
									<?php if($myorder['orders']['pay_status'] == 1): ?><p>已支付</p>
										<?php if($myorder['orders']['post_status'] == 0): ?><p>尚未发货</p>
										<?php elseif($myorder['orders']['post_status'] == 1): ?>
										<p>已经发货</p>									
										<?php else: ?>
										<p>已收货</p><?php endif; ?>	
									<?php else: ?>
									<p>尚未支付</p><?php endif; ?>
									</td>
									<td width="100px" align="center" class="orderStatus">
									<?php if($myorder['orders']['pay_status'] == 0): ?><p><a href="/Home/Cart/alipay/orderid/<?php echo ($myorder["orders"]["dealid"]); ?>.html">立即支付</a></p>
									<?php else: ?>
									<?php if($myorder['orders']['post_status'] == 0): ?><p id="noticePost" style="cursor:pointer" onclick="noticePost(<?php echo ($myorder["orders"]["id"]); ?>)">提醒发货</p>
									<?php elseif($myorder['orders']['post_status'] == 1): ?>				
									<?php switch($myorder["orders"]["order_status"]): case "3": ?>正在退货中<?php break;?>
										<?php case "4": ?>退货成功<?php break;?>
										 <?php default: ?>
										 <p><a href="/Home/Manager/reveiveGoods/id/<?php echo ($userinfo["user_id"]); ?>.html">确认收货</a></p>
										 <p><a href="/Home/Manager/returnGoods/id/<?php echo ($userinfo["user_id"]); ?>.html">退款</a></p><?php endswitch; endif; endif; ?>
									
									</td>
								</tr>
							</table>
						</li>
					</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</div>
		</div>
		<!-- 右侧内容区域 end -->
	</div>
	<!-- 页面主体 end-->
	<div style="clear:both;"></div>
	<script>
		function delOrder(obj,id)
		{
			if(confirm("是否确定删除该商品"))
	        $.ajax({
	            type:'post',
	            dataType:'json',
	            data:{'id':id},
	            url:"/Home/Cart/delOrder",
	            success:function(data)
	            {
	                if(data['isok'] !=0)
	                {
	                	location.reload();
	                }
	            }
	        });     
		} 
		function noticePost(id)
		{
			$.ajax({
	            type:'post',
	            dataType:'json',
	            data:{'id':id},
	            url:"/Home/Cart/noticePost",
	            success:function(data)
	            {
	                if(data['isok'])
	                {
	                	alert('已经提醒，请耐心等待');
	                }
	                else
	                {
	                	alert(data['isok']);
	                }
	            }
	        }); 
		}
	</script>
 <!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<?php if(is_array($footers)): $i = 0; $__LIST__ = $footers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$footer): $mod = ($i % 2 );++$i;?><div class="bnav<?php echo ($i); ?>">
			<h3><b></b> <em><?php echo ($footer["first"]["name"]); ?></em></h3>
			<ul>
				<?php if(is_array($footer["second"])): $i = 0; $__LIST__ = $footer["second"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ftsecond): $mod = ($i % 2 );++$i;?><li><a href="/Home/Novice/regist.html"><?php echo ($ftsecond["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> 
		</p>
		<p class="copyright">
			 © 2015 泛米网上商城 版权所有，并保留所有权利。  ICP备案证书号: 
		</p>
		<p class="auth">
			<a href=""><img src="<?php echo (APP_HOME_IMG); ?>xin.png" alt="" /></a>
			<a href=""><img src="<?php echo (APP_HOME_IMG); ?>kexin.jpg" alt="" /></a>
			<a href=""><img src="<?php echo (APP_HOME_IMG); ?>police.jpg" alt="" /></a>
			<a href=""><img src="<?php echo (APP_HOME_IMG); ?>beian.gif" alt="" /></a>
		</p>
	</div>
	<!-- 底部版权 end -->
</body>
</html>