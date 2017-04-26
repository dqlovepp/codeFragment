<?php
/*****
弹出对话框

*****/
namespace Component;

class Blackbox{

  function __construct(){
  	//引入需要的JS以及CSS
  	echo '<link rel="stylesheet" type="text/css" href="'.URL.'Public/blackbox/css/blackbox.css">
		  <script src="'.URL.'Public/blackbox/js/jquery-1.7.2.min.js"></script>
		  <script src="'.URL.'Public/blackbox/js/jquery.blackbox.js"></script>';
  }
	/**
 * alert_back()表是JS弹窗
 * @access public
 * @param $info
 * @return void 弹窗
 */
public function alert_back($info) {
	echo "<script type='text/javascript'>
	$(function(){
	$.alert('$info',function(){history.back()});
	})
	</script>";
}

public function alert_close($info) {
	echo "<script type='text/javascript'>
	$(function(){
	$.alert('$info',function(){window.close()});
	})
	</script>";
}

public function location($info,$url) {
	if (!empty($info)) {
		echo "<script type='text/javascript'>
		$(function(){
			$.alert('$info',function(){location.href='$url'});
		})
		</script>";
	} else {
		header('Location:'.$url);
	}
}

public function alert_message($info) {
	echo "<script type='text/javascript'>
		$(function(){
		$.alert('$info');
		})
	  </script>";
}

public function alert_iframe($url,$settings,$callback=null){
	echo "<script type='text/javascript'>
		$(function(){
		$.iframe('$url','$settings');
		})
	  </script>";
}


}
