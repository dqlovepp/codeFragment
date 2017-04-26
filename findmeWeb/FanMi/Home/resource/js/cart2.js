/*
@功能：购物车页面js
@作者：lidequna
@时间：2015年03月14日
*/
$(function(){
	//收货人修改
	$("#address_modify").click(function(){
		$(this).hide();
		$(".address_info").hide();
		$(".address_select").show();
	});

	$(".new_address").click(function(){
		$("form[name=address_form]").show();
		$(this).parent().addClass("cur").siblings().removeClass("cur");
		
		$("#address_form input[name='name']").val('');
		$("#address_form input[name='shr_address']").val('');
		$("#address_form input[name='shr_phone']").val('');
		$("#address_form input[name='shr_mobile']").val('');
		$("#address_form input[name='shr_zip']").val('');
		
		$('.city_china').html("省份：<select class='province cxselect' disabled='disabled' name='province' data-required='true' id='province'></select>	城市：<select class='city cxselect' disabled='disabled' name='city' id='city'></select>地区：<select class='area cxselect' disabled='disabled' name='area' id='area'></select>").cxSelect({
			selects: ['province', 'city', 'area']
		});
	}).parent().siblings().find("input").click(function(){
		$("form[name=address_form]").hide();
		$(this).parent().addClass("cur").siblings().removeClass("cur");
	});

	//送货方式修改
	$("#delivery_modify").click(function(){
		$(this).hide();
		$(".delivery_info").hide();
		$(".delivery_select").show();
	})

	$("input[name=delivery]").click(function(){
		$(this).parent().parent().addClass("cur").siblings().removeClass("cur");
	});

	//支付方式修改
	$("#pay_modify").click(function(){
		$(this).hide();
		$(".pay_info").hide();
		$(".pay_select").show();
	})

	$("input[name=pay]").click(function(){
		$(this).parent().parent().addClass("cur").siblings().removeClass("cur");
		$("#orderinfo input[name='curPayMethod']").val($(this).val());
	});

	$("#check_address").click(function(){
		//用户名的验证
		if($("#orderinfo input[name='curAddress']").val()==0)
		{
			alert('请完善收获地址');
		}
		else
		{
			$("#orderinfo").attr("action","/Home/Cart/order").submit();
		}
	});

	/***
	参数说明
	{'id':wordsnotice}
	****/
	function checkSubmit(jsonParam){
		var isSubmit=true;
		for(var i in jsonParam)
		{
			if($.trim($("#"+i).val())=='')
			{
				isSubmit=false;
				if($.trim(jsonParam[i]) !='')
				{
					$("#"+i).css('border',"1px solid #EE0000").next().html(jsonParam[i]);
				}
				else
				{
					$("#"+i).parent().css('border',"1px solid #EE0000");
				}		
			}
			else
			{
				if($.trim(jsonParam[i]) !='')
				{
					$("#"+i).css('border',"none").next().html('');
				}
				else
				{
					$("#"+i).parent().css('border',"none");
				}
			}
		}
		return isSubmit;
	}
});

function checkSubmitEmail(id) 
{ 
	var isSubmit=true;
	if ($.trim($("#"+id).val()) == "") 
	{ 	
		isSubmit=false;		
		$("#"+id).css('border',"1px solid #EE0000").next().html('邮箱不可为空');
	} 
	else if (!$("#"+id).val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/)) 
	{ 
		isSubmit=false;	
		$("#"+id).css('border',"1px solid #EE0000").next().html('邮箱格式不对');
	} 
	else
	{
		$("#"+id).css('border',"none").next().html('');
	}
	return isSubmit;
} 

//jquery验证手机号码 
function checkSubmitMobil(id) 
{ 
	var tel=$("#"+id).val();
	 tel=tel.replace(/\s+/g,""); //替换空格

	var isSubmit=true;
	if (tel == "") 
	{ 
		isSubmit=false;	
		$("#"+id).css('border',"1px solid #EE0000").next().html('手机号不可为空');
	} 
	else if (!tel.match(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/)) 
	{ 
		isSubmit=false;	
		$("#"+id).css('border',"1px solid #EE0000").next().html('手机号不存在');
	} 
	else
	{
		$("#"+id).css('border',"none").next().html('');
	}
	return isSubmit;
} 

function deladdress(obj,addressid,userid)
{
	//删除当前地址
	$.ajax({
		type:"post",
		dataType:"json",
		url:"/Home/Manager/deladdress",
		data:{'id':userid,"addressid":addressid},
		success:function(result){
			if(result['isOk'] !=0)
			{
				window.location.reload();
			}
			else
			{
				alert('当前地址无法删除');
			}		
		}
	});
}
//设置默认地址
function setDefault(addressid,userid)
{
	$.ajax({
		type:"post",
		dataType:"json",
		url:"/Home/Manager/ajaxDefault",
		data:{'id':userid,"addressid":addressid},
		success:function(result){
			if(result['isOk'] !=0)
			{
				window.location.reload();
			}		
		}
	});
}
function modifyaddress(obj,addressid)
{
	$("form[name=address_form]").show();
	var allspan=$(obj).parent().find("span");
	$("#address_form input[name='name']").val($(allspan[0]).html());
	$('.city_china').html("省份：<select class='province cxselect' disabled='disabled' name='province' data-required='true' id='province'></select>	城市：<select class='city cxselect' disabled='disabled' name='city' id='city'></select>地区：<select class='area cxselect' disabled='disabled' name='area' id='area'></select>");
	$("#province").attr("data-value",$.trim($(allspan[1]).html()));
	$("#city").attr("data-value",$.trim($(allspan[2]).html()));
	$("#area").attr("data-value",$.trim($(allspan[3]).html()));

	$("#address_form input[name='shr_address']").val($(allspan[4]).html());
	$("#address_form input[name='shr_phone']").val($(allspan[5]).html());
	$("#address_form input[name='addressid']").val(addressid);
	$("#address_form input[name='shr_mobile']").val($(allspan[6]).html());
	$("#address_form input[name='shr_zip']").val($(allspan[7]).html());
	$('.city_china').cxSelect({
			selects: ['province', 'city', 'area']
		});
}

$(function(){
	$(".confirm_btn").click(function(){
		//检查参数是否合法
		//检验用户名
		var nickname=$.trim($("#address_form input[name='name']").val());
		var un_regex = new RegExp("^([\u4E00-\uFA29]|[\uE7C7-\uE7F3]|[a-zA-Z0-9_]){2,20}$"); 
		if(!un_regex.test(nickname))
		{
			$("#address_form input[name='name']").css('border',"1px solid #EE0000").next().html("2-20位字符，可由中文、字母、数字和下划线组成").css('color','#EE0000');			
		}
		else
		{
			$("#address_form input[name='name']").css('border',"1px solid #5AB73B").next().html("");			
			//验证详细地址
			var address=$.trim($("#address_form input[name='shr_address']").val());
			if(!un_regex.test(address))
			{
				$("#address_form input[name='shr_address']").css('border',"1px solid #EE0000").next().html("2-20位字符，可由中文、字母、数字和下划线组成").css('color','#EE0000');			
			}
			else
			{
				$("#address_form input[name='shr_address']").css('border',"1px solid #5AB73B").next().html("");
				//验证手机号
				if(checkSubmitMobil("tel"))
				{
					if($("#address_form input[name='addressid']").val()==0)
					{
						//添加地址
						$.ajax({
							type:"post",
							dataType:"json",
							url:"/Home/Manager/addAddress",
							data:$("#address_form").serialize(),
							success:function(result){
								if(result['isOk'] !=0)
								{
									// 刷新当前页面
									window.location.reload();
								}	
							}
						});
					}
					else
					{
						//修改地址
						$.ajax({
							type:"post",
							dataType:"json",
							url:"/Home/Manager/modifyAddress",
							data:$("#address_form").serialize(),
							success:function(result){
								if(result['isOk'] !=0)
								{
									// 刷新当前页面
									window.location.reload();
								}	
							}
						});
					}
				} 
			}
		}		
	});
	$('#add_address').click(function(){
		if($("#address_form").css('display')=="none")
		{
			$("#address_form").css('display',"block");
			$('.city_china').cxSelect({
				selects: ['province', 'city', 'area']
			});
		}
		else
		{
			$("#address_form").css('display',"none");
		}
	});
	$("#modifyinfo").click(function(){
		//验证
		var nickname=$.trim($("#modifyForm input[name='user_nickname']").val());
		var un_regex = new RegExp("^([\u4E00-\uFA29]|[\uE7C7-\uE7F3]|[a-zA-Z0-9_]){3,20}$"); 
		if(!un_regex.test(nickname))
		{
			$("#modifyForm input[name='user_nickname']").css('border',"1px solid #EE0000").next().html("3-20位字符，可由中文、字母、数字和下划线组成").css('color','#EE0000');			
		}
		else
		{
			$("#modifyForm input[name='user_nickname']").css('border',"1px solid #5AB73B").next().html("");			
			//验证手机号
			var tel_myreg = /(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
			var user_tel=$("#modifyForm input[name='user_tel']").val();
			//替换所有空格
			if(checkSubmitMobil("user_tel"))
			{
				$.ajax({
					type:"post",
					dataType:"json",
					url:"/Home/User/modifyinfo",
					data:$("#modifyForm").serialize(),
					success:function(result){
						if(result['isOk'] !=0)
						{
								// 刷新当前页面
							window.location.reload();
						}	
					}
				});
			}
		}
	});
});