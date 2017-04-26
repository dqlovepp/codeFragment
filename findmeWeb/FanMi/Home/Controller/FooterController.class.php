<?php
namespace Home\Controller;
use Think\Controller;
class FooterController extends Controller {
    public function index(){
    	//读取相应的信息
    	//$helpcenter=D('helpcenter');
    	$helpcenter=new \Model\HelpcenterModel();
    	//var_dump($helpcenter);
    	$footers=$helpcenter->footinfo();
    	$this->assign('footers',$footers);
    	$this->assign('FootTemplate','index');
    }
}