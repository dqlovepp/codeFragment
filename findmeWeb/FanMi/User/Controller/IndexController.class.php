<?php
namespace User\Controller;
use Think\Controller;

class IndexController extends Controller {
 
    public function index(){
    	 $this->display('main/index');
    }
 	
 	public  function qrcode($data='http://yj.ccnu.edu.cn/CompantWeb/studentid/',$size='4',$level='L',$padding=2,$logo=true){
   		  $studentid=I('get.studentid')?I('get.studentid'):0;
   		  $data=$data.$studentid;
  		  $size=I('get.size')?I('get.size'):$size;
  		  $level=I('get.level')?I('get.level'):$level;
   		  $padding=I('get.padding')?I('get.padding'):$padding; 		 
   		 vendor("phpqrcode.phpqrcode");
   		 $path='http://yj.ccnu.edu.cn/CompantWeb/FanMi/resource/';
        \QRcode::png($data,false, $level, $size,$padding);
	}

}