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
					<li><a href="/Home/Cart/info/navType/1" class="navType">系列</a></li>
					<li><a href="/Home/Cart/info/navType/2" class="navType">品牌</a></li>
					<li><a href="/Home/Cart/info/navType/3" class="navType">服务</a></li>
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
 	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>fillin.css" type="text/css">
	<script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>cart2.js"></script>
<script type="text/javascript" src="<?php echo (URL); ?>Public/cxselect/jquery.cxselect.min.js"></script>
<script>
$(function(){
	$.cxSelect.defaults.url = "<?php echo (URL); ?>Public/cxselect/cityData.min.json";	
});
</script>
	<!-- 页面头部 start -->
	<div class="header w990 bc mt15">
		<div class="logo w990">
			<h2 class="fl">泛米科技有限公司</h2>
			<div class="flow fr flow2">
				<ul>
					<li>1.我的购物车</li>
					<li class="cur">2.填写核对订单信息</li>
					<li>3.成功提交订单</li>
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
			<li><a class="go_login_btn" href="javascript:;" title="马上登入">马上登入</a></li>
		</ul>       
    </div>
	<!-- 登录提醒 end -->
	<div style="clear:both;"></div><?php endif; ?>
	<!-- 主体部分 start -->
	<div class="fillin w990 bc mt15">
		<div class="fillin_hd">
			<h2>填写并核对订单信息</h2>
		</div>
		<div class="fmcartfill">
		<?php if(empty($_SESSION['fm_user_id'])): ?><!-- 收货人信息  start-->
			<script type="text/javascript">
				$('.city_china').cxSelect({
					selects: ['province', 'city', 'area']
				});
			</script>
			<div class="address">
				<h3>收货人信息 </h3>
				<div class="delivery" id="fmUser_address">
						<ul>
							<li>
								<label for=""><span>*</span>收 货 人：</label>
								<input type="text" name="reciver" id="reciver" class="txt" />
								<span class="submitNotice"></span>
							</li>
							<li>
								<label for=""><span>*</span>所在地区：</label>
								<fieldset class="city_china">
									省份：<select class="province cxselect" disabled="disabled" name="province" data-required="true" id="province"></select>
									城市：<select class="city cxselect" disabled="disabled" name="city" id="city"></select>
									地区：<select class="area cxselect" disabled="disabled" name="area"></select>
								</fieldset>								
							</li>
							<li>
								<label for=""><span>*</span>详细地址：</label>
								<input type="text" name="detailAddress" id="detailAddress" class="txt address"  />
								<span class="submitNotice"></span>
							</li>
							<li>
								<label for=""><span>*</span>手机号码：</label>
								<input type="text" name="tel" class="txt" id="tel" />
								<span class="submitNotice"></span>
							</li>
							<li>
								<label for=""><span>*</span>邮箱：</label>
								<input type="text" name="email" class="txt" id="email" />
								<span class="submitNotice"></span>
							</li>
						</ul>
				</div>
			</div>
			<!-- 收货人信息  end-->
			<?php else: ?>
			<!-- 收货人信息  start-->
				<?php if(empty($allAddress)): ?><div class="address">
					<h3>暂时没有收货地址 <a href="javascript:;" id="add_address" >[添加]</a></h3>
						<form action="" class="none" name="address_form" id="address_form">
							<ul>
								<li>
									<label for=""><span>*</span>收 货 人：</label>
									<input type="text" name="name" class="txt" />
									<span></span>
								</li>
								<li>
									<label for=""><span>*</span>所在地区：</label>
									<fieldset class="city_china">
										省份：<select class="province cxselect" disabled="disabled" name="province" data-required="true" id="province"></select>
										城市：<select class="city cxselect" disabled="disabled" name="city" id="city"></select>
										地区：<select class="area cxselect" disabled="disabled" name="area" id="area"></select>
									</fieldset>
									<span></span>
								</li>
								<li>
									<label for=""><span>*</span>详细地址：</label>
									<input type="text" name="shr_address" class="txt address"  />
									<span></span>
								</li>
								<li>
									<label for=""><span>*</span>手机号码：</label>
									<input type="text" name="shr_phone" class="txt" id='tel'/>
									<span></span>
								</li>
								<li>
									<input type="hidden" name="addressid" value="0">
									<input type="hidden" name="id" value="<?php echo (session('fm_user_id')); ?>">
									<a href="javascript:;" class="confirm_btn"><span>保存收货人信息</span></a>
								</li>
							</ul>
						</form>		
				</div>
				<?php else: ?>
				<div class="address">
					<h3>收货人信息 <a href="javascript:;" id="address_modify">[修改]</a></h3>
					<div class="address_info">
						<p><?php echo ($default["shr_name"]); ?>  <?php echo ($default["shr_phone"]); ?> </p>
						<p><?php echo ($default["shr_province"]); ?> <?php echo ($default["shr_city"]); ?> <?php echo ($default["shr_area"]); ?> <?php echo ($default["shr_address"]); ?> </p>
					</div>

					<div class="address_select none">
						<ul>
							<?php if(is_array($allAddress)): $i = 0; $__LIST__ = $allAddress;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($i % 2 );++$i; if($address['id'] == $default['id']): ?><li class="cur">
								<input type="radio" name="address" checked="checked" />
							<?php else: ?>
							<li>
								<input type="radio" name="address"  /><?php endif; ?>
							<span><?php echo ($address["shr_name"]); ?></span><span> <?php echo ($address["shr_province"]); ?></span><span> <?php echo ($address["shr_city"]); ?></span><span> <?php echo ($address["shr_area"]); ?></span><span> <?php echo ($default["shr_address"]); ?></span><span> <?php echo ($address["shr_phone"]); ?> </span>
								<a href="javascript:;" onclick="setDefault(<?php echo ($address["id"]); ?>,<?php echo (session('fm_user_id')); ?>)">设为默认地址</a>
								<a href="javascript:;" onclick="modifyaddress(this,<?php echo ($address["id"]); ?>)">编辑</a>
								<a href="javascript:;" onclick="deladdress(this,<?php echo ($address["id"]); ?>,<?php echo (session('fm_user_id')); ?>)">删除</a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
							<li><input type="radio" name="address" class="new_address"  />使用新地址</li>
						</ul>	
						<form action="" class="none" name="address_form" id="address_form">
							<ul>
								<li>
									<label for=""><span>*</span>收 货 人：</label>
									<input type="text" name="name" class="txt" />
									<span></span>
								</li>
								<li>
									<label for=""><span>*</span>所在地区：</label>
									<fieldset class="city_china">
										省份：<select class="province cxselect" disabled="disabled" name="province" data-required="true" id="province"></select>
										城市：<select class="city cxselect" disabled="disabled" name="city" id="city"></select>
										地区：<select class="area cxselect" disabled="disabled" name="area" id="area"></select>
									</fieldset>
								</li>
								<li>
									<label for=""><span>*</span>详细地址：</label>
									<input type="text" name="shr_address" class="txt address"  />
									<span></span>
								</li>
								<li>
									<label for=""><span>*</span>手机号码：</label>
									<input type="text" name="shr_phone" class="txt" id='tel'/>
									<span></span>
								</li>
								<li>
									<input type="hidden" name="addressid" value="0">
									<input type="hidden" name="id" value="<?php echo (session('fm_user_id')); ?>">
									<a href="javascript:;" class="confirm_btn"><span>保存收货人信息</span></a>
								</li>
							</ul>
						</form>						
					</div>
				</div><?php endif; ?>
				<!-- 收货人信息  end--><?php endif; ?>
			<!-- 支付方式  start-->
			<div class="pay">
				<h3>支付方式</h3>
				<div class="pay_select">
					<table> 
						<tr>
							<td class="col1"><input type="radio" name="pay" value="1" />货到付款</td>
							<td class="col2">送货上门后再收款，支持现金、POS机刷卡、支票支付</td>
						</tr>
						<tr  class="cur">
							<td class="col1"><input type="radio" name="pay" checked value="2"/>在线支付</td>
							<td class="col2">即时到帐，支持绝大数银行借记卡及部分银行信用卡</td>
						</tr>
						<tr>
							<td class="col1"><input type="radio" name="pay" value="3"/>上门自提</td>
							<td class="col2">自提时付款，支持现金、POS刷卡、支票支付</td>
						</tr>
					</table>
				</div>
			</div>
			<!-- 支付方式  end-->
			<form action="#" name="orderinfo" id="orderinfo">
				<input type="hidden" name="curAddress" value="<?php echo ($default["id"]); ?>">
				<input type="hidden" name="curPayMethod" value="2">
			</form>
			<!-- 商品清单 start -->
			<div class="goods">
				<h3>商品清单</h3>
				<table>
					<thead>
						<tr>
							<th class="col1">商品</th>
							<th class="col2">规格</th>
							<th class="col3">单价</th>
							<th class="col4">数量</th>
							<th class="col5">小计</th>
						</tr>	
					</thead>
					<tbody>
						<?php if(is_array($goodsData)): $i = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
							<td class="col1"><a href=""><img src="<?php echo (URL); ?>Public/<?php echo ($data["goods"]["goods_mid_img"]); ?>" alt="" /></a>  <strong><a href=""><?php echo ($data["goods"]["goods_name"]); ?></a></strong></td>
							<td class="col2"> 
							<p>身高：<?php echo ($data["userheight"]); ?></p>
							<p>体重：<?php echo ($data["userweight"]); ?>斤</p> 
							<p>尺码：<?php echo ($data["goods_size"]); ?></p> 
							</td>
							<td class="col3">￥<?php echo ($data["goods"]["goods_price"]); ?>.00</td>
							<td class="col4"><?php echo ($data["amount"]); ?></td>
							<td class="col5"><span>￥<?php echo $data['amount']*$data['goods']['goods_price']; ?>.00</span></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5">
								<ul>
									<li>
										<span> 件商品，总商品金额：</span>
										<em><?php echo ($totalPrice); ?>.00￥</em>
									</li>
									<li>
										<span>运费：</span>
										<em>￥0</em>
									</li>
									<li>
										<span>应付总额：</span>
										<em><?php echo ($totalPrice); ?>.00￥</em>
									</li>
								</ul>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- 商品清单 end -->
		
		</div>

		<div class="fillin_ft">
			<a href="javascript:;" id="check_address"><span>提交订单</span></a>
			<p>应付总额：<strong><?php echo ($totalPrice); ?>.00￥元</strong></p>
			
		</div>
	</div>
	<!-- 主体部分 end -->
				
	<div style="clear:both;"></div>

 <!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<div class="bnav1">
			<h3><b></b> <em>购物指南</em></h3>
			<ul>
				<li><a href="">购物流程</a></li>
				<li><a href="">会员介绍</a></li>
				<li><a href="">团购/机票/充值/点卡</a></li>
				<li><a href="">常见问题</a></li>
				<li><a href="">大家电</a></li>
				<li><a href="">联系客服</a></li>
			</ul>
		</div>
		
		<div class="bnav2">
			<h3><b></b> <em>配送方式</em></h3>
			<ul>
				<li><a href="">上门自提</a></li>
				<li><a href="">快速运输</a></li>
				<li><a href="">特快专递（EMS）</a></li>
				<li><a href="">如何送礼</a></li>
				<li><a href="">海外购物</a></li>
			</ul>
		</div>

		
		<div class="bnav3">
			<h3><b></b> <em>支付方式</em></h3>
			<ul>
				<li><a href="">货到付款</a></li>
				<li><a href="">在线支付</a></li>
				<li><a href="">分期付款</a></li>
				<li><a href="">邮局汇款</a></li>
				<li><a href="">公司转账</a></li>
			</ul>
		</div>

		<div class="bnav4">
			<h3><b></b> <em>售后服务</em></h3>
			<ul>
				<li><a href="">退换货政策</a></li>
				<li><a href="">退换货流程</a></li>
				<li><a href="">价格保护</a></li>
				<li><a href="">退款说明</a></li>
				<li><a href="">返修/退换货</a></li>
				<li><a href="">退款申请</a></li>
			</ul>
		</div>

		<div class="bnav5">
			<h3><b></b> <em>特色服务</em></h3>
			<ul>
				<li><a href="">夺宝岛</a></li>
				<li><a href="">DIY装机</a></li>
				<li><a href="">延保服务</a></li>
				<li><a href="">家电下乡</a></li>
				<li><a href="">京东礼品卡</a></li>
				<li><a href="">能效补贴</a></li>
			</ul>
		</div>
	</div>
	<!-- 底部导航 end -->

	<div style="clear:both;"></div>
	<!-- 底部版权 start -->
	<div class="footer w1210 bc mt10">
		<p class="links">
			<a href="">关于我们</a> |
			<a href="">联系我们</a> |
			<a href="">人才招聘</a> |
			<a href="">商家入驻</a> |
			<a href="">千寻网</a> |
			<a href="">奢侈品网</a> |
			<a href="">广告服务</a> |
			<a href="">移动终端</a> |
			<a href="">友情链接</a> |
			<a href="">销售联盟</a> |
			<a href="">京西论坛</a>
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