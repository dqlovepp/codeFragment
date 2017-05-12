$(document).ready(function(){
	$(".navList li").click(function(){
		$(this).addClass("actived").siblings().removeClass("actived");
		 $(".navList li a").click(function () {
            var href = $(this).attr("href");
            var top = $(href).offset().top;
            $("body,html").animate({scrollTop: top}, 500);
            return false;
        })
	})
})
