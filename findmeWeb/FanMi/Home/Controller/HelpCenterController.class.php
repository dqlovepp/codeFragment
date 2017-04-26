<?php
/**
*新手指南
*/
namespace Home\Controller;
use Home\Controller\APPHomeController ;

class HelpCenterController extends APPHomeController 
{
	public function _empty()
	{
		//ACTION_NAME
		$helpcenter=new \Model\HelpcenterModel();
		//$helpcenter=D('Helpcenter');
		$curfooter=$helpcenter->onefoot(ACTION_NAME);
		if(empty($curfooter))
		{
			parent::_empty();
		}
		else
		{
			$this->assign('layoutType','Layout1');
			$this->assign('curfooter',$curfooter[0]);
			$this->display('Novice/index');
		}
	}
}
