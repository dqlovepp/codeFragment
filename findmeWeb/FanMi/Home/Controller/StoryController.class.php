<?php
namespace Home\Controller;
use \Home\Controller\APPHomeController;
class StoryController extends APPHomeController
{
	public function mystory()
	{
		$this->assign('layoutType','Layout1');
		
		$this->display('index');
	}
}