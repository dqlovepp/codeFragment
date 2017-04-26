<?php if (!defined('THINK_PATH')) exit();?><!-- $Id: category_list.htm 17019 2010-01-29 10:10:34Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title泛米 管理中心 - 商品分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo (FM_ADMIN_CSS); ?>general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo (FM_ADMIN_CSS); ?>main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>
    <span class="action-span"><a href="__GROUP__/Category/categoryAdd">添加分类</a></span>
    <span class="action-span1"><a href="__GROUP__">泛米 管理中心</a></span>
    <span id="search_id" class="action-span1"> - 商品分类 </span>
    <div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
    <div class="list-div" id="listDiv">
        <table width="100%" cellspacing="1" cellpadding="2" id="list-table">
            <tr>
                <th>分类名称</th>
                <th>导航栏</th>
                <th>是否显示</th>
                <th>排序</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($list)): foreach($list as $key=>$val): ?><tr align="center" class="0">
                <td align="left" class="first-cell" >
                <<?php echo (str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$val["lev"])); ?>>
                <img src="./Images/menu_minus.gif" width="9" height="9" border="0" style="margin-left:0em" />
                <span><a href="javascript:void(0)"><<?php echo ($val["cat_name"]); ?>></a></span>
                </td>
                <td width="15%"><img src="./Images/<?php if($val["is_nav"] == 1): ?>yes.gif<?php else: ?>no.gif<?php endif; ?>"  /></td>
                <td width="15%"><img src="<?php if($val["is_show"] == 1): echo (FM_ADMIN_IMG); ?>yes.gif <?php else: ?> <?php echo (FM_ADMIN_IMG); ?>no.gif<?php endif; ?>" /></td>
                <td width="15%" align="center"><span><<?php echo ($val["sort_order"]); ?>></span></td>
                <td width="30%" align="center">
                <a href="__GROUP__/Category/categoryEdit?cat_id=<<?php echo ($val["cat_id"]); ?>>">编辑</a> |
                <a href="__GROUP__/Category/categoryDelete?cat_id=<<?php echo ($val["cat_id"]); ?>>" title="移除" onclick="">移除</a>
                </td>
            </tr><?php endforeach; endif; ?>
        </table>
    </div>
</form>
<div id="footer">
共执行 1 个查询，用时 0.055904 秒，Gzip 已禁用，内存占用 2.202 MB<br />
版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>