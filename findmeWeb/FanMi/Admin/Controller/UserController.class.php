<?php
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class UserController extends APPAdminController
{
	public function memberList()
	{
		$userModel=D('user');
		$users=$userModel->select();

		$this->assign('users',$users);
		$this->display();
	}

	public function memberMessage()
	{
		
	}
}