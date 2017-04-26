<?php
namespace Home\Controller;
use Think\Controller;
class APPHomeController extends Controller {
 
 	public function __construct(){
 		parent::__construct();
 		$header=new \Home\Controller\HeaderController();
    	$header->index();
 
    	$footer=new \Home\Controller\FooterController();
    	$footer->index();
 	}
 	/***
 	获取用户浏览器的相关信息
 	****/
 	public function getUserNavinfo(){

 	}

 	/****
 	判断是否非法访问
 	****/
 	public function _empty(){
        $this->assign('layoutType','Layout1');
        $this->success('你访问的页面不存在',U('Home/index/index',3));
      }
}