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
				<li style="margin-left:10px"><a href="/findmeWeb/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html" target="" class="user-login"><?php echo (session('fm_user_name')); ?></a></li>
				<li style="margin-left:10px"><a href="/findmeWeb/Home/User/logout" target="" class="user-login">退出</a></li>
			<?php else: ?>
				<li>亲，欢迎访问泛米网</li>
				<li><a href="/findmeWeb/Home/User/login" target="" class="user-login">请登录</a></li>
				<li><a href="/findmeWeb/Home/User/register" target="" class="user-register">免费注册</a></li><?php endif; ?>
			</ul>
		</div>
		<div class="header_right">
			<ul>
				<li><a href="/findmeWeb/Home/Cart/lst.html" target="" class="purchase-cat">购物车</a></li>
				<li><a href="/findmeWeb/Home/Manager/order/id/<?php echo (session('fm_user_id')); ?>.html"  class="purchase-order">我的订单</a></li>
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
					<li><a href="/findmeWeb/Home/index/index" class="navType">系列</a></li>
					<li><a href="/findmeWeb/Home/index/index" class="navType">品牌</a></li>
					<li><a href="/findmeWeb/Home/index/index" class="navType">服务</a></li>
				</ul>
			</div>
		</div>
			<div id="navigator-box">
				<div class="navigator-title" style="width:<?php echo ($navWidth); ?>px">
					<ul>
						<?php if(is_array($navinfo)): foreach($navinfo as $key=>$list): ?><li><a href="/findmeWeb/Home/<?php echo ($list["control"]); ?>/<?php echo ($list["action"]); ?>/catalog/<?php echo ($list["id"]); ?>.html"  style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li><?php endforeach; endif; ?>
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
							<a href="/findmeWeb/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html">用户中心</a>
							<b></b>
						</dt>
						<dd>
							<div class="prompt">
								<?php if(!empty($_SESSION['fm_user_id'])): echo (session('fm_user_name')); ?>,您好
								<?php else: ?>
								您好，请<a href="/findmeWeb/Home/Home/login">登录</a><?php endif; ?>
							</div>
							<div class="uclist mt10">
								<ul class="list1 fl">
									<li><a href="/findmeWeb/Home/Manager/myfm/id/<?php echo (session('fm_user_id')); ?>.html">用户信息></a></li>
									<li><a href="/findmeWeb/Home/Manager/order/id/<?php echo (session('fm_user_id')); ?>.html">我的订单></a></li>
									<li><a href="/findmeWeb/Home/Manager/address/id/<?php echo (session('fm_user_id')); ?>.html">收货地址></a></li>
								</ul>

								<ul class="fl">
									<li><a href="/findmeWeb/Home/Manager/consume/id/<?php echo (session('fm_user_id')); ?>.html">消费记录></a></li>
									<li><a href="/findmeWeb/Home/Manager/redEnvelope/id/<?php echo (session('fm_user_id')); ?>.html">我的红包></a></li>
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
							<a href="/findmeWeb/Home/Cart/lst.html">去购物车结算</a>
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
					<li><a href="/findmeWeb/Home/Cart/lst/navType/1" class="navType">系列</a></li>
					<li><a href="/findmeWeb/Home/Cart/lst/navType/2" class="navType">品牌</a></li>
					<li><a href="/findmeWeb/Home/Cart/lst/navType/3" class="navType">服务</a></li>
				</ul>
			</div>
		</div>
			<div id="navigator-box">
				<div class="navigator-title" style="width:<?php echo ($navWidth); ?>px">
					<ul>
						<?php if(is_array($navinfo)): foreach($navinfo as $key=>$list): ?><li><a href="/findmeWeb/Home/<?php echo ($list["control"]); ?>/<?php echo ($list["action"]); ?>/catalog/<?php echo ($list["id"]); ?>.html"  style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<div style="width:100%; height:10px;">
			</div>
</div><?php endswitch;?>
 	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>cart.css" type="text/css">

	<script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>cart1.js"></script>
	<div style="clear:both;"></div>
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl">泛米科技有限公司</h2>
			<div class="flow fr">
				<ul>
					<li class="cur">1.我的购物车</li>
					<li>2.填写核对订单信息</li>
					<li>3.支付</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- 页面头部 end -->
	
	<div style="clear:both;"></div>
	<?php if(empty($_SESSION['fm_user_id'])): ?><!-- 登录提醒 end -->
	<div class="noticeLogin">
		<ul>
			<li>
				<dd class="wareNotice" style="margin-top:8px"></dd>
				<dd>你当前未登录！</dd>
			</li>
			<li>如果已有泛米网账号，请登录获取收货地址</li>
			<li><a class="go_login_btn" href="/findmeWeb/Home/User/login.html" title="马上登入">马上登入</a></li>
		</ul>       
    </div>
	<!-- 登录提醒 end -->
	<div style="clear:both;"></div><?php endif; ?>
	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">	
		<?php if(empty($goodsData)): ?><div class="nogoods">
				<ul>
					<li><h2><span>我的购物车</span></h2></li>
					<li>您的购物车还是空的，赶快去挑选商品吧</li>
					<li><a href="/findmeWeb/Home/Index/index">立即购物</a></li>
				</ul>			
			</div>
		<?php else: ?>
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col2">商品信息</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>	
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($goodsData)): $i = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr gid="<?php echo ($data["goods"]["goods_id"]); ?>" gsize="<?php echo ($data["goods_size"]); ?>">
					<td class="col1"><a href="/findmeWeb/Home/Products/goods/catalog/<?php echo ($data["goods"]["catalog"]); ?>/Category/<?php echo ($data["goods"]["goods_category_id"]); ?>/id/<?php echo ($data["goods"]["goods_id"]); ?>.html"><img src="<?php echo (URL); ?>Public/<?php echo ($data["goods"]["goods_mid_img"]); ?>" alt="" /></a>  <strong><a href="/findmeWeb/Home/Products/goods/catalog/<?php echo ($data["goods"]["catalog"]); ?>/Category/<?php echo ($data["goods"]["goods_category_id"]); ?>/id/<?php echo ($data["goods"]["goods_id"]); ?>.html"><?php echo ($data["goods"]["goods_name"]); ?></a></strong></td>
					<td class="col2"> <p>身高：<?php echo ($data["userheight"]); ?></p><p>体重：<?php echo ($data["userweight"]); ?></p> <p>尺码：<?php echo ($data["goods_size"]); ?></p> </td>
					<td class="col3">￥<span><?php echo ($data["goods"]["goods_price"]); ?></span></td>
					<td class="col4"> 
						<a href="javascript:;" class="reduce_num"></a>
						<input type="text" name="amount" value="<?php echo ($data["amount"]); ?>" class="amount"/>
						<a href="javascript:;" class="add_num"></a>
					</td>
					<td class="col5">￥<span>
					<?php echo $data['amount']*$data['goods']['goods_price']; ?>.00</span></td>
					<td class="col6"><a href="javascript:;" class="adel">删除</a></td>
				</tr>
				<tr>
					<td colspan="6" height="10px">
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>				
			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total">
					<?php echo ($totalPrice); ?>.00</span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="/findmeWeb/Home/Index/index.html" class="continue">继续购物</a>
			<a href="/findmeWeb/Home/Cart/info.html" class="checkout">结 算</a>
		</div><?php endif; ?>		
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>

 <!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<?php if(is_array($footers)): $i = 0; $__LIST__ = $footers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$footer): $mod = ($i % 2 );++$i;?><div class="bnav<?php echo ($i); ?>">
			<h3><b></b> <em><?php echo ($footer["first"]["name"]); ?></em></h3>
			<ul>
				<?php if(is_array($footer["second"])): $i = 0; $__LIST__ = $footer["second"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ftsecond): $mod = ($i % 2 );++$i;?><li><a href="/findmeWeb/Home/<?php echo ($footer["first"]["cname"]); ?>/<?php echo ($ftsecond["cname"]); ?>.html"><?php echo ($ftsecond["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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