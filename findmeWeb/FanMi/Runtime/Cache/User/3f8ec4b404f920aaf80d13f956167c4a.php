<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="职业装,fanmi,衣服,泛米网,网购">
<title>泛米网</title>
<link href="<?php echo (APP_HOME_STYLE); ?>fanmi_index.css" rel="stylesheet" type="text/css">
<link href="<?php echo (APP_HOME_STYLE); ?>fanmi_content.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo (APP_COMMON_JS); ?>jquery-1.9.1.js"></script>
<script type="text/javascript">
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
	});
 function toLogin()
 {   
   var A=window.open("oauth/index.php","TencentLogin", 
   "width=450,height=320,menubar=0,scrollbars=1,
   resizable=1,status=1,titlebar=0,toolbar=0,location=1");
 } 
</script>
</head>
<body>
<div id="header_cont">
	<div id="header_box">
	<div id="header_Area">
		<div class="header_left">
			<ul>
				<li>亲，欢迎访问泛米网</li>
				<li><a href="" target="" class="user-login">请登录</a></li>
				<li><a href="" target="" class="user-register">免费注册</a></li>
				<li><a href="javascript:;" target="" class="QQ-login"   onclick='toLogin()'><img src="<?php echo (APP_HOME_IMG); ?>QQlogo.png" height="26px"></a></li>
			</ul>
		</div>
		<div class="header_right">
			<ul>
				<li><a href="" target="" class="purchase-cat">购物车</a></li>
				<li><a href="" target="" class="purchase-order">我的订单</a></li>
				<li>
				<div>
				<a href="javascript:;"  id="customer-help">客服服务</a>
				<div id="Customer-service" class="header-secondLevel">
					<div><a href="" target="">帮助中心</a></div>
					<div><a href="" target="">在线服务</a></div>
					<div><a href="" target="">售后服务</a></div>
					<div><a href="" target="">投诉中心</a></div>
				</div>
				</li>
			</ul>
		</div>
	</div>
	</div>
	<div id="webLogo">
		<a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>webName.png" width="200px" height="100px" border="0"></a>
	</div>
	<!--navigator-->
	<div class="navigator-type">
		<ul>
			<li><a href="/web/User/Index/index/navType/1">系列</a></li>
			<li><a href="/web/User/Index/index/navType/2">品牌</a></li>
			<li><a href="/web/User/Index/index/navType/3">服务</a></li>
		</ul>
	</div>
	<div id="navigator-box">
		<div class="navigator-title" style="width:<?php echo ($navWidth); ?>px">
			<ul>
				<?php if(is_array($navinfo)): foreach($navinfo as $key=>$list): if($list["number"] == 'index' ): ?><li><a href="__MODEL__/" class="activeNav" id="nav-index" style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li>
					<?php else: ?>
						<li><a href=""  style="width:<?php echo ($list["width"]); ?>px"><?php echo ($list["name"]); ?></a></li><?php endif; endforeach; endif; ?>
			</ul>
		</div>
	</div>
</div>
 <div id='main_content'>
	<div id="wrapper_box">
		<ul id="wrapper_imgs">
			<li><a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>a.png" width="1400px" height="600px" border="0"></a></li>
			<li><a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>b.jpg" width="1400px" height="600px" border="0"></a></li>
			<li><a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>a.png" width="1400px" height="600px" border="0"></a></li>
			<li><a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>b.jpg" width="1400px" height="600px" border="0"></a></li>
			<li><a href="" target=""><img src="<?php echo (APP_HOME_IMG); ?>a.png" width="1400px" height="600px" border="0"></a></li>
		</ul>
		<div id="dot-wrapper">
			<ul>
				<li><a href="javascript:;" class="cur-dot-wrapper-a" index=1></a></li>
				<li><a href="javascript:;" class="dot-wrapper-a" index=2></a></li>
				<li><a href="javascript:;" class="dot-wrapper-a" index=3></a></li>
				<li><a href="javascript:;" class="dot-wrapper-a" index=4></a></li>
				<li><a href="javascript:;" class="dot-wrapper-a" index=5></a></li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#dot-wrapper a').each(function(){
		$(this).click(function(){
			var setleft=-($(this).attr('index')-1)*1400;
			var curLeft=parseInt($('#wrapper_imgs').css('left'));
			if((curLeft-setleft)>1400)
			{
				var tiaozhen=setleft+1400+'px';
				$('#wrapper_imgs').css('left',tiaozhen);
			}
			else if((setleft-curLeft)>1400)
			{

				var tiaozhen=setleft-1400+'px';
				$('#wrapper_imgs').css('left',tiaozhen);

			}
			var nextLeft=setleft+'px';

			$('#wrapper_imgs').animate({left:nextLeft},1000);
			$('#dot-wrapper a').each(function(){
			$(this).removeClass().addClass("dot-wrapper-a");
			});
			$(this).removeClass().addClass("cur-dot-wrapper-a");
		});
	});
</script>
 <div id="app_footerBox">
		<div id="footer_cont">
			<ul>
				<li id="certifyinfo">				 
		            <div class="info_text">
		                <p>营业执照注册号：<a href="" target="_blank">330106000129004</a></p>
		                <p>业务经营许可证：<a href="" target="_blank">浙B2-20110349</a></p>
		                <p>ICP备案号：鄂ICP备</p>
		                <p class="mgjhostname" title="">©2014 ******.com&nbsp;泛米网络有限公司</p>
		            </div>
				</li>
				<li class="link_company">
					<dl>
			           <dt>公司</dt>
			           <dd><a href="" target="_blank">关于我们</a></dd>
			           <dd><a href="" target="_blank">招聘信息</a></dd>
			           <dd><a href="" target="_blank">联系我们</a></dd>
			        </dl>
				</li>
				<li class="link_consumer">
					<dl>
			           <dt>消费者</dt>
			           <dd><a href="" target="_blank">帮助中心</a></dd>
			           <dd><a href="" target="_blank">意见反馈</a></dd>
			           <dd><a href="" target="_blank">手机版下载</a></dd>
			        </dl>
				</li>
				<li class="link_produce">
					<dl>
			           <dt>商家</dt>
			           <dd><a href="" target="_blank">帮助中心</a></dd>
			           <dd><a href="" target="_blank">商家培训</a></dd>
			           <dd><a href="" target="_blank">商家招募</a></dd>
			        </dl>
				</li>
				<li class="link_safe">
					<dl>
			           <dt>权威认证</dt>
			           <dd>
			              <a class="pc" href="" target="_blank"></a>
			              <a class="pa" href="" target="_blank"></a>
			              <a class="kx" href="" target="_blank"></a>
			            </dd>
			        </dl>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>