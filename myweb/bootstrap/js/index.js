$(function(){
	$(".love_article").click(function(){
		if ($(this).attr("data-id") == 0){
			$(this).css("color","#f00");
			$(this).attr("data-id", 1);
		} else {
			$(this).css("color","#76BC40");
			$(this).attr("data-id", 0);
		}
	})
})