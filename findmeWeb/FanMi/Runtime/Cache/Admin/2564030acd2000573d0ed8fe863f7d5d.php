<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>泛米管理中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo (FM_ADMIN_CSS); ?>general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (FM_ADMIN_CSS); ?>main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.top{clear:both; height:76px; width:100%;}
.main{clear: both; width: 100%;  height: auto;}
.main ul{list-style: none; height: auto;}
#mainLeft{float: left;vertical-align: top; width:180px; height: auto;}
#mainRight{float: left;vertical-align: top; width: auto; height: auto; overflow: hidden;}
#footer {
  clear: both;
  background: #F4FaFb;
  border: 1px solid #BBDDE5;
  padding: 15px;
  color: #9CACAF;
  margin-top: 10px;
  text-align: center;
  width: 100%;
}
</style>
<script type="text/javascript" src="<?php echo (APP_COMMON_JS); ?>jquery-1.9.1.js"></script>
<script type="text/javascript">
$(function(){
	var mainRight=document.getElementById('mainRight');
	var mainLeft=document.getElementById('mainLeft');
	mainRight.style.width=document.documentElement.clientWidth-mainLeft.offsetWidth-60+'px';
});
 window.onresize=function(){  
  	var mainRight=document.getElementById('mainRight');
	var mainLeft=document.getElementById('mainLeft');
	mainRight.style.width=document.documentElement.clientWidth-mainLeft.offsetWidth-60+'px';
  }  
</script>
</head>
<body style="background-color:#278296;margin:0; padding:0; border:0">
<div class="top">
	 <style type="text/css">
#header-div {
  background:#278296;
  border-bottom:1px solid #FFF;
}

#logo-div {
  height:50px;
  float:left;
}

#submenu-div {
  height:50px;
}

#submenu-div ul {
  margin:3px 20px 0 0;
  padding:0;
  float:right;
  list-style-type:none;
}

#submenu-div li {
  float:left;
  padding:0 10px;
  margin:3px 0;
  border-right:1px solid #FFF;
}

#submenu-div a:visited, #submenu-div a:link {
  color:#FFF;
  text-decoration:none;
}

#submenu-div a:hover {
  color:#F5C29A;
}

#loading-div {
  clear:right;
  text-align:right;
  display:block;
}

#menu-div {
  background:#80BDCB;
  font-weight:bold;
  height:24px;
  line-height:24px;
}

#menu-div ul {
  margin:0;
  padding:0;
  list-style-type:none;
}

#menu-div li {
  float:left;
  border-right:1px solid #192E32;
  border-left:1px solid #BBDDE5;
}

#menu-div a:visited, #menu-div a:link {
  display:block;
  padding:0 20px;
  text-decoration:none;
  color:#335B64;
  background:#9CCBD6;
}

#menu-div a:hover {
  color:#000;
  background:#80BDCB;
}

#submenu-div a.fix-submenu{
    clear:both;
    margin-left:5px;
    padding:1px 5px;
    background:#DDEEF2;
    color:#278296;
}

#submenu-div a.fix-submenu:hover{
    padding:1px 5px;
    background:#FFF;
    color:#278296;
}

#menu-div li.fix-spacel{
    width:30px;
    border-left:none;
}

#menu-div li.fix-spacer{
    border-right:none;
}
#send_info {
  padding:5px 30px 0 0;
  clear:right;
  text-align:right;
  color:#FF9900;
  width:40%;
  float:right;  
}
</style>

<div id="header-div">
    <div id="logo-div" style="bgcolor:#000000;">
        <img src="<?php echo (FM_ADMIN_IMG); ?>ecshop_logo.gif" alt="ECSHOP - power for e-commerce" />
    </div>
    <div id="submenu-div">
        <ul>
            <li><a href="/Home/Index/index" target="_blank">查看网店</a></li>
            <li><a href="#">个人设置</a></li>
            <li style="border-right:none"><a href="">刷新</a></li>
        </ul>
        <div id="send_info">
            <a href="#" target="_top" class="fix-submenu">退出</a>
        </div>
    </div>
</div>
<div id="menu-div">
    <ul>
        <li class="fix-spacel">&nbsp;</li>
        <li><a href="/Admin/Index/index.html" target="main-frame">起始页</a></li>
        <li><a href="__GROUP__/Goods/goodsList" target="main-frame">商品列表</a></li>
        <li><a href="__GROUP__/Order/orderList" target="main-frame">订单列表</a></li>
        <li><a href="__GROUP__/Comment/commentList" target="main-frame">用户评论</a></li>
        <li><a href="__GROUP__/User/userList" target="main-frame">会员列表</a></li>
        <li class="fix-spacer">&nbsp;</li>
    </ul>
    <br class="clear" />
</div>
</div>
<div class="main">
	<ul>
		<li id="mainLeft"><style type="text/css">
#tabbar-div {
  background:#278296;
  padding-left:10px;
  height:21px;
  padding-top:0px;
}
#tabbar-div p {
  margin:1px 5px 0 0;
  background:#80BDCB;
}
.tab-front {
  background:#80BDCB;
  line-height:20px;
  font-weight:bold;
  padding:4px 15px 4px 18px;
  border-right:2px solid #335b64;
  cursor:hand;
  cursor:pointer;
}
.tab-back {
  color:#F4FAFB;
  line-height:20px;
  padding:4px 15px 4px 18px;
  cursor:hand;
  cursor:pointer;
}
.tab-hover {
  color:#F4FAFB;
  line-height:20px;
  padding:4px 15px 4px 18px;
  cursor:hand;
  cursor:pointer;
  background:#2F9DB5;
}
#top-div
{
  padding:3px 0 2px;
  background:#BBDDE5;
  margin:5px;
  text-align:center;
}
#main-div {
  border:1px solid #345C65;
  padding:5px;
  margin:5px;
  background:#FFF;
}
#menu-list {
  padding:0;
  margin:0;
}
#menu-list ul {
  padding:0;
  margin:0;
  list-style-type: none;
  color:#335B64;
}
#menu-list li {
  padding-left:16px;
  line-height:16px;
  cursor:hand;
  cursor:pointer;
}
#main-div a:visited, #menu-list a:link, #menu-list a:hover {
  color:#335B64
  text-decoration:none;
}
#menu-list a:active {
  color:#EB8A3D;
}
.explode {
  background:url(<?php echo (FM_ADMIN_IMG); ?>menu_minus.gif) no-repeat 0px 3px;
  font-weight:bold;
}
.collapse {
  background:url(<?php echo (FM_ADMIN_IMG); ?>menu_plus.gif) no-repeat 0px 3px;
  font-weight:bold;
}
.menu-item {
  background:url(<?php echo (FM_ADMIN_IMG); ?>menu_arrow.gif) no-repeat 0px 3px;
  font-weight:normal;
  height: 20px;
  margin-top: 2px;
}
#help-title {
  font-size:14px;
  color:#000080;
  margin:5px 0;
  padding:0px;
}
#help-content {
  margin:0;
  padding:0;
}
.tips {
  color:#CC0000;
}
.link {
  color:#000099;
}
</style>
<div id="tabbar-div">
    <p>
        <span style="float:right; padding:3px 5px;" >
            <a href="javascript:toggleCollapse();">
                <img id="toggleImg" src="<?php echo (FM_ADMIN_IMG); ?>menu_minus.gif" width="9" height="9" border="0" alt="闭合" />
            </a>
        </span>
        <span class="tab-front" id="menu-tab">菜单</span>
    </p>
</div>
<div id="main-div">
    <div id="menu-list">
        <ul id="menu-ul">
            <li class="explode" key="02_cat_and_goods" name="menu">
            商品管理
                <ul>
                    <li class="menu-item"><a href="/Admin/Goods/showlist" target="_self">商品列表</a></li>
                    <li class="menu-item"><a href="/Admin/Goods/goodsAdd" target="_self">添加新商品</a></li>
                    
                    <li class="menu-item"><a href="/Admin/Category/categoryList" target="_self">商品分类</a></li>
                    <li class="menu-item"><a href="/Admin/Category/categoryAdd" target="_self">添加商品分类</a></li>                   
                    <li class="menu-item"><a href="/Admin/brand/brandList" target="_self">商品品牌</a></li>
                    <li class="menu-item"><a href="/Admin/brand/brandAdd" target="_self">添加品牌分类</a></li>
                </ul>
            </li>
            <li class="explode" key="04_order" name="menu">
            订单管理
                <ul>
                    <li class="menu-item"><a href="/Admin/Order/orderList.html">订单列表</a></li>
                    <li class="menu-item"><a href="/Admin/Order/notPost.html" >待发货单列表</a></li>
                    <li class="menu-item"><a href="/Admin/Order/notPay.html" >待支付单列表</a></li>
                    <li class="menu-item"><a href="/Admin/Order/notSure.html" >未确认订单:</a></li>
                    <li class="menu-item"><a href="/Admin/Order/haveSure.html" >已成交订单:</a></li>
                    <li class="menu-item"><a href="/Admin/Order/returnGoods.html" >退货单列表</a></li>
                </ul>
            </li>
            <li class="explode" key="08_members" name="menu">
            会员管理
                <ul>
                    <li class="menu-item"><a href="/Admin/User/memberList.html" >会员列表</a></li>
                    <li class="menu-item"><a href="userMessage.html" >会员留言</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="help-div" style="display:none">
        <h1 id="help-title"></h1>
        <div id="help-content"></div>
    </div>
</div>
</li>
		<li id="mainRight">
			<h1>
    			<span class="action-span1"><a href="/Admin/Index/index.html">泛米网管理中心</a> </span>
			    <span class="action-span"><a href="/Admin/Order/orderList" >全部订单</a></span>
    <span id="search_id" class="action-span1"> - 待发货订单 </span>
    <div style="clear:both"></div>
</h1>
<!-- 商品列表 -->
<form method="post" action="" name="listForm" onsubmit="">
    <div class="list-div" id="listDiv">
        <table cellpadding="3" cellspacing="1">
             <caption align="top">订单信息</caption>
            <tr>       
                <th align="center">价格</th>
                <th align="center">支付方式</th>
                <th align="center">是否支付</th>
                <th align="center">是否发货</th>
                <th align="center">订单状态</th>
                <th align="center">操作</th>
            </tr>
            <tr>
                <td align="center"><span><?php echo ($order["total_price"]); ?></span></td>   
                <td align="center"><span>
                <?php switch($order["pay_method"]): case "1": ?>货到付款<?php break;?>
                    <?php case "2": ?>在线支付<?php break;?>
                    <?php case "3": ?>上门自提<?php break; endswitch;?>
                </span></td>  
                <td align="center"><span>
                <img src="<?php if(($order["pay_status"] == 1)): echo (FM_ADMIN_IMG); ?>yes.gif <?php else: echo (FM_ADMIN_IMG); ?>no.gif<?php endif; ?>"/>
                </span></td>  
                <td align="center"><span>
                    <img src="<?php if(($order["post_status"] == 1)): echo (FM_ADMIN_IMG); ?>yes.gif <?php else: echo (FM_ADMIN_IMG); ?>no.gif<?php endif; ?>"/>
                </span></td>  
                <td align="center"><span>
                    <?php switch($order["order_status"]): case "0": ?>未确认<?php break;?>
                    <?php case "1": ?>已确认<?php break;?>
                    <?php case "2": ?>已完成<?php break;?>
                    <?php case "3": ?>申请退货<?php break;?>
                    <?php case "4": ?>退货成功<?php break; endswitch;?>
                </span></td>  
                <td align="center"><span>
                    <?php if(($order["pay_status"] == 1) AND ($order["post_status"] == 0)): ?><a href="">发货</a><?php endif; ?>
                   <?php if(($order["order_status"] == 3)): ?><a href="">退款</a><?php endif; ?>                  
                </span></td>            
            </tr>
        </table>
        <br/>
        <table cellpadding="3" cellspacing="1">
             <caption align="top" height="30px">购买的商品信息</caption>
             <tr>       
                <th align="center">商品</th>
                <th align="center">尺寸</th>
                <th align="center">单价</th>
                <th align="center">数量</th>
            </tr>
            <?php if(is_array($orderGoods)): $i = 0; $__LIST__ = $orderGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$oGoods): $mod = ($i % 2 );++$i;?><tr>       
                <td align="center" >
                    <?php if(empty($oGoods["goods"])): ?>已经下架
                    <?php else: ?>
                    <ul>
                    <li><?php echo ($oGoods["goods"]["goods_name"]); ?></li>
                    <li><img src="<?php echo (URL); ?>Public/<?php echo ($oGoods["goods"]["goods_mid_img"]); ?>" ></li><?php endif; ?>
                </td>
                <td align="center"><?php echo ($oGoods["goods_size"]); ?></td>
                <td align="center"><?php echo ($oGoods["price"]); ?></td>
                <td align="center"><?php echo ($oGoods["goods_number"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <br/>
        <table cellpadding="3" cellspacing="1">
             <caption align="top" height="30px">收货人信息</caption>
             <tr>
                 <td align="right" width="100px">姓名：</td>
                 <td align="left"><?php echo ($order["shr_name"]); ?></td>
             </tr>
             <tr>
                 <td align="right" width="100px">省：</td>
                 <td align="left"><?php echo ($order["shr_province"]); ?></td>
             </tr>
             <tr>
                 <td align="right" width="100px">市：</td>
                 <td align="left"><?php echo ($order["shr_city"]); ?></td>
             </tr>
             <tr>
                 <td align="right" width="100px">区：</td>
                 <td align="left"><?php echo ($order["shr_area"]); ?></td>
             </tr>
             <tr>
                 <td align="right" width="100px">详细地址：</td>
                 <td align="left"><?php echo ($order["shr_address"]); ?></td>
             </tr>
             <tr>
                 <td align="right" width="100px">电话：</td>
                 <td align="left"><?php echo ($order["shr_phone"]); ?></td>
             </tr>
        </table>
        <br/>
        <table cellpadding="3" cellspacing="1">
            <caption align="top" height="30px">会员信息</caption>
            <tr>       
                <th align="center">姓名</th>
                <th align="center">昵称</th>
                <th align="center">邮箱</th>
                <th align="center">电话</th>
                <th align="center">注册时间</th>
                <th align="center">上次登录时间</th>
            </tr>
            <tr>
                <td align="center"><?php echo ($member["user_name"]); ?></td>
                <td align="center"><?php echo ($member["user_nickname"]); ?></td>
                <td align="center"><?php echo ($member["user_email"]); ?></td>
                <td align="center"><?php echo ($member["user_tel"]); ?></td>
                <td align="center"><?php echo ($member["user_regist_time"]); ?></td>
                <td align="center"><?php echo ($member["user_login_time"]); ?></td>
            </tr>
        </table>
    </div>
</form>

		</li>
		<li style="clear:both;"></li> 
	</ul>
</div>

<div id="footer">
版权所有 &copy; 武汉泛米科技</div>
</body>
</html>