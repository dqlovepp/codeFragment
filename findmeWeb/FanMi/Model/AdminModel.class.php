<?php
namespace Model;
use Think\Model;

class AdminModel extends Model{
    //制作一个方法对用户名和密码进行校验
    function checkNamePwd($name,$pwd){
        $info = $this -> getByadmin_name($name);
        var_dump($info);
        if($info != null){
            if($info['admin_psw'] != $pwd){
                return false;
            } else {
                return $info;
            }
        } else {
            return false;
        }
    }
}
