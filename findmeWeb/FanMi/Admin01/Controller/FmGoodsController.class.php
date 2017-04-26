<?php
/***
author:lidequan
data:2015-01-12
***/
namespace Admin\Controller;
use Think\Controller;

class GoodsController extends Controller{
	/***
	商品列表展示
	**/
	public function showlist(){
		$this->display('goodsList');
	}
	/***
	商品添加
	**/
	public function goodsAdd(){
		if(!empty($_POST)){
            //判断附件是否有上传
            //如果有则实例化Upload，把附件上传到服务器指定位置
            //然后把附件的路径名获得到，存入$_POST
            if(!empty($_FILES)){
                $config = array(
                    'rootPath'      =>     './public/',  //根目录
                    'savePath'      =>     'upload/', //保存路径
                );
                //附件被上传到路径：根目录/保存目录路径/创建日期目录
                $upload = new \Think\Upload($config);
                //uploadOne会返回已经上传的附件信息
                $z = $upload -> uploadOne($_FILES['goods_img']);
                if(!$z){
                    var_dump($upload->getError()); //获得上传附件产生的错误信息
                }else {
                    //拼装图片的路径名
                    $bigimg = $z['savepath'].$z['savename'];
                    $_POST['goods_big_img'] = $bigimg;
                    
                    //把已经上传好的图片制作缩略图Image.class.php
                    $image = new \Think\Image();
                    //open();打开图像资源，通过路径名找到图像
                    $srcimg = $upload->rootPath.$bigimg;
                    $image -> open($srcimg);
                    $image -> thumb(150,150);  //按照比例缩小
                    $smallimg = $z['savepath']."small_".$z['savename'];
                    $image -> save($upload->rootPath.$smallimg);
                    $_POST['goods_small_img'] = $smallimg;
                }
            }
            var_dump($_POST);
           // $goods -> create(); //收集post表单数据
            //$z = $goods -> add();
            if($z){
                //$this ->success('添加商品成功', U('Goods/showlist'));
                echo "success";
            } else {
                //$this ->error('添加商品失败', U('Goods/showlist'));
                echo "error";
            }
        }else {
        	$goodsModel=new \admin\GoodsModel();
        	var_dump($goodsModel);
        	$goodsCateogry=new \Admin\Model\FmGoodsCategoryModel();
			$categoryinfo=$goodsCateogry->select();

			$goodsBrand=new \Admin\Model\GoodsBrandModel();
			$Brandinfo=$goodsBrand->select();

			$this->assign('Brandinfo',$Brandinfo);
			$this->assign('categoryinfo',$categoryinfo);
			$this->display('goodsAdd');
        }
	}
	/***
	商品修改
	**/
	public function goodModify(){
		$this->display('goodModify');
	}
	/***
	回收站中的商品
	****/
	public function goodsTrash(){
		$this->display('goodsTrash');
	}
	/***
	品牌列表
	****/
	public function brandList(){
		$this->display('brandList');
	}
	/***
	添加品牌
	****/
	public function brandAdd(){
		$this->display('brandAdd');
	}
}
