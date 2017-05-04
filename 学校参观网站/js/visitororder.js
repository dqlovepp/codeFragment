$(function(){
	$("#users").blur(function(){
		var val = $(this).val();
		if ($.trim(val) == '') {
			$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("不能为空");
		} else {
			$(this).next('span').removeClass().addClass('lcon_ok glyphicon glyphicon-ok').html("正确");
		}
	});

	$("#tel").blur(function(){
		var val = $.trim($(this).val());
		var objReg = /1[2-9]\d{9}/; 
		if (val == '') {
			$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("不能为空");
		} else if (! objReg.test(val)) {
			$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("格式不正确");
		} else {
			$(this).next('span').removeClass().addClass('lcon_ok glyphicon glyphicon-ok').html("正确");
		}
	});
	$("#email").blur(function(){
			var val = $.trim($(this).val());
			var objReg = /^(.+)@(.+)$/; 
			if (val == '') {
				$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("不能为空");
			} else if (! objReg.test(val)) {
				$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("格式不正确");
			} else {
				$(this).next('span').removeClass().addClass('lcon_ok glyphicon glyphicon-ok').html("正确");
			}
		});
	$("#company").blur(function(){
		var val = $(this).val();
		if ($.trim(val) == '') {
			$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("不能为空");
		} else {
			$(this).next('span').removeClass().addClass('lcon_ok glyphicon glyphicon-ok').html("正确");
		}
	});
	$("#visitornum").blur(function(){
		var val = $(this).val();
		if ($.trim(val) == '') {
			$(this).next('span').removeClass().addClass('lcon glyphicon glyphicon-remove').html("不能为空");
		} else {
			$(this).next('span').removeClass().addClass('lcon_ok glyphicon glyphicon-ok').html("正确");
		}
	});
	/*$("#pretime").focus(function(){
		$("#myModal").modal('show');
	});*/
})
