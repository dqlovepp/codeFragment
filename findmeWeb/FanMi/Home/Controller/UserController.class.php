<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends \Home\Controller\APPHomeController {
 
 /***
用户编号  fm_user_id
用户名称 fm_user_name
 ****/
 //用户注册
 public function register(){
 	$this->assign('layoutType','Empty');
 	$this->display('regist');
 }
 //用户登录
 public function Login(){
    if(IS_POST)
    {
        $very=new \Think\Verify();
        if($very->check( I('post.checkcode')))
        {
            $memberModel = D('user');
            $data=array();
            $data['username']=I("post.username");
            $data['password']=I("post.password");
            $res=$memberModel->login($data);
            if($res==3)
            {
                $this->assign('layoutType','Layout1');
                $this->redirect('Home/Index/index'); 
            }
            elseif ($res == 1)
            {
                $this->assign('layoutType','Layout1');
                $this->success('必须经过邮箱验证才可以登录！',URL.'Home/User/login',5); 
            }
            else
            {
               $this->assign('layoutType','Layout1');
               $this->success('用户名或密码错误',URL.'Home/User/login',3); 
            }
        }
        else
        {
            $this->assign('layoutType','Layout1');
            $this->success('验证码错误',URL.'Home/User/login',3);
        }
    }
    else
    {
      $this->assign('layoutType','Empty');
      $this->display('login');  
    } 	
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

  // 验证验证码
   public function chkEmail($code)
   {
        // 第一步查询数据库中有没有这个验证码
        $memberModel = D('user');
        $et = C('EMAIL_CODE_EXPIRE_TIME');  //获取邮箱失效时间
        $m = $memberModel->where("email_code='$code'")->find();
        if($m)
        {
            if(time()-strtotime($m['user_regist_time']) < $et)
            {
                $data=array('user_check'=>1,'email_code'=>'');
                $memberModel->where('user_id='.$m['user_id'])->save($data);

                $this->assign('layoutType','Layout1');
                $this->success('验证成功，请登录', U('login'));
            }
            else 
            {
                header('Content-Type:text/html;charset=utf-8');
                //echo time()-strtotime($m['user_regist_time']);
                $this->assign('layoutType','Layout1');
                $this->success('验证码无效或者已经过期，正在重新发送验证码',U('resendEmailCode', array('code' => $code)),3);
            }
        }
        else 
        {
            $this->assign('layoutType','Layout1');
            $this->success('验证码无效', U('login'));
        }
   }   
    public function resendEmailCode($code)
   {
        $member = D('user');
        $info = $member->where('email_code="'.$code.'"')->find();

        // 如果这个会员还没有验证
        if($info['user_check'] == 0)
        {
            $newCode = uniqid();
            // 更新新的验证码
            $member->where('user_id='.$info["user_id"])->save(array(
                'email_code' => $newCode,
                'user_regist_time' => date('Y-m-d H:i:s')
            ));

            $member->sendEmailCode($newCode, $info['user_email'],$info['user_name']);

            $this->assign('layoutType','Layout1');
            $tempUrl=strrchr($info['user_email'],'@');
            $tempUrl=substr($tempUrl,1);
            $tempUrl='http://mail.'.$tempUrl;

            $this->success('邮件已发送请到邮箱中查收！', $tempUrl);
        }
        else 
        {
            $this->assign('layoutType','Layout1');
            $this->success('会员已经验证了！', U('login'));
        }
   }

    /****
  注册处理
  ***/
  public function regist(){  
    //验证验证码
    $very=new \Think\Verify();
    if($very->check( I('post.checkcode')))
    {
      $userData=array();
      $userData['user_name']=I('post.username');
      $userData['user_pswd']=I('post.password');
      $userData['user_email']=I('post.email');
      if(empty($userData['user_name']) || empty($userData['user_pswd']))
      {
        $this->assign('layoutType','Layout1');
        $this->success('输入的信息不符合要求',URL.'Home/User/register',3);
      }
      else if($userData['user_pswd'] !=I('post.wpassword'))
      {
        $this->assign('layoutType','Layout1');
        $this->success('确认密码与密码不相同',URL.'Home/User/register',3);
      }
      else if($this->IsExit("name",$userData['user_name']) !=0)
      {
        $this->assign('layoutType','Layout1');
        $this->success('该用户名已经被注册过了',URL.'Home/User/register',3);
      }
      else if($this->IsExit("email",$userData['user_email']) !=0)
      {
        $this->assign('layoutType','Layout1');
        $this->success('该邮箱已经被注册过了',URL.'Home/User/register',3);
      }
      else if($this->isEvilRegist())
      {
        $this->assign('layoutType','Layout1');
        $this->success('由于你注册的过于频繁，请隔断时间再注册。',URL.'Home/Index/Index',3);
      }
      else
      {
        $userModel=D("user");
        if($userModel->add($userData))
        {
          $this->assign('layoutType','Layout1');
          //email http://mail.qq.com  //agwio@qq.com
          // $tempUrl=strrchr($userData['user_email'],'@');
          // $tempUrl='http://mail.'.$tempUrl;
          $tempUrl=strrchr($userData['user_email'],'@');
          $tempUrl=substr($tempUrl,1);
          $tempUrl='http://mail.'.$tempUrl;
          $this->success('注册成功,请登录邮箱进行验证',$tempUrl,2);
        }
        else
        {
          $this->assign('layoutType','Layout1');
          $this->success('系统繁忙，请稍后注册',URL.'Home/User/register',3);
        }
      }   
    }  
    else
    {
      $this->assign('layoutType','Layout1');
      $this->success('验证码错误',URL.'Home/User/register',3);
    } 
  }

  public function IsExit($ParmsName=null,$parmsvalue=null){
    $keyName=empty($ParmsName)?I('post.data'):$ParmsName;
    $keyvalue=empty($parmsvalue)?I('post.value'):$parmsvalue;

    $userModel=D("user");
    $isExit=$userModel->where("user_$keyName='$keyvalue'")->count();
    if(empty($ParmsName))
    {
      $data=array('isOk'=>$isExit);
      $this->ajaxReturn($data);
    }
    else
    {
      return $isExit;
    }
  }
  //判断是否是注册过于频繁，一周了注册不能超过5次
  public function isEvilRegist(){
    $userModel=D("user");
    $clientIp=get_client_ip();
    $where = "DateDiff(user_regist_time,now())<=24 AND user_regist_url='$clientIp'";
    $result = $userModel->where($where)->count();
    return ($result>3)?true:false;
  }

  public function logout()
    {
        session(null);
        setcookie('username', '', 1 , '/', '.findme.wang');
        setcookie('password', '', 1 , '/', '.findme.wang');
        $this->assign('layoutType','Layout1');
        $this->redirect('Home/index/index');
       // $this->success('退出成功',URL.'Home/index/index',2);
    }
//修改个人信息 
    public function modifyinfo()
    {
        $userModel=D('user');
        $userModel->create();
        $isOk=$userModel->where("user_id=".I("user_id"))->save();

        $result=array();
        $result['isOk']=$isOk;
        $this->ajaxReturn($result);
    }
    //寻找密码
    public function seekpw(){
      $username=I('username');
      $email=I('email');
      
      if(empty($email) || empty($username))
      {
        $this->assign('layoutType','Empty');
        $this->display();
      }
      else
      {
        $this->assign('layoutType','Layout1');
        //判断使用户名，邮箱是否存在
        $user=D('user');
        $isExit=$user->where('user_name="'.$username.'" AND user_email="'.$email.'"')->find();
        if(empty($isExit))
        {
           $this->error('用户名和邮箱不匹配');
        }
        else
        {
          $newCode = uniqid();
            // 更新新的验证码

          $user->where('user_id='.$isExit["user_id"])->save(array(
                'email_code' => $newCode
            ));

          $mainTitle='泛米科技网络有限公司，找回密码';
          $content='<p style="margin:8px 0 10px;padding:0;border:0;line-height:24px;word-wrap:break-word;color:#707b91;-webkit-text-size-adjust:auto">
          亲爱的'.$username.'您好，<br><br>
          欢迎加入「泛米」！<br><br> 
          点击下面的链接来来修改密码:<br><a target="_blank" href="http://www.findme.wang/index.php/Home/User/seekpwStep2/code/'.$newCode.'.html">
          http://www.findme.wang/Home/User/seekpwStep2/code/'.$newCode.'.html</a><br><br><br>
          谢谢,<br>泛米团队<br><br><span style="font-size:12px;line-height:18px">
          如有任何建议或疑问，请联系我们<br>邮件: 
          <a target="_blank" href="mailto:344927522@qq.com">344927522@qq.com</a> 
          或者QQ: <span style="border-bottom:1px dashed #ccc;z-index:1" t="6" onclick="return false;" data="344927522">
          344927522</span><br><br>
          访问官方网站 <a target="_blank" href="http://www.findme.wang">www.findme.wang</a> 
          了解更多信息。</span></p>';

           sendMail($mainTitle,$content, $email);                          
           $tempUrl=strrchr($email,'@');
           $tempUrl=substr($tempUrl,1);
           $tempUrl='http://mail.'.$tempUrl;

           $this->success('请登录邮箱，进行下一步操作',$tempUrl,2);
        }       
      }
    } 
    public function  seekpwStep2(){
      $this->assign('layoutType','Empty');
      $code=I('code');
      $memberModel = D('user');
      $m = $memberModel->where('email_code="'.$code.'"')->find();
      if(empty($m))
      {
        $this->success('验证码无效或者已经过期，请重新发送验证码',U('Home/Index/index'),3);
      }
      else
      {
         $this->assign('userid',$m['user_id']);
         $this->display(); 
      }
    }

    public function changePW(){
      $this->assign('layoutType','Empty');
      $userid=I('userid');
      $userpw=I('userpw');
      $userpw2=I('userpw2');
      //更新密码
      $length=mb_strlen($userpw,'utf-8');
      if($userpw !=$userpw2 || $length<3 || $length>20 || !is_numeric($userid))
      {
        $this->error('参数非法');
        
      }
      else
      {
        $userpw=md5($userpw);
        $member= D('user');
        $isOk=$member->where('user_id=30')->save(
          array(
            'user_pswd'=>$userpw
            ));
        if($isOk)
        {
          $this->success('密码修改成功!',U('User/login'),2);
        }
        else
        {
          $this->error('密码不能与原始密码一致');
        }
      }
    }
    
}