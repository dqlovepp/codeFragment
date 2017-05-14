$(document).ready(function(){
	var isAnimation = false;
	$(".headerNav ul li a").click(function(){
		isAnimation = true;
		var dataHash = $(this).attr("data-hash");
		var top = $("#"+dataHash).offset().top;
		$("body").animate({"scrollTop":top}, 500, function(){
			isAnimation = false;
		});
		$(this).parent().addClass("actived").siblings().removeClass("actived");
		return false;
	})
	//当点击的时候，触发滚动条，但是，滚动时候会触发其他事件
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
 