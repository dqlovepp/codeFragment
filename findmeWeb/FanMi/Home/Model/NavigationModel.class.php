<?php
namespace Home\Model;
use Think\Model;
class NavigationModel extends Model {
  	private $filedPrefix='nav_'; //字段前缀

  	public function getAllNav($cateType){
  		$data=array();
  		$packData=array();
  		$data=$this->order("nav_rank ASC,nav_id ASC")->where('nav_type='.$cateType)->select();
  		foreach ($data as $list=>$alldatas) {
  			 foreach ($alldatas as $key => $value) {
  			 	$packData[$list][substr($key,4)]=$value;
  			 }
  		}
  		return $packData;
  	}
}