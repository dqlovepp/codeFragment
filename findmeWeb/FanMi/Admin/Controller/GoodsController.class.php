<?php
/***
author:lidequan
data:2015-01-12
***/
namespace Admin\Controller;
use Admin\Controller\APPAdminController;

class GoodsController extends APPAdminController{
	/***
	商品列表展示
	**/
	public function showlist(){
		$goodsType=I('goodsType',null); //商品类型
		$brandType=I('brandType',null);  //商品品牌
		$intro_type=I('intro_type',null); //推荐
		$is_on_sale=I('is_on_sale',null); //是否上架
		$keyword=I('keyword',null);
		$serchLimit='';
		$limitMap=array();
		if($goodsType !=null){
			$limitMap['goods_category_id']=$goodsType;
		}
		if($brandType !=null){
			$limitMap['goods_brand_id']=$goodsType;
		}
		if($intro_type !=null){
			$limitMap[$intro_type]=1;
		}
		if($is_on_sale !=null){
			$limitMap['is_on_sale']=$is_on_sale;
		}
		if($keyword !=null){
			$limitMap['goods_keywords']=array('like','%'.$keyword.'%');
		}
		$goodsModel=new \Admin\Model\GoodsModel();
		$allGoods=$goodsModel->where($limitMap)->select();

		$goodsTypeModel=new \Admin\Model\GoodsCategoryModel();
		$allGoodsType=$goodsTypeModel->select();

		
		$brandTypeModel=new \Admin\Model\GoodsBrandModel();
		$allbrandType=$brandTypeModel->getGoodsBrand($brandType);

		$this->assign('allGoods',$allGoods);
		$this->assign('goodsType',$allGoodsType);
		$this->assign('brandType',$allbrandType);
		$this->display('goodsList');
	}
	/***
	商品添加1
	**/
	public function goodsAdd(){
		if(!empty($_POST)){
            $goodsModel=new \Admin\Model\GoodsModel();
            $_POST['goods_create_time']=date("Y-m-d H:i:s");
            $goodsModel -> create(); //收集post表单数据
            $z = $goodsModel -> add();

            $blackBox=new \Component\Blackbox();
            if($z){
                 $blackBox->location('添加成功',URL.'Admin/Goods/goodsAddStep2.html?id='.$z);
            } else {
            	$lastSql=$goodsModel->getLastSql();
                $blackBox->alert_back('操作出错'.$lastSql);
            }
        }else {        	
        	$goodsCateogry=new \Admin\Model\GoodsCategoryModel();
			$categoryinfo=$goodsCateogry->select();

			$goodsBrand=new \Admin\Model\GoodsBrandModel();
			$Brandinfo=$goodsBrand->select();

			$this->assign('Brandinfo',$Brandinfo);
			$this->assign('categoryinfo',$categoryinfo);
			$this->display('goodsAdd');
        }
	}
	/***
	商品添加2
	图片添加
	**/
	public function goodsAddStep2(){
		if(!empty($_FILES)){
			$goodsPicModel=new \Admin\Model\GoodsPicModel();

            $data=$goodsPicModel ->create(); //收集post表单数据
            $z = $goodsPicModel ->add();
            
            $goodsid=I("post.goods_id");
            $blackBox=new \Component\Blackbox();
            if($z){
                 $blackBox->location('添加成功',URL.'Admin/Goods/goodsAddStep2/id/'.$goodsid);
            } else {
            	$lastSql=$goodsPicModel->getLastSql();
                $blackBox->alert_back('操作出错'.$lastSql);
            }
		}
		else
		{
			$goodsid=I('get.id');
			if(empty($goodsid))
			{
				$blackBox=new \Component\Blackbox();
				$blackBox->alert_back('请返回重新操作');
			}
			$this->assign('goods_id',$goodsid);
			$this->display('goodsAdd2');
		}
	}
	/***
	商品添加3
	商品信息添加
	**/
	public function goodsAddStep3(){
		if(!empty($_POST)){
			$goodsModel=new \Admin\Model\GoodsModel();
			$_POST['goods_desc']=I('post.goods_desc','','stripslashes');
            $goodsModel -> create(); //收集post表单数据
            $z = $goodsModel -> save();

            $blackBox=new \Component\Blackbox();
            if($z){
                 $blackBox->location('添加成功',URL.'Admin/Goods/goodsAdd.html');
            } else {
            	$lastSql=$goodsModel->getLastSql();
                $blackBox->alert_back('操作出错'.$lastSql);
            }
		}
		else
		{
			$goodsid=I('get.id');
			if(empty($goodsid))
			{
				$blackBox=new \Component\Blackbox();
				$blackBox->alert_back('请返回重新操作');
			}
			$this->assign('goods_id',$goodsid);
			$this->display('goodsAdd3');
		}
	}
	/***
	3(1)商品修改
	**/
	public function goodsEdit(){
		$goodsId=I('goods_id');
		$brandType=I('brandType',null);  //商品品牌
		
		$goodsModel=new \Admin\Model\GoodsModel();
		$curGoods=$goodsModel->where('goods_id='.$goodsId)->find();
		$goodsTypeModel=new \Admin\Model\GoodsCategoryModel();
		$allGoodsType=$goodsTypeModel->select();
		
		$brandTypeModel=new \Admin\Model\GoodsBrandModel();
		$allbrandType=$brandTypeModel->getGoodsBrand($brandType);

		$this->assign('brandType',$allbrandType);
		$this->assign('allGoodsType',$allGoodsType);
		$this->assign('curGoods',$curGoods);
		$this->display('goodsEdit');
	}
	/***
	3(2)商品修改
	图片修改
	**/
	public function goodsEdit2(){
		$goodsId=I('goods_id');
		$goodsModel=new \Admin\Model\GoodsModel();
		$curGoods=$goodsModel->where('goods_id='.$goodsId)->find();
		//获取图片信息
	    $goodsPicModel=D('goods_pic');
	    $goodsPicinfo=$goodsPicModel->where('goods_id='.$goodsId)->select();

	    $this->assign('goodsPicinfo',$goodsPicinfo);
		$this->assign('curGoods',$curGoods);
		$this->display('goodsEdit2');
	}
	/***
	3(3)商品修改
	商品信息修改
	**/
	public function goodsEdit3(){
		$goodsId=I('goods_id');
		$goodsModel=new \Admin\Model\GoodsModel();
		$curGoods=$goodsModel->where('goods_id='.$goodsId)->find();
		
		$this->assign('curGoods',$curGoods);
		$this->display('goodsEdit3');
	}
	/****
	修改商品提交界面
	*****/
	public function goodsEditing(){
		$step=I('post.step');
		$goods_id=I('post.goods_id');
		switch ($step) {
			case 'goodsEdit3':
			case 'goodsEdit':
				$goodsModel=new \Admin\Model\GoodsModel();
	            $goodsModel -> create(); //收集post表单数据
	            $z = $goodsModel -> save();
				break;
			
			case 'goodsEdit2':
				$goodsPicModel=new \Admin\Model\GoodsPicModel();

           	 	$data=$goodsPicModel ->create(); //收集post表单数据
           		$z = $goodsPicModel ->add();
            
				break;
		}

		 $blackBox=new \Component\Blackbox();
		 if($z)
		 {
			$blackBox->location('添加成功',URL.'Admin/Goods/'.$step.'/goods_id/'.$goods_id);	
		 }
		 else
		 {
		 	$blackBox->location('操作出错',URL.'Admin/Goods/'.$step.'/goods_id/'.$goods_id);
		 }
	}
	/****
	将商品添加到回收站
	public function addTrash()
	{
		$goodsid=I('goodsid');
		
		$goodsModel=D('goods');
		$goodsinfo=$goodsModel->find($goodsid);
		
	}
	****/
	/***
	回收站中的商品
	
	public function goodsTrash(){
		$this->display('goodsTrash');
	}
	****/
	public function delGoods()
	{
		$goodsid=I('goodsid');
		$goodsModel=D('goods');
		$isOk=$goodsinfo=$goodsModel->delete($goodsid);
		
		$this->ajaxReturn(array('isOk'=>$isOk));
	}
	

	/***
	ajax 删除商品图片
	***/
	public function ajaxdelImg(){
		$imgsid=I('imgsid');
		
		$imgPicModel=D('goods_pic');
		$data=array('isSuc'=>1);	
		$data['isSuc']=$imgPicModel->delete($imgsid);

		$this->ajaxReturn($data);
	}
}
