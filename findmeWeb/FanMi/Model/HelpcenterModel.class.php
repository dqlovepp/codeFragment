<?php
namespace Model;
use Think\Model;

class HelpcenterModel extends Model
{
	//获取相应的footer信息
	public function footinfo()
	{
		$footer=$this->field('id,name,cname')->where('parentid=0')->select();
		$packfooter=array();
		foreach ($footer as $value) {
			$childFooter=$this->field('id,name,cname')->where('parentid='.$value['id'])->select();
			$packfooter[]=array('first'=>$value,'second'=>$childFooter);
		}
		return $packfooter;
	}

	public function onefoot($cname)
	{
		return $this->field('name,content')->where("cname='{$cname}'")->select();
	}

	public function lookfoot($id)
	{
		$child=$this->find($id);
		if(!empty($child))
		{
			$parent=$this->find($child['parentid']);
			return array('parent'=>$parent,'child'=>$child);
		}
		else
		{
			return null;
		}
	}
}