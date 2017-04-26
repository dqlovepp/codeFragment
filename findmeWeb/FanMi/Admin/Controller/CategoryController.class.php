<?php
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class CategoryController extends APPAdminController
{
	//添加商品分类
	public function categoryAdd()
	{
		$parent_id=I('parent_id');
		$cat_name=I('cat_name');
		if(empty($parent_id)|| !is_numeric($parent_id) || empty($cat_name) || strlen(trim($cat_name))<2 || strlen(trim($cat_name))>20)
		{
			$navigation=D('navigation');
			$navigationinfo=$navigation->where('nav_is_Goods=1')->select();

			$this->assign('navigation',$navigationinfo);
			$this->display();
		}
		else
		{
			//添加到数据库
			$data=array('category_name'=>$cat_name,"navigation_id"=>$parent_id);
			$goods_category=D('goods_category');
			if($goods_category->add($data))
			{
				$this->success('添加成功',"categoryList");
			}
			else
			{
				$this->error('操作异常');
			}
		}
		
	}	
	//商品列表
	public function categoryList()
	{
		$goods_category=D('goods_category');
		$navigation=D('navigation');
		$goodsCateInfo=$goods_category->select();

		foreach ($goodsCateInfo as $key => $value) {
			$navigation_id=$value['navigation_id'];
			$navInfo=$navigation->find($navigation_id);
			$goodsCateInfo[$key]['navigate']=$navInfo['nav_name'];
		}
		$this->assign('goodsCateInfo',$goodsCateInfo);
		$this->display();
	}

	//编辑商品分类
	public function categoryEdit()
	{
		$category_id=I('category_id');
		if(empty($category_id) || !is_numeric($category_id))
		{
			$this->error('非法操作');
		}
		else
		{
			$goods_category=D('goods_category');
			$goodsCateinfo=$goods_category->find($category_id);
			if(empty($goodsCateinfo))
			{
				$this->error('非法操作');
			}
			else
			{
				$navigation=D('navigation');
				$navInfo=$navigation->find($category_id);

				if(empty($navInfo))
				{
					$this->error('非法操作');
				}
				else
				{
					$navigationinfo=$navigation->where('nav_is_Goods=1')->select();

					$this->assign('navigation',$navigationinfo);
					$this->assign('goodsCateinfo',$goodsCateinfo);
					$this->assign('navInfo',$navInfo);
					$this->display();
				}
			}
		}
	}
	public function categoryModify()
	{
		$goods_category=D('goods_category');
		$goods_category->create();
		$isSuc=$goods_category->save();
		if($isSuc)
		{
			$this->success('修改成功',"categoryList");
		}
		else
		{
			$this->error('操作异常');
		}
	}

	public function delCategory(){
		$category_id=I('category_id');
		if(empty($category_id) || !is_numeric($category_id))
		{
			$this->ajaxReturn(array('isOk'=>0));
		}
		else
		{
			$goods_category=D('goods_category');
			$isOk=$goods_category->delete($category_id);
			$this->ajaxReturn(array('isOk'=>$isOk));
		}
	}
}