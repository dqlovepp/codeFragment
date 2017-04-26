<?php
/***
泛米科技网站后台程序的父类
实现验证
第二错误跳转
****/
namespace Admin\Controller;
use Think\Controller;

class APPAdminController extends Controller
{
	function __construct()
	{
		parent::__construct();
		//登录验证
	}
	//验证
	public function checkLogin()
	{
		
	}
	public function _empty()
	{
        $this->error('你访问的页面不存在');
    }
}