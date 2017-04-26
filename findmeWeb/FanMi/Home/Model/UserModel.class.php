<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {
// 插入数据前的回调方法
    protected function _before_insert(&$data,$options) {
      $data['user_regist_url']=get_client_ip();
      $data['user_pswd']=md5($data['user_pswd']);
      $data["user_regist_time"]=date("Y-m-d H:i:s");
      // 生成email验证码
	  $data['email_code'] = uniqid();
    }
    // 插入成功后的回调方法
    protected function _after_insert($data,$options) {
    	// 如果注册成功就把验证码发到邮箱中
   		$this->sendEmailCode($data['email_code'], $data['user_email'],$data['user_name']);
    }

//发送邮件
    public function sendEmailCode($code, $email,$user_name)
  {
  	$title='欢迎加入「泛米」';
  	$content='<p style="margin:8px 0 10px;padding:0;border:0;line-height:24px;word-wrap:break-word;color:#707b91;-webkit-text-size-adjust:auto">
  			亲爱的'.$user_name.'您好，<br><br>
			欢迎加入「泛米」！<br><br>你的注册邮箱是: 
			<a target="_blank" href="'.$email.'">'.$email.'</a><br>
			此注册邮箱地址可以帮助你在忘记密码的时候找回密码。<br><br>	
			点击下面的链接来确认您的邮箱地址:<br><a target="_blank" href="http://www.findme.wang/index.php/Home/User/chkEmail/code/'.$code.'.html">
			http://www.findme.wang/Home/User/chkEmail/code/'.$code.'.html</a><br><br><br>
			谢谢,<br>泛米团队<br><br><span style="font-size:12px;line-height:18px">
			如有任何建议或疑问，请联系我们<br>邮件: 
			<a target="_blank" href="mailto:344927522@qq.com">344927522@qq.com</a> 
			或者QQ: <span style="border-bottom:1px dashed #ccc;z-index:1" t="6" onclick="return false;" data="344927522">
			344927522</span><br><br>
			访问官方网站 <a target="_blank" href="http://www.findme.wang">www.findme.wang</a> 
			了解更多信息。</span></p>';
  	//sendMail('泛米网络验证码', "尊敬的$user_name:<br>您好&nbsp;&nbsp;&nbsp;&nbsp;请点击以下链接地址完成邮件的验证：<br /><a href='http://www.findme.wang/index.php/Home/User/chkEmail/code/{$code}'>立即验证'</a><br>如果无法点击，请复制下面链接到浏览器中激活注册http://www.findme.wang/index.php/Home/User/chkEmail/code/{$code}", $email);
  	sendMail($title,$content,$email);
  }

  public function login($data)
	{
		$username = $data['username'];
		$password = $data['password'];
		$user = $this->where("user_name='{$username}'")->find();
	
		if($user)
		{
			// 判断邮箱是否已经验证
			if($user['user_check'] == 0)
			{
				return 1;
			}
			else if($user['user_pswd'] != md5($password))
			{
				return 2;
			}
			else
			{
				// 登录成功
				session('fm_user_id', $user['user_id']);
				session('fm_user_name', $user['user_name']);
				// 计算会员级别ID和折扣率
			
				// 把购物车中的数据从COOKIE移动到DB中
				$cartModel = D('Cart');
				$cartModel->moveDataFromCookieToDb();
				// 判断是否要保存登录状态
				if(I('post.remember'))
				{
					$key = C('DES_KEY');
					$un = \Think\Crypt::encrypt($username, $key);
					$pd = \Think\Crypt::encrypt($password, $key);
					$aMonth = 30 * 3600 * 24;

					setcookie('username', $un, time() + $aMonth, '/', '.findme.wang');
					setcookie('password', $pd, time() + $aMonth, '/', '.findme.wang');
				}
				return 3;
			}
		}
		else 
		{
			return 2;
		}
	}

}

