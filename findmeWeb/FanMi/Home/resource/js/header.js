/*
@功能：头部js
@作者：diamondwang
@时间：2013年11月13日
*/
/* 注意，要在页面中先引入jquery*/
$(function(){
	//搜索框，注意此处，获取文本框的默认值使用defaultValue属性，但是只能通过this.defaultValue，不能使用$(this).defalutValue。
	$(".search_form .txt").focus(function(){
		if ($(this).val() == this.defaultValue){
			$(this).val("").css({color:"#333"});
		}	
	}).blur(function(){
		if ($(this).val() == ""){
			$(this).val(this.defaultValue).css({color:"#999"});
		}
	});
	//头部用户
	$(".user").mouseover(function(){
		$(this).find("dd").show();
		$(this).find("dt").addClass("on");
	}).mouseout(function(){
		$(this).find("dd").hide();
		$(this).find("dt").removeClass("on");
	});

	//购物车
	$(".cart").mouseover(function(){
		$(this).find("dd").show();
		$(this).find("dt").addClass("on");		
	}).mouseout(function(){
		$(this).find("dd").hide();
		$(this).find("dt").removeClass("on");
	});

	//导航菜单效果
	$(".cat").hover(function(){
		$(this).find(".cat_detail").show();
		$(this).find("h3").addClass("on");
	},function(){
		$(this).find(".cat_detail").hide();
		$(this).find("h3").removeClass("on");
	});

	//非首页，导航菜单显隐效果
	$(".cat1").hover(function(){
		$(".cat1 .cat_hd").addClass("on").removeClass("off");
		$(".cat1 .cat_bd").show();
	},function(){
		$(".cat1 .cat_hd").addClass("off").removeClass("on");
		$(".cat1 .cat_bd").hide();
	});

	$(".adel").click(function(){
		if(confirm("确定要删除吗？"))
		{
			
			// 获取商品ID和属性ID
			var tr = $(this).parent().parent();
			var gsize = tr.attr("gsize");
			var gid = tr.attr("gid");

			$.ajax({
				type : "post",
				dataType:"json",
				data:{'gid':gid,"size":gsize},
				url : "/Home/Cart/ajaxDelGoods",
				success : function(data)
				{
					tr.remove();
					document.location.reload();					
					//重新计算购物金总额
					/*var total = 0;
					$(".col5 span").each(function(){
						total += parseFloat($(this).text());
					});

					$("#total").text(total.toFixed(2));*/
				}
			});
		}
	});
});

function updatewebPageCart()
{
	var ddObj=$(".cart").find("dd");
	$.ajax({
			type:"post",
			dataType:"json",
			url:"/Home/Header/cartInfo",
			data:{'returnType':1},
			success:function(parckData){
				ddObj.empty().prepend(parckData['content']);
			},
		});
}