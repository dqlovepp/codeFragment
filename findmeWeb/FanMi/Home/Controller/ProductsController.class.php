<?php
namespace Home\Controller;

use \Home\Controller\APPHomeController;
class ProductsController extends APPHomeController {
  
  public function goodsList(){
  	   $this->assign('layoutType','Layout1'); 
       //分类有男装、女装
  	   $catalog=I('get.catalog',null);
  	   if( !is_numeric($catalog))
  	   {
  		    $catalog=1;
  	   }
  	   $Nav=D('Navigation');
  	   $curNav=$Nav->where('nav_id='.$catalog)->find(); //当前一级分类信息
       if(empty($curNav))
       {
          $this->error('你访问的资源不存在');
       }
       else
       {
          //获取该导航下的所有分类 
         $Category=D('goods_category');
         $allCategory=$Category->where('navigation_id='.$catalog)->select();//获取所有二级分类信息
         if(empty($allCategory))
         {
          //判断改分类下面没有商品
            $this->error('你访问的资源不存在');
         }
         else
         {
           //判断当前用户选择的
           $categoryid=I('categoryid',null);
           if(empty($categoryid) || !is_numeric($categoryid))
           {
              $categoryid=$allCategory[0]['category_id'];
           }

           $curCategory=$Category->find($categoryid);
           if(empty($curCategory))
           {
              $curCategory=$allCategory[0];
              $categoryid=$allCategory[0]['category_id'];
           }
           $goodsModel=D('goods');
           $goodsCount=$goodsModel->where('goods_category_id='.$categoryid)->count();  //该类商品总数
           $per=6; //每页显示9条信息
           $page=new \Component\Page($goodsCount,$per);//实例化分页类 
           $sql="select goods_id,goods_name,goods_price,goods_market_price,goods_small_img,goods_big_img from fm_goods where goods_category_id=".$categoryid.' '.$page->limit;
           $curgoods=$goodsModel->query($sql);
           $pagelist=$page->fpage();  //获取页码
         }
       }

	     $this->assign('curCategory',$curCategory);  //当前的二级分类
  	   $this->assign('curgoods',$curgoods);  //所有商品
  	   $this->assign('pagelist',$pagelist);  //上一页、下一页分页导航
  	   $this->assign('allCategory',$allCategory);  //所有的二级分类
  	   $this->assign('curNav',$curNav);  //当前的一级分类
       $this->display('list');
    }
   public function goods(){
   	$this->assign('layoutType','Layout1');
    $catalog=I('catalog');

   	$goodsid=I('get.id');
   	$goodModel=D('goods');
   	$goodsinfo=$goodModel->where('goods_id='.$goodsid)->find();

    $Nav=D('Navigation');
    $curNav=$Nav->where('nav_id='.$catalog)->find(); //当前一级分类信息

    if(empty($goodsinfo)||empty($curNav))
    {
            $this->assign('layoutType','Layout1');
            $this->success('你访问的商品不存在或则已下架', U('Index/index'));
    }
    else
    {
      //获取图片信息
      $goodsPicModel=D('goods_pic');
      $goodsPicinfo=$goodsPicModel->where('goods_id='.$goodsid)->select();

      $this->assign('curNav',$curNav);
      $this->assign('goodsPicinfo',$goodsPicinfo);
      $this->assign('goodsinfo',$goodsinfo);
      $this->display("goods");
    }
    
   }
   
}