<?php
/*****
弹出对话框

*****/
namespace Component;

class Easyui{

  function __construct(){
  	//引入需要的JS以及CSS
  	echo '<link rel="stylesheet" type="text/css" href="'.URL.'Public/easyui/themes/default/easyui.css">
  		  <link rel="stylesheet" type="text/css" href="'.URL.'Public/easyui/themes/icon.css">
		  <script src="'.URL.'Public/blackbox/js/jquery-1.7.2.min.js"></script>
		  <script src="'.URL.'Public/easyui/locale/easyui-lang-zh_CN.js"  charset="UTF-8"></script>
		  <script src="'.URL.'Public/easyui/jquery.easyui.min.js"  charset="UTF-8"></script>';
  }
  public function alert(){
  	echo '<div id="dd" title="对话框">agew</div>';
  	echo '<script type="text/javascript" charset="UTF-8">
			$(function(){
			$("#dd").dialog({	
			});
			});
		</script>';

  }

}

