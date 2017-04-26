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
            <li><a href="/testTp" target="_blank">查看网店</a></li>
            <li><a href="#" target="main-frame">个人设置</a></li>
            <li style="border-right:none"><a href="#">刷新</a></li>
        </ul>
        <div id="send_info">
            <a href="#" target="main-frame" class="fix-submenu">清除缓存</a>
            <a href="#" target="_top" class="fix-submenu">退出</a>
        </div>
    </div>
</div>
<div id="menu-div">
    <ul>
        <li class="fix-spacel">&nbsp;</li>
        <li><a href="__GROUP__/Index/main" target="main-frame">起始页</a></li>
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
                    <li class="menu-item"><a href="orderList.html" target="main-frame">订单列表</a></li>
                    <li class="menu-item"><a href="orderQuery.html" target="main-frame">订单查询</a></li>
                    <li class="menu-item"><a href="orderAdd.html" target="main-frame">添加订单</a></li>
                    <li class="menu-item"><a href="delivery_list.html" target="main-frame">发货单列表</a></li>
                    <li class="menu-item"><a href="back_list.html" target="main-frame">退货单列表</a></li>
                </ul>
            </li>
            <li class="explode" key="08_members" name="menu">
            会员管理
                <ul>
                    <li class="menu-item"><a href="userList.html" target="main-frame">会员列表</a></li>
                    <li class="menu-item"><a href="userAdd.html" target="main-frame">添加会员</a></li>
                    <li class="menu-item"><a href="userMessage.html" target="main-frame">会员留言</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="help-div" style="display:none">
        <h1 id="help-title"></h1>
        <div id="help-content"></div>
    </div>
</div>
<script type="text/javascript" src="<?php echo (FM_ADMIN_JS); ?>global.js"></script>
<script type="text/javascript" src="<?php echo (FM_ADMIN_JS); ?>utils.js"></script>
<script type="text/javascript" src="<?php echo (FM_ADMIN_JS); ?>transport.js"></script>
<script language="JavaScript">
    var collapse_all = "闭合";
    var expand_all = "展开";
    var collapse = true;

    function toggleCollapse() {
        var items = document.getElementsByTagName('LI');
        for(i = 0; i < items.length; i++) {
            if(collapse) {
                if (items[i].className == "explode") {
                    toggleCollapseExpand(items[i],"collapse");
                }
            } else {
                if(items[i].className == "collapse") {
                    toggleCollapseExpand(items[i],"explode");
                    ToggleHanlder.Reset();
                }
            }
        }
        collapse = !collapse;
        document.getElementById('toggleImg').src = collapse ? '<?php echo (FM_ADMIN_IMG); ?>menu_minus.gif' : '<?php echo (FM_ADMIN_IMG); ?>menu_plus.gif';
        document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
    }

    function toggleCollapseExpand(obj, status) {
        if (obj.tagName.toLowerCase() == 'li' && obj.className != 'menu-item') {
            for (i = 0; i < obj.childNodes.length; i++) {
                if (obj.childNodes[i].tagName == "UL") {
                    if (status == null) {
                        if (obj.childNodes[1].style.display != "none") {
                            obj.childNodes[1].style.display = "none";
                            ToggleHanlder.RecordState(obj.getAttribute("key"),"collapse");
                            obj.className = "collapse";
                        } else {
                            obj.childNodes[1].style.display = "block";
                            ToggleHanlder.RecordState(obj.getAttribute("key"),"explode");
                            obj.className = "explode";
                        }
                        break;
                    } else {
                        if(status == "collapse") {
                            ToggleHanlder.RecordState(obj.getAttribute("key"),"collapse");
                            obj.className = "collapse";
                        } else {
                            ToggleHanlder.RecordState(obj.getAttribute("key"),"explode");
                            obj.className = "explode";
                            }
                            obj.childNodes[1].style.display = (status == "explode") ? "block" : "none";
                    }
                }
            }
        }
    }

    document.getElementById('menu-list').onclick = function(e) {
        var obj = Utils.srcElement(e);
        toggleCollapseExpand(obj);
    }

    document.getElementById('tabbar-div').onmouseover = function(e) {
        var obj = Utils.srcElement(e);
        if (obj.className == "tab-back") {
            obj.className = "tab-hover";
        }
    }

    document.getElementById('tabbar-div').onmouseout = function(e) {
        var obj = Utils.srcElement(e);
        if (obj.className == "tab-hover") {
            obj.className = "tab-back";
        }
    }

    document.getElementById('tabbar-div').onclick = function(e) {
        var obj = Utils.srcElement(e);
        var hlpTab = document.getElementById('help-tab');
        var mnuDiv = document.getElementById('menu-list');
        var hlpDiv = document.getElementById('help-div');

        if (obj.id == 'help-tab') {
            mnuTab.className = 'tab-back';
            hlpTab.className = 'tab-front';
            mnuDiv.style.display = "none";
            hlpDiv.style.display = "block";

            loc = parent.frames['main-frame'].location.href;
            pos1 = loc.lastIndexOf("/");
            pos2 = loc.lastIndexOf("?");
            pos3 = loc.indexOf("act=");
            pos4 = loc.indexOf("&",pos3);

            filename = loc.substring(pos1 + 1, pos2 - 4);
            act = pos4 < 0 ? loc.substring(pos3 + 4) : loc.substring(pos3 + 4,pos4);
            loadHelp(filename,act);
        }
    }

    //菜单展合状态处理器
    var ToggleHanlder = new Object();

    Object.extend(
        ToggleHanlder ,{
            SourceObject : new Object(),
            CookieName   : 'Toggle_State',
            RecordState : function(name,state){
                if(state == "collapse") {
                    this.SourceObject[name] = state;
                } else {
                    if(this.SourceObject[name]) {
                        delete(this.SourceObject[name]);
                    }
                }
                var date = new Date();
                date.setTime(date.getTime() + 99999999);
                document.setCookie(this.CookieName, this.SourceObject.toJSONString(),date.toGMTString());
            },

            Reset :function() {
                var date = new Date();
                date.setTime(date.getTime() + 99999999);
                document.setCookie(this.CookieName,"{}",date.toGMTString());
            },

            Load : function() {
                if(document.getCookie(this.CookieName) != null) {
                    this.SourceObject = eval("("+ document.getCookie(this.CookieName) +")");
                    var items = document.getElementsByTagName('LI');
                    for(var i = 0; i < items.length; i++) {
                        if( items[0].getAttribute("name") == "menu" && items[0].getAttribute("id") != '20_yun') {
                            for(var k in this.SourceObject) {
                                if(typeof(items[i]) == "object") {
                                    if(items[i].getAttribute('key') == k) {
                                        toggleCollapseExpand(items[i], this.SourceObject[k]);
                                        collapse = false;
                                    }
                                }
                            }
                        }
                    }
                }
                document.getElementById('toggleImg').src = collapse ? './Images/menu_minus.gif' : './Images/menu_plus.gif';
                document.getElementById('toggleImg').alt = collapse ? collapse_all : expand_all;
            }
        }
    );

</script></li>
		<li id="mainRight">
			<h1>
    			<span class="action-span1"><a href="/Admin/Index/index.html">泛米网管理中心</a> </span>
			    <span class="action-span"><a href="__GROUP__/Category/categoryList">商品分类</a></span>
    <span id="search_id" class="action-span1"> - 修改分类 </span>
    <div style="clear:both"></div>
</h1>
<div class="main-div">
    <form action="/Admin/Category/categoryModify" method="post" name="addNavigate" id="addNavigate">
    <ul>
        <li>
            <label>上级分类:</label>
            <em>
                <select name="navigation_id" style="height:30px; width:100px;">
                        <?php if(is_array($navigation)): foreach($navigation as $key=>$val): if($navInfo['nav_id'] == $val['nav_id']): ?><option value="<?php echo ($val["nav_id"]); ?>" selected><?php echo ($val["nav_name"]); ?></option>
                            <?php else: ?>
                                <option value="<?php echo ($val["nav_id"]); ?>" ><?php echo ($val["nav_name"]); ?></option><?php endif; endforeach; endif; ?>
                    </select>
            </em>
        </li>
        <li>
            分类名称
            <em>
                <input type='text' name='category_name' maxlength="20" value='<?php echo ($goodsCateinfo["category_name"]); ?>' size='27' id='cat_name'/> 
            </em>
            <font color="red">*</font>
        </li>
        <li>
            是否显示
            <select name="is_hidden" style="height:30px; width:100px;">            
                     <option value="0" >是</option>
                     <option value="1"  <?php if($goodsCateinfo['is_hidden'] == 1): ?>selected<?php endif; ?>>否</option>            
            </select>
        </li>
        <li>
            <input type="hidden"  value="<?php echo ($goodsCateinfo["category_id"]); ?>" name="category_id" />
            <input type="submit" value=" 添加 " />
            <input type="reset" value=" 重置 " />
        </li>
    </ul>
    </form>
</div>
<script type="text/javascript">
    $("#addNavigate").submit(function(){
        var cat_name=$("#cat_name");  
        if((cat_name.val()).length<2||(cat_name.val()).length>20)
        {
            $(cat_name).parent().next().html('参数不符合要求，长度在3~20位之间');
            cat_name.focus();
            return false;
        }
        else
        {
            return true;
        }
        
        });
</script>
		</li>
		<li style="clear:both;"></li> 
	</ul>
</div>

<div id="footer">
版权所有 &copy; 武汉泛米科技</div>
</body>
</html>