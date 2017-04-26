<?php
namespace Admin\Controller;
use Think\Controller;
class ManagerController extends Controller {
  // 登录
	public function login(){
    if(!empty($_POST)){
            //验证码校验
            $verify = new \Think\Verify();
            if(!$verify->check($_POST['captcha'])){
              $blackbox=new \Component\Blackbox();
              $blackbox->alert_back('验证码错误');
            } else {
                //判断用户名和密码，在model模型里边制作一个专门方法进行验证
                $user = new \Model\AdminModel();
                $rst = $user -> checkNamePwd($_POST['fm_username'],$_POST['fm_password']);
                if($rst === false){
                    $blackbox=new \Component\Blackbox();
                   // $blackbox->alert_back('用户名或密码错误');
                } else {
                    //登录信息持久化$_SESSION
                    session('mg_username',$rst['mg_name']);
                    session('mg_id',$rst['mg_id']);
                    $this -> redirect('Index/index');
                }
            }
        } 
    $this -> assign('lang',L());
    //var_dump(L());
    $this -> display('Manager/login');
	}

  //退出登录
  function logout(){
        session(null);
        $this -> redirect("Manager/login");
    }
  //验证码
  function verifyImg(){
        //以下类Verify在之前并没有include引入
        //走自动加载Think.class.php  autoload()
        $config = array(
            'imageH'    => 24,               // 验证码图片高度
            'imageW'    => 105, 
            'fontSize'  => 14,
            'fontttf'   => '4.ttf',              // 验证码字体，不设置随机获取
            'length'    => 4,               // 验证码位数
        );
        $verify = new \Think\Verify($config);
        $verify -> entry();
    }
//二维码
	 public  function qrcode($data='http://yj.ccnu.edu.cn/CompantWeb/studentid/',$size='4',$level='L',$padding=2,$logo=true){
   		  $studentid=I('get.studentid')?I('get.studentid'):0;
   		  $data=$data.$studentid;
  		  $size=I('get.size')?I('get.size'):$size;
  		  $level=I('get.level')?I('get.level'):$level;
   		  $padding=I('get.padding')?I('get.padding'):$padding; 		 
   		 vendor("phpqrcode.phpqrcode");
   		 $path='http://yj.ccnu.edu.cn/CompantWeb/FanMi/resource/';
        \QRcode::png($data,false, $level, $size,$padding);
	}
}