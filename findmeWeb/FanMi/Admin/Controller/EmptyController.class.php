<?php
/***
author：李德全
createDate:
fileName：

作用：

****/
namespace Admin\Controller;
use Think\Controller;

class EmptyController extends Controller{

	public function _empty()
	{
		$this->error('非法操作');
	}
}