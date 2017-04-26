<?php
/**
*帮助中心管理
*/
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class HelpcenterController extends APPAdminController
{
	//现实所有列表
 public function index()
 {
 	$helpcenter=new \Model\HelpcenterModel();
	$curfooter=$helpcenter->footinfo();

	$this->assign('curfooter',$curfooter);
 	$this->display();
 }

 public function look()
 {
 	$id=I('id');
 	$helpcenter=new \Model\HelpcenterModel();
 	$curhelp=$helpcenter->lookfoot($id);
 	if(!empty($curhelp))
 	{
 		$this->assign('curhelp',$curhelp);
 		$this->display();
 	}
 	else
 	{
 		$this->error('非法访问');
 	}
 }

 public function modify()
 {
 	$id=I('id');
 	$helpcenter=new \Model\HelpcenterModel();
 	$curhelp=$helpcenter->lookfoot($id);
 	if(!empty($curhelp))
 	{
 		$this->assign('curhelp',$curhelp);
 		$this->display();
 	}
 	else
 	{
 		$this->error('非法访问');
 	}
 }

 public function savedata()
 {
 	$hcid=I('id');

 	$hcontent=htmlspecialchars(I('hcontent'));
 	$helpcenter=M('Helpcenter');

 	$isSuc=$helpcenter->save(array('id'=>$hcid,'content'=>$hcontent));
 	if($isSuc !=0)
 	{
 		$this->redirect('look', array('id' => $hcid));
 	}
 	else
 	{
 		echo $helpcenter->getLastSql();
 		//$this->error('非法访问');
 	}
 }
}
