$(function(){
	$("#form1").submit(function(){
	var ulen = $("#inputuse").val().length;
	if(ulen < 6){
		 $("#inputuse").css("border","1px solid #f00");
		 $(this).find(".notice").html('用户名不能少于6位').show();
		 $("#inputuse").focus();
	}
	
	var plen =$(".pw").val().length;
	if(plen < 6){
		 $(".pw").css("border","1px solid #f00");
		 $(this).find(".notice").html('密码不能少于6位').show();
		 $(".pw").focus();
	}
	return false;
})
	$(".reset").click(function(){
		$(".pw").css("border","")
		 $(".notice").html("").hide();
		 $("#inputuse").focus();
	});
$("#inputuse").blur(function(){
	var ulen = $(this).val().length;
	if(ulen < 6){
		 $(this).css("border","1px solid #f00");
		 $(".notice").html('用户名不能少于6位').show();
		 $(this).focus();
	}else{
		 $(this).css("border","");
		 $(".notice").html('').hide();
	}
})

})
