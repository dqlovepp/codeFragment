$(document).ready(function(){
	$(".navList li a").click(function () {
	    var href = $(this).attr("href");
	    var top = $(href).offset().top;
	    $("body ").animate({scrollTop: top}, 500);
	    $(this).parent().addClass("actived").siblings().removeClass("actived");
	    return false;
	})
})
