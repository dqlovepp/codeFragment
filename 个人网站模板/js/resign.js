$(function(){

	$("#inputuse").blur(function(){
		var ulen = $("#inputuse").val().length;
		if(ulen < 6){
			 $(this).css("border","1px solid #f00");
		     $(".notice").html('用户名不能少于6位').show();
		     $(this).focus();
		}else{
			$(this).css("border","");
		     $(".notice").html('').hide();
		}
	})

	$("#inputPassword").blur(function(){
		var plen = $("#inputPassword").val().length;
		if(plen < 6){
			 $(this).css("border","1px solid #f00");
		     $(".notice").html('密码不能少于6位').show();
		     $(this).focus();
		}else{
			$(this).css("border","");
		     $(".notice").html('').hide();
		}
	})
	$("#inputPassword1").blur(function(){
		var pw1 = $("#inputPassword").val();
		var pw2 = $("#inputPassword1").val();
		if(pw1 != pw2 ){
			 $(this).css("border","1px solid #f00");
		     $(".notice").html('请输入相同密码').show();
		     $(this).focus();
		}else{
			$(this).css("border","");
		     $(".notice").html('').hide();
		}
	})
	$(".form1").submit(function(){
		var ulen = $("#inputuse").val().length;
		var plen = $("#inputPassword").val().length;
		var pw1 = $("#inputPassword").val();
		var pw2 = $("#inputPassword1").val();
		if(ulen < 6 || plen < 6 || pw1 != pw2 ){
			$(".notice").html('请填写正确信息').show();
		}
	})
	$(".reset").click(function(){
		$("#inputPassword").css("border","")
		$("#inputPassword1").css("border","")
		$("#inputuse").css("border","")
		$(".notice").html("").hide();
		$("#inputuse").focus();
		console.log("李德全猴逼")
	});
})