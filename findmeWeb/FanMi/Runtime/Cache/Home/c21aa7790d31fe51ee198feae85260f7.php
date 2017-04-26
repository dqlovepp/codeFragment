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
					<li><a href="/Home/Products/goods/navType/1" class="navType">系列</a></li>
					<li><a href="/Home/Products/goods/navType/2" class="navType">品牌</a></li>
					<li><a href="/Home/Products/goods/navType/3" class="navType">服务</a></li>
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
 	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>goods.css" type="text/css">
	<link rel="stylesheet" href="<?php echo (APP_HOME_STYLE); ?>etalage.css" type="text/css">
	<script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>jquery.etalage.min.js"></script>
	<script type="text/javascript" src="<?php echo (FM_HOME_JS); ?>goods.js"></script>
	<!-- 商品页面主体 start -->
	<div class="main w1210 mt10 bc">
		<!-- 当前位置 start -->
		<div class="breadcrumb">
			<h2>当前位置：<a href="/Home/Home/index.html">首页</a> > <a href="/Home/Home/index.html">系列</a> > <a href="/Home/Products/goodsList/catalog/<?php echo ($curNav["nav_id"]); ?>.html"><?php echo ($curNav["nav_name"]); ?></a> > 衣服</h2>
		</div>
		<!-- 当前位置 start -->

		<!--商品展示 start-->
		<div id="goodsinfo">
			<!--滚动展示 start-->
			 <div class="pro_pic">
       			 <ul id="etalage" class="etalage" >
       				<?php if(is_array($goodsPicinfo)): $i = 0; $__LIST__ = $goodsPicinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$images): $mod = ($i % 2 );++$i;?><li>
						<img class="etalage_thumb_image" src="http://www.findme.wang/Public/<?php echo ($images["undeal_img"]); ?>"/>
						<img class="etalage_source_image" src="http://www.findme.wang/Public/<?php echo ($images["undeal_img"]); ?>" title="当前商品：商品名字" />
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
       			</ul>
       		</div>
			<!--滚动展示 end-->
			<!--商品基本信息区域 start-->
			<div class="goods_baseinfo">
				<ul>
					<li class="goods_name"><?php echo ($goodsinfo["goods_name"]); ?></li>
					<li class="market_price"><span>定价：</span><em>￥<?php echo ($goodsinfo["goods_market_price"]); ?></em></li>
					<li class="shop_price"><span>本店价：</span> <strong>￥<?php echo ($goodsinfo["goods_price"]); ?></strong> </li>
					<li><span>上架时间：</span><?php echo ($goodsinfo["goods_create_time"]); ?></li>
					<form action="/Home/Cart/buynow" method="post" class="choose" id="buyCurGoods">
					<input type="hidden" name="goods_id" value="<?php echo ($goodsinfo["goods_id"]); ?>" >
					<input type="hidden" name="goods_price" value="<?php echo ($goodsinfo["goods_price"]); ?>" >
					<li>
						<dl>
							<dt>身高：</dt>
							<dd>
								<select name="userheight" class="userHeight" id="userHeight">
									<option value="">请选择身高</option>
									<?php $__FOR_START_32451__=1.2;$__FOR_END_32451__=2.6;for($height=$__FOR_START_32451__;$height < $__FOR_END_32451__;$height+=0.1){ ?><option value="<?php echo ($height); ?>"><?php echo ($height); ?> m</option><?php } ?>
								</select>
								<span class="submitNotice"></span>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>体重：</dt>
							<dd>
								<select name="userweight" class="userweight" id="userweight">
								<option value="">请选择体重</option>
								<?php $__FOR_START_4928__=60;$__FOR_END_4928__=260;for($weight=$__FOR_START_4928__;$weight < $__FOR_END_4928__;$weight+=5){ ?><option value="<?php echo ($weight); ?>"><?php echo ($weight); ?> 斤</option><?php } ?>
								</select>
								<span class="submitNotice"></span>
							</dd>
						</dl>
					</li>			
					<li class="product">
						<dl>
							<dt>尺码：</dt>
							<dd>
							<a class="selected" href="javascript:;">S <input type="radio" name="goods_size" value="S" checked="checked" /></a>
							<a href="javascript:;">M <input type="radio" name="goods_size" value="M" /></a>
							<a href="javascript:;">XL <input type="radio" name="goods_size" value="XL" /></a>
							<a href="javascript:;">L <input type="radio" name="goods_size" value="L" /></a>
							</dd>
						</dl>
					</li>
					<li>
						<dl>
							<dt>购买数量：</dt>
							<dd>
								<a href="javascript:;" id="reduce_num"></a>
								<input type="text" name="amount" value="1" class="amount"/>
								<a href="javascript:;" id="add_num"></a>
							</dd>
						</dl>
					</li>
					<li>
						<input type="submit" value="" class="buy_now" />
						<input type="button" value="" class="add_btn" id="add_btn" />					
					</li>	
					</form>	
					<li class="goodsNotice">
						<dd><span>定制周期：</span>款到后3天发货（定货信息有变更者除外）</dd>
						<dd><span>售后政策：</span>收到货7天内可重做或退货</dd>
						<dd><span>运输政策：</span>大陆地区免运费</dd>
					</li>
				</ul>
			</div>
		
			<!--商品基本信息区域 end-->
		</div>
		<!--商品展示 end-->
	</div>
	<div style="clear:both"></div>
<link rel="stylesheet" type="text/css" href="<?php echo (URL); ?>Public/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo (URL); ?>Public/easyui/themes/icon.css">
<script src="<?php echo (URL); ?>Public/easyui/locale/easyui-lang-zh_CN.js"  charset="UTF-8"></script>
<script src="<?php echo (URL); ?>Public/easyui/jquery.easyui.min.js"  charset="UTF-8"></script>
	<div id="dlg"  title="友情提示"  style="top:660px;left:500px;">
		<div class="bodyarea">
			<ul>
				<li class="headarea"><a href="javascript:;" class="ldq_closeButton" onclick="$('#dlg').dialog('close')"></a></li>
				<li class="bodynotice">
					<table cellspacing="0" cellpadding="0" border="0">
						<tr>
							<td><div class="ldq_easyOkNotice"></div></td>
							<td>商品已经成功添加到购物车</td>
						</tr>
					</table>
				</li>
				<li class="goCart"><a href="/Home/Cart/lst">去购物车结账</a></li>
			</ul>
		</div>
	</div>
<script>
//商品提交时候验证
 $("#buyCurGoods").submit(function(){
       return  checkSubmit();
    });
 //商品添加到购物车
    $('#add_btn').click(function(){

        //1.判断该选择的是否以及选择过来
        if(checkSubmit())
        {
           //2.提交到相应的地方
           $.ajax({
            type:"post",
            datatype:"json",
            data:$("#buyCurGoods").serialize(),
            url:"/Home/Cart/addToCart",
            success:function(data){
                if(data['isOk'] !=0)
                {
                	$('#dlg').dialog('open');
			         //更新购物车
			    	updatewebPageCart();
                }            
            },
            error:function(){

            }
           });
            
        }      
    });
</script>
<div style="clear:both"></div>
			<!-- 商品详情 start -->
			<div class="detail">
				<div class="detail_hd">
					<ul>
						<li class="on"><span>商品介绍</span></li>
						<li><span>商品评价</span></li>
						<li><span>售后保障</span></li>
					</ul>
				</div>
				<div class="detail_bd">
					<!-- 商品介绍 start -->
					<div class="introduce detail_div">
						<div class="attr mt15">
							<ul>
								<li><span>商品名称：</span><?php echo ($goodsinfo["goods_name"]); ?></li>
								<li><span>商品编号：</span><?php echo ($goodsinfo["goods_sn"]); ?></li>
								<li><span>上架时间：</span><?php echo ($goodsinfo["goods_create_time"]); ?></li>
								<li><span>商品毛重：</span><?php echo ($goodsinfo["goods_weight"]); ?>kg</li>
							</ul>
						</div>

						<div class="desc mt10">
							<?php echo html_entity_decode($goodsinfo['goods_desc']); ?>
						</div>
					</div>
					<!-- 商品介绍 end -->
					
					<!-- 商品评论 start -->
					<div class="comment detail_div mt10 none">
						<div class="comment_summary">
							<div class="rate fl">
								<strong><em>90</em>%</strong> <br />
								<span>好评度</span>
							</div>
							<div class="percent fl">
								<dl>
									<dt>好评（90%）</dt>
									<dd><div style="width:90px;"></div></dd>
								</dl>
								<dl>
									<dt>中评（5%）</dt>
									<dd><div style="width:5px;"></div></dd>
								</dl>
								<dl>
									<dt>差评（5%）</dt>
									<dd><div style="width:5px;" ></div></dd>
								</dl>
							</div>
							<div class="buyer fl">
								<dl>
									<dt>买家印象：</dt>
									<dd><span>屏幕大</span><em>(1953)</em></dd>
									<dd><span>外观漂亮</span><em>(786)</em></dd>
									<dd><span>系统流畅</span><em>(1091)</em></dd>
									<dd><span>功能齐全</span><em>(1109)</em></dd>
									<dd><span>反应快</span><em>(659)</em></dd>
									<dd><span>分辨率高</span><em>(824)</em></dd>
								</dl>
							</div>
						</div>

						<div class="comment_items mt10">
							<div class="user_pic">
								<dl>
									<dt><a href=""><img src="images/user1.gif" alt="" /></a></dt>
									<dd><a href="">乖乖</a></dd>
								</dl>
							</div>
							<div class="item">
								<div class="title">
									<span>2013-03-11 22:18</span>
									<strong class="star star5"></strong> <!-- star5表示5星级 start4表示4星级，以此类推 -->
								</div>
								<div class="comment_content">
									<dl>
										<dt>心得：</dt>
										<dd>东西挺好，挺满意的！</dd>
									</dl>
									<dl>
										<dt>优点：</dt>
										<dd>反应速度开，散热性能好</dd>
									</dl>
									<dl>
										<dt>不足：</dt>
										<dd>暂时还没发现缺点哦！</dd>
									</dl>
									<dl>
										<dt>购买日期：</dt>
										<dd>2013-11-24</dd>
									</dl>
								</div>
								<div class="btns">
									<a href="" class="reply">回复(0)</a>
									<a href="" class="useful">有用(0)</a>
								</div>
							</div>
							<div class="cornor"></div>
						</div>

						<div class="comment_items mt10">
							<div class="user_pic">
								<dl>
									<dt><a href=""><img src="images/user2.jpg" alt="" /></a></dt>
									<dd><a href="">小宝贝</a></dd>
								</dl>
							</div>
							<div class="item">
								<div class="title">
									<span>2013-10-01 14:10</span>
									<strong class="star star4"></strong> <!-- star5表示5星级 start4表示4星级，以此类推 -->
								</div>
								<div class="comment_content">
									<dl>
										<dt>心得：</dt>
										<dd>外观漂亮同，还在使用过程中。</dd>
									</dl>
									<dl>
										<dt>型号：</dt>
										<dd>i5 8G内存版</dd>
									</dl>
									<dl>
										<dt>购买日期：</dt>
										<dd>2013-11-20</dd>
									</dl>
								</div>
								<div class="btns">
									<a href="" class="reply">回复(0)</a>
									<a href="" class="useful">有用(0)</a>
								</div>
							</div>
							<div class="cornor"></div>
						</div>

						<div class="comment_items mt10">
							<div class="user_pic">
								<dl>
									<dt><a href=""><img src="images/user3.jpg" alt="" /></a></dt>
									<dd><a href="">天使</a></dd>
								</dl>
							</div>
							<div class="item">
								<div class="title">
									<span>2013-03-11 22:18</span>
									<strong class="star star5"></strong> <!-- star5表示5星级 start4表示4星级，以此类推 -->
								</div>
								<div class="comment_content">
									<dl>
										<dt>心得：</dt>
										<dd>挺好的，物超所值，速度挺好，WIN8用起来也不错。</dd>
									</dl>
									<dl>
										<dt>优点：</dt>
										<dd>散热很好，配置不错</dd>
									</dl>
									<dl>
										<dt>不足：</dt>
										<dd>暂时还没发现缺点哦！</dd>
									</dl>
									<dl>
										<dt>购买日期：</dt>
										<dd>2013-11-24</dd>
									</dl>
								</div>
								<div class="btns">
									<a href="" class="reply">回复(0)</a>
									<a href="" class="useful">有用(0)</a>
								</div>
							</div>
							<div class="cornor"></div>
						</div>

						<!-- 分页信息 start -->
						<div class="page mt20">
							<a href="">首页</a>
							<a href="">上一页</a>
							<a href="">1</a>
							<a href="">2</a>
							<a href="" class="cur">3</a>
							<a href="">4</a>
							<a href="">5</a>
							<a href="">下一页</a>
							<a href="">尾页</a>
						</div>
						<!-- 分页信息 end -->

						<!--  评论表单 start-->
						<div class="comment_form mt20">
							<form action="">
								<ul>
									<li>
										<label for=""> 评分：</label>
										<input type="radio" name="grade"/> <strong class="star star5"></strong>
										<input type="radio" name="grade"/> <strong class="star star4"></strong>
										<input type="radio" name="grade"/> <strong class="star star3"></strong>
										<input type="radio" name="grade"/> <strong class="star star2"></strong>
										<input type="radio" name="grade"/> <strong class="star star1"></strong>
									</li>

									<li>
										<label for="">评价内容：</label>
										<textarea name="" id="" cols="" rows=""></textarea>
									</li>
									<li>
										<label for="">&nbsp;</label>
										<input type="submit" value="提交评论"  class="comment_btn"/>										
									</li>
								</ul>
							</form>
						</div>
						<!--  评论表单 end-->
						
					</div>
					<!-- 商品评论 end -->

					<!-- 售后保障 start -->
					<div class="after_sale mt15 none detail_div">
						<div>
							<p>本产品全国联保，享受三包服务，质保期为：一年质保 <br />如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！</p>
							<p>售后服务电话：800-898-9006 <br />品牌官方网站：http://www.lenovo.com.cn/</p>

						</div>

						<div>
							<h3>服务承诺：</h3>
							<p>本商城向您保证所售商品均为正品行货，京东自营商品自带机打发票，与商品一起寄送。凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。本商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！</p> 
							
							<p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>

						</div>
						
						<div>
							<h3>权利声明：</h3>
							<p>本商城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东商城重要的经营资源，未经许可，禁止非法转载使用。</p>
							<p>注：本站商品信息均来自于厂商，其真实性、准确性和合法性由信息拥有者（厂商）负责。本站不提供任何保证，并不承担任何法律责任。</p>

						</div>
					</div>
					<!-- 售后保障 end -->

				</div>
			</div>
			<!-- 商品详情 end -->
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