$(document).ready(function(){
	var isAnimation = false;
	$(".headerNav ul li a").click(function(){
		var dataHash = $(this).attr("data-hash");
		var top = $("#"+dataHash).offset().top;
		$("body").animate({"scrollTop":top}, 500);
		$(this).parent().addClass("actived").siblings().removeClass("actived");
		return false;
	})
	$(window).scroll(function(event){
		/*if($("body").is(":animated")) { //防止点击事件的影响
			return false;
		}*/
		if(isAnimation) {
			return false;
		}

		$('.list').each(function(i){
			var top = Math.abs($(this).offset().top - $(document).scrollTop());
			if(top < 100) {
				var $Title = $(".title[data-hash = "+$(this).attr('id')+"]");
				if (! $Title.parent().hasClass('actived')) {					
					$Title.click();
				}
			}
		});
	})
})
 