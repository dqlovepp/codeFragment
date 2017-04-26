/*
@功能：订单页面js
@作者：lidequan
@时间：2015年03月15日
*/
$(function(){
	//左侧菜单收缩效果
	$(".menu_wrap dt").click(function(){
		$(this).siblings().toggle();
		$(this).find("b").toggleClass("off");
	});
})
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
				$(obj).parent().hide();	
			}
			else
			{
				alert('当前地址无法删除');
			}		
		}
	});
}

function modifyaddress(obj,addressid)
{
	$("form[name=address_form]").show();
	var allspan=$(obj).parent().find("span");
	$("#address_form input[name='name']").val($(allspan[0]).html());
	$('#city_china').html("省份：<select class='province cxselect' disabled='disabled' name='province' data-required='true' id='province'></select>	城市：<select class='city cxselect' disabled='disabled' name='city' id='city'></select>地区：<select class='area cxselect' disabled='disabled' name='area' id='area'></select>");
	$("#province").attr("data-value",$.trim($(allspan[1]).html()));
	$("#city").attr("data-value",$.trim($(allspan[2]).html()));
	$("#area").attr("data-value",$.trim($(allspan[3]).html()));

	$("#address_form input[name='shr_address']").val($(allspan[4]).html());
	$("#address_form input[name='shr_phone']").val($(allspan[5]).html());
	$("#address_form input[name='addressid']").val(addressid);
	$("#address_form input[name='shr_mobile']").val($(allspan[6]).html());
	$("#address_form input[name='shr_zip']").val($(allspan[7]).html());
	$('#city_china').cxSelect({
			selects: ['province', 'city', 'area']
		});
}

$(function(){
	$("#confirm_btn").click(function(){
		//检查参数是否合法
		
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
	});
	$('#add_address').click(function(){
		if($("#address_form").css('display')=="none")
		{
			$("#address_form").css('display',"block");
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
						//alert(result['isOk']);
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
function checkSubmitMobil(id) 
{ 
	var tel=$("#"+id).val();
	tel=tel.replace(/\s+/g,""); //替换空格

	var isSubmit=true;
	if (tel == "") 
	{ 
		isSubmit=false;	
		$("#"+id).css('border',"1px solid #EE0000").next().html('手机号不可为空').css('color','#EE0000');
	} 
	else if (!tel.match(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/)) 
	{ 
		isSubmit=false;	
		$("#"+id).css('border',"1px solid #EE0000").next().html('手机号不存在').css('color','#EE0000');
	} 
	else
	{
		$("#"+id).css('border',"1px solid #5AB73B").next().html('');
	}
	return isSubmit;
} 