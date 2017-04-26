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
					<li><a href="/Home/User/register/navType/1" class="navType">系列</a></li>
					<li><a href="/Home/User/register/navType/2" class="navType">品牌</a></li>
					<li><a href="/Home/User/register/navType/3" class="navType">服务</a></li>
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
 	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>login.css" type="text/css">
	<script type="text/javascript">

	$(function(){
		$('#changeImg').click(function(){
			$('#verifyImg').attr("src","/Home/User/verifyImg");
		});
		var checkName=false;
		var checkEmail=false;
		//判断该用户名是否被注册过
		$("#registeForm input[name='username']").focus(function(){			
			var nameObj=$(this);
			$(this).blur(function(){
				var username=$.trim(nameObj.val());
				$.ajax({
					type:"post",
					dataType:'json',
					data:{"data":"name","value":username},
					url:"/Home/User/IsExit",
					success:function(data){
						if(data["isOk"] !=0)
						{
							checkName=false;
							$("#regist_btn").unbind( "click" );
							$("#registeForm input[name='username']").css('border',"1px solid #EE0000")
							$("#registeForm input[name='username']").next().html("该用户名已被注册").css('color','#EE0000').css('display','block');
						}
						else
						{
							var userName=$("#registeForm input[name='username']").val();
							var un_regex = new RegExp("^([\u4E00-\uFA29]|[\uE7C7-\uE7F3]|[a-zA-Z0-9_]){3,20}$"); 
							if(!un_regex.test(userName))
							{
								checkName=false;
								$("#regist_btn").unbind( "click" );
								$("#registeForm input[name='username']").css('border',"1px solid #EE0000")
								$("#registeForm input[name='username']").next().html("3-20位字符，可由中文、字母、数字和下划线组成").css('color','#EE0000');
							}
							else
							{
								$("#registeForm input[name='username']").css('border',"1px solid #5AB73B");
								$("#registeForm input[name='username']").next().css('display','none');
								checkName=true;
								if(checkName && checkEmail)
								{
									$("#regist_btn").bind("click",function(){
										checkSubmit();
									});
								}

							}
						}
					}
				});
			});
		});
		//判断某个邮箱是否已经被注册过
		$("#registeForm input[name='email']").focus(function(){			
			var emailObj=$(this);
			$(this).blur(function(){
				var email=$.trim(emailObj.val());
				$.ajax({
					type:"post",
					dataType:'json',
					data:{"data":"email","value":email},
					url:"/Home/User/IsExit",
					success:function(data){
						if(data["isOk"] !=0)
						{
							checkEmail=false;
							$("#regist_btn").unbind( "click" );
							$("#registeForm input[name='email']").css('border',"1px solid #EE0000")
							$("#registeForm input[name='email']").next().html("该邮箱已被注册").css('color','#EE0000').css('display','block');
						}
						else
						{
							//邮箱验证
							var email_regex = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
							var email=$("#registeForm input[name='email']").val();
							if(!email_regex.test(email))
							{
								checkEmail=false;
								$("#regist_btn").unbind( "click" );
								$("#registeForm input[name='email']").css('border',"1px solid #EE0000");
								$("#registeForm input[name='email']").next().html("请输入正确的邮箱").css('display','block').css('color','#EE0000');
							}
							else
							{
								$("#registeForm input[name='email']").css('border',"1px solid #5AB73B");
								$("#registeForm input[name='email']").next().css('display','none');
								checkEmail=true;
								if(checkName && checkEmail)
								{
									$("#regist_btn").bind("click",function(){
										checkSubmit();
									});
								}
							}
						}
					}
				});
			});
		});
		function checkSubmit(){
			//验证用户名
			var isSubmit=true;
			var userName=$("#registeForm input[name='username']").val();
			var un_regex = new RegExp("^([\u4E00-\uFA29]|[\uE7C7-\uE7F3]|[a-zA-Z0-9_]){3,20}$"); 
			if(!un_regex.test(userName))
			{
				isSubmit=false;
				$("#registeForm input[name='username']").css('border',"1px solid #EE0000")
				$("#registeForm input[name='username']").next().css('color','#EE0000');
			}
			else
			{
				$("#registeForm input[name='username']").css('border',"1px solid #5AB73B");
				$("#registeForm input[name='username']").next().css('display','none');
			}
			//验证密码
			var password=$("#registeForm input[name='password']").val();
			var ps_regex = new RegExp("^([a-zA-Z0-9_]){6,20}$"); 
			if(!ps_regex.test(password))
			{
				isSubmit=false;
				$("#registeForm input[name='password']").css('border',"1px solid #EE0000")
				$("#registeForm input[name='password']").next().css('color','#EE0000');
			}
			else
			{
				$("#registeForm input[name='password']").css('border',"1px solid #5AB73B");
				$("#registeForm input[name='password']").next().css('display','none');
			}
			//确认密码
			var wpassword=$("#registeForm input[name='wpassword']").val();
			if($.trim(wpassword)=='' || $.trim(wpassword) !=$.trim(password))
			{
				isSubmit=false;
				$("#registeForm input[name='wpassword']").css('border',"1px solid #EE0000");
				$("#registeForm input[name='wpassword']").next().css('display','block').css('color','#EE0000');
			}
			else
			{
				$("#registeForm input[name='wpassword']").css('border',"1px solid #5AB73B");
				$("#registeForm input[name='wpassword']").next().css('display','none');
			}
			//邮箱验证
			var email_regex = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
			var email=$("#registeForm input[name='email']").val();
			if(!email_regex.test(email))
			{
				isSubmit=false;
				$("#registeForm input[name='email']").css('border',"1px solid #EE0000");
				$("#registeForm input[name='email']").next().css('display','block').css('color','#EE0000');
			}
			else
			{
				$("#registeForm input[name='email']").css('border',"1px solid #5AB73B");
				$("#registeForm input[name='email']").next().css('display','none');
			}
			//验证码
			var checkcode=$("#registeForm input[name='checkcode']").val();
			if($.trim(checkcode)=='')
			{
				isSubmit=false;
				$("#registeForm input[name='checkcode']").css('border',"1px solid #EE0000");
			}
			else
			{
				$("#registeForm input[name='checkcode']").css('border',"1px solid #5AB73B");
			}
			//提交表单
			if(isSubmit)
			{
				$("#registeForm").attr("action","/Home/user/regist").submit();
			}		
		};

	});
	</script>
	<!-- 登录主体部分start -->
	<div class="login w990 bc mt10 regist">
		<div class="login_hd">
			<h2>用户注册</h2>
			<b></b>
		</div>
		<div class="login_bd">
			<div class="login_form fl">
				<form action="" method="post" id="registeForm">
					<ul>
						<li>
							<label for="">用户名：</label>
							<input type="text" class="txt" name="username" placeholder="用户名"/>
							<p>3-20位字符，可由中文、字母、数字和下划线组成</p>
						</li>
						<li>
							<label for="">密码：</label>
							<input type="password" class="txt" name="password"  placeholder="密码"/>
							<p>6-20位字符，可使用字母、数字和符号的组合，不建议使用纯数字、纯字母、纯符号</p>
						</li>
						<li>
							<label for="">确认密码：</label>
							<input type="password" class="txt" name="wpassword"  placeholder="确认密码"/>
							<p style="display:none">请再次输入密码</p>
						</li>
						<li>
							<label for="">邮箱：</label>
							<input type="text" class="txt" name="email"  placeholder="邮箱"/>
							<p style="display:none">请输入正确的邮箱</p>
						</li>
						<li class="checkcode">
							<label for="">验证码：</label>
							<input type="text"  name="checkcode"  placeholder="验证码"/>
							<img src="/Home/User/verifyImg" alt="" id="verifyImg" onclick="this.src='/Home/User/verifyImg?'+Math.random()"/>
							<span>看不清？<a href="javascript:;" id="changeImg">换一张</a></span>
						</li>
						<li>
							<label for="">&nbsp;</label>
							<input type="checkbox" class="chb" checked="checked" /> 我已阅读并同意<a href="">《用户注册协议》
						</li>
						<li>
							<label for="">&nbsp;</label>
							<a href="javascript:;"  id="regist_btn"></a>
						</li>
					</ul>
				</form>

				
			</div>
			
		</div>
	</div>
	<!-- 登录主体部分end -->
 <!-- 底部导航 start -->
	<div class="bottomnav w1210 bc mt10">
		<?php if(is_array($footers)): $i = 0; $__LIST__ = $footers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$footer): $mod = ($i % 2 );++$i;?><div class="bnav<?php echo ($i); ?>">
			<h3><b></b> <em><?php echo ($footer["first"]["name"]); ?></em></h3>
			<ul>
				<?php if(is_array($footer["second"])): $i = 0; $__LIST__ = $footer["second"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ftsecond): $mod = ($i % 2 );++$i;?><li><a href="/Home/<?php echo ($footer["first"]["cname"]); ?>/<?php echo ($ftsecond["cname"]); ?>.html"><?php echo ($ftsecond["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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