<?php
/***
author：李德全
createDate:
fileName：

作用：

****/
namespace Home\Controller;
use Think\Controller;

class EmptyController extends Controller{

      public function _empty(){
        $this->assign('layoutType','Layout1');
        $this->success('你访问的页面不存在',U('Home/index/index',3));
      }
}