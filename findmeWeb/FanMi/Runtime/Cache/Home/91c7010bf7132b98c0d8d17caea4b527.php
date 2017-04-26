<?php if (!defined('THINK_PATH')) exit(); if(empty($goodsData)): ?><div class="prompt">
		您的购物车中还没有商品，赶紧选购吧！
	</div>
<?php else: ?>
	<div class="myfamicart">
		<div id="cart_heard">
			小计:<font style="color:#E4393C">￥<?php echo ($totalPrice); ?></font>
		</div>
		<div id="cart_body">
		<table>
			<tbody>
				<?php $allgoodsSum=0; ?>
				<?php if(is_array($goodsData)): $i = 0; $__LIST__ = $goodsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i; $allgoodsSum+=$cart['amount']; ?>
					<tr gid="<?php echo ($cart["goods"]["goods_id"]); ?>" gsize="<?php echo ($cart["goods_size"]); ?>">
						<td class="cart_goodsname"><a href="/findmeWeb/Home/Products/goods/catalog/<?php echo ($cart["goods"]["catalog"]); ?>/Category/<?php echo ($cart["goods"]["goods_category_id"]); ?>/id/<?php echo ($cart["goods"]["goods_id"]); ?>.html"><img src="<?php echo (URL); ?>Public/<?php echo ($cart["goods"]["goods_small_img"]); ?>" alt="" /></a><strong><a href="/findmeWeb/Home/Products/goods/catalog/<?php echo ($cart["goods"]["catalog"]); ?>/Category/<?php echo ($cart["goods"]["goods_category_id"]); ?>/id/<?php echo ($cart["goods"]["goods_id"]); ?>.html"><?php echo ($cart["goods"]["goods_name"]); ?></a></strong></td>

						<td class="cart_goodsprice">
						<a href="javascript:;"><font style="color:#E4393C">￥<?php echo ($cart["goods"]["goods_price"]); ?></font>&times;<?php echo ($cart["amount"]); ?>
						</a>
						<a href="javascript:;" class="adel">删除</a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div style="clear:both; border-top:1px solid #E7E3E7;width:100%;height:0;
							margin: 5px auto; "></div>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		</div>
		<div id="cart_footer">
			共件<?php echo ($allgoodsSum); ?>商品，共计<font style="color:#E4393C">￥<?php echo ($totalPrice); ?></font>
			<a href="/findmeWeb/Home/Cart/lst.html" style="display:block">去购物车结账</a>
		</div>
	</div><?php endif; ?>