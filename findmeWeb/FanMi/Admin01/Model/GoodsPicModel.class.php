<?php
/***
author:lidequan
data:2015-01-12
***/
namespace Admin\Model;
use Think\Model;

class GoodsPicModel extends Model{
	protected $tablePrefix      =   'fm_';
	protected $filedPrefix      =   'goods_';
	protected $_validate = array(
				//array('goods_id', 'require', '商品编号不能为空！', 1),
						);

	protected function _before_insert(&$data, $option)
	{
		/********** 上传图片 ***********/
			$upload = new \Think\Upload();// 实例化上传类
			// php.ini中
			// upload_max_filesize = 2M   -->  单个上传文件不能超过这么大
			// post_max_size = 8M   -->   整个表单中的数据不能超过8M
			// 因为PHP.INI最大2M，所以这里最大不能超过2M
			$iniMaxSize = (int)ini_get('upload_max_filesize');
			if($iniMaxSize >= 4)
				$iniMaxSize = 4;
			$upload->maxSize   =     $iniMaxSize * 1024 * 1024 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		    $upload->rootPath  =     './public/'; // 设置附件上传根目录
		    $upload->savePath  =     'upload/'; // 设置附件上传（子）目录
		    // 上传文件 
		    $info   =   $upload->upload(array('logo' => $_FILES['logo']));
		    /* 生成三张缩略图的代码 */
		    $image = new \Think\Image(); 
		    // 定义图片的名字
		    // Goods/2014-19-19/121241fdsadf4.jpg
		    $logo = $info['logo']['savepath'] . $info['logo']['savename'];
		    $big_logo = $info['logo']['savepath'] . 'big_'. $info['logo']['savename'];
		    $mid_logo = $info['logo']['savepath'] . 'mid_'.$info['logo']['savename'];
		    $sm_logo = $info['logo']['savepath'] . 'sm_'.$info['logo']['savename'];

		    // 打开原图
			$image->open('./Public/' . $logo);
			// 如果要生成多张缩略图，要从大到小的生成
			$image->thumb(800, 800)->save('./Public/'.$big_logo);
			$image->thumb(130, 130)->save('./Public/'.$mid_logo);
			$image->thumb(50, 50)->save('./Public/'.$sm_logo);
			// 把图片的路径存到数据库中
			$data['undeal_img']=$logo;
		    $data['big_img'] = $big_logo;
		    $data['mid_img'] = $mid_logo;
		    $data['sm_img'] = $sm_logo;
	}
	public function  createParam($goods_id){
		/********************* 处理图片的代码 *********************/
		/********** 上传图片 ***********/
		$upload = new \Think\Upload();// 实例化上传类
		$iniMaxSize = (int)ini_get('upload_max_filesize');
		if($iniMaxSize >= 4)
			$iniMaxSize = 4;
		$upload->maxSize   =     $iniMaxSize * 1024 * 1024 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/'; // 设置附件上传根目录
		$upload->savePath  =     'upload/'; // 设置附件上传（子）目录
		// 上传文件 

		$info   =   $upload->upload(array('pics' => $_FILES['pics']));

		if($info !== FALSE)
		{
			$image = new \Think\Image();
			$tempdata=array();
			foreach ($info as $k => $v)
			{
			    $logo = $v['savepath'] . $v['savename'];
			    $mid_logo = $v['savepath'] . 'mid_'.$v['savename'];
			    $sm_logo = $v['savepath'] . 'sm_'.$v['savename'];
			    // 打开原图
				$image->open('./Public/' . $logo);
				// 如果要生成多张缩略图，要从大到小的生成
				$image->thumb(350, 350)->save('./Public/'.$mid_logo);
				$image->thumb(50, 50)->save('./Public/'.$sm_logo);
				// 把图片的路径存到数据库中
				$tempdata['sm_img']=$sm_logo;
				$tempdata['mid_img']=$mid_logo;
				$tempdata['big_img']=$logo;
				$tempdata['undeal_img']=$logo;
				$tempdata['goods_id']=$goods_id;
				$data[]=$tempdata;
			}
		}
		return $data;
	}
	// 第一个参数：插入到数据库中的数据的数组，其中$data['id']就是刚刚插入的商品的id
	protected function _after_insert($data, $option)
	{
		
	}
	protected function _before_update(&$data, $option)
	{

	}
	protected function _after_update($data, $option)
	{
	}
	// 删除数据前的回调方法
    protected function _before_delete($options) {
     	$imgInfo=$this->where('id='.$options)->find();
     	// 如果有新图上就删除原图
		@unlink('./Public/'.$imgInfo['undeal_img']);
		@unlink('./Public/'.$imgInfo['mid_img']);
		@unlink('./Public/'.$imgInfo['sm_img']);
		@unlink('./Public/'.$imgInfo['big_img']);
		var_dump($options);
    }   
}
