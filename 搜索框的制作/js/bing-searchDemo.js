	/*实现动态智能提示*/
/*$(document).ready(function(){
	$("#input-search").bind("keyup",function(){
		$("#search-suggest").show();
 	var searchText = $("#input-search").val();
	$.get('http://localhost/index.php?q='+searchText,function(d){
		if (d.AS.Results && d.AS.Results.length > 0) {
			var d = d.AS.Results[0].Suggests;
			var html = ''
			for(i= 0;i<d.length;i++) {
				html+='<li>'+d[i].Txt+'</li>';
			}
			$('#searchResult').html(html);
		} else {
			$('#searchResult').html("<li>后台暂时没有添加相关数据</li>");
		}
		
	},'json');

     	})
	
$(document).bind('click',function(){
	$("#search-suggest").hide()
})	
})*/
/*静态提示框实现*/
$(document).ready(function(){ 
	$("#input-search").bind("keyup",function(){
	$("#search-suggest").show();
 	})
 })