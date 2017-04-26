<?php
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class BrandController extends APPAdminController
{
	//添加商品分类
	public function brandAdd()
	{
		$brand_name=I('brand_name');
		if(empty($brand_name) || strlen(trim($brand_name))<2 || strlen(trim($brand_name))>20)
		{
			$this->display();
		}
		else
		{
			$GoodsBrand=D('goodsBrand');
			$GoodsBrand->create();
			if($GoodsBrand->add())
			{
				$this->success('添加成功',"brandList");
			}
			else
			{
				$this->error('操作异常');
			}
		}
		
	}	
	//商品列表
	public function brandList()
	{
		$GoodsBrand=D('goodsBrand');
		$brands=$GoodsBrand->getGoodsBrand();
		
		$this->assign('brands',$brands);
		$this->display();
	}

	//编辑品牌分类
	public function brandEdit()
	{
		$brandid=I('brandid');
		if(empty($brandid) || !is_numeric($brandid))
		{
			$this->error('非法操作');
		}
		else
		{
			$GoodsBrand=D('goodsBrand');
			$brand=$GoodsBrand->getGoodsBrand($brandid);
			if(empty($brand))
			{
				$this->error('非法操作');
			}
			else
			{
				$this->assign('brand',$brand);
				$this->display();
			}
		}
	}
	public function brandModify()
	{
		$GoodsBrand=D('goodsBrand');
		$GoodsBrand->create();
		$isSuc=$GoodsBrand->save();
		if($isSuc)
		{
			$this->success('修改成功',"brandList");
		}
		else
		{
			$this->error('操作异常');
		}
	}

	public function delbrand(){
		$brand_id=I('brand_id');
		if(empty($brand_id) || !is_numeric($brand_id))
		{
			$this->ajaxReturn(array('isOk'=>0));
		}
		else
		{
			$GoodsBrand=D('goodsBrand');
			$isOk=$GoodsBrand->delete($brand_id);
			$this->ajaxReturn(array('isOk'=>$isOk));
		}
	}
}