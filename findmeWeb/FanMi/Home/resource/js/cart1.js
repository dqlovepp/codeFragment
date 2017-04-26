/*
@功能：购物车页面js
@作者：lidequan
@时间：2013年11月14日
*/

$(function(){
	
	//减少
	$(".reduce_num").click(function(){
		var amount = $(this).parent().find(".amount");	
		if (parseInt($(amount).val()) <= 1){
			alert("商品数量最少为1");
		} else{
			$(amount).val(parseInt($(amount).val()) - 1);
		}
		updataCart(amount);
		//小计
		var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(amount).val());
		$(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
		//总计金额
		var total = 0;
		$(".col5 span").each(function(){
			total += parseFloat($(this).text());
		});

		$("#total").text(total.toFixed(2));
	});

	//增加
	$(".add_num").click(function(){
		var amount = $(this).parent().find(".amount");		
		$(amount).val(parseInt($(amount).val()) + 1);
		updataCart(amount);
		//小计
		var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(amount).val());
		$(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
		//总计金额
		var total = 0;
		$(".col5 span").each(function(){
			total += parseFloat($(this).text());
		});

		$("#total").text(total.toFixed(2));
	});

	//直接输入
	$(".amount").blur(function(){
		if (parseInt($(this).val()) < 1){
			alert("商品数量最少为1");
			$(this).val(1);
		}
		//小计
		var subtotal = parseFloat($(this).parent().parent().find(".col3 span").text()) * parseInt($(this).val());
		$(this).parent().parent().find(".col5 span").text(subtotal.toFixed(2));
		//总计金额
		var total = 0;
		$(".col5 span").each(function(){
			total += parseFloat($(this).text());
		});

		$("#total").text(total.toFixed(2));

	});

			
	$(".amount").change(function(){
		updataCart(this)
	});
});

	function updataCart(obj)
	{
	// 获取商品ID和属性ID
		var tr = $(obj).parent().parent();
		var gsize = tr.attr("gsize");
		var gid = tr.attr("gid");
		var value = $(obj).val();
		if(value > 0)
		{
			$.ajax({
				type : "post",
				dataType:"json",
				data:{'gid':gid,"size":gsize,"gn":value},
				url : "/Home/Cart/ajaxUpdateGoods",
				success : function(data)
				{
					updatewebPageCart();
				}
			});
		}
	}
