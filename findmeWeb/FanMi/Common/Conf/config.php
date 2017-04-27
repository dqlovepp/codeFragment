<?php
return array(

'URL_MODEL'             =>  2, 
//PDO连接方式
'DB_TYPE'   => 'pdo', // 数据库类型
'DB_USER'   => 'lidequan', // 用户名
'DB_PWD'    => 'lidequan', // 密码
'DB_DSN'    => 'mysql:host=localhost;dbname=fanmidb;',
'DB_PREFIX'=>'fm_', //启用数据库前缀
'DB_CHARSET'=>'utf8',


'SHOW_PAGE_TRACE'=>true,  //是否输出运行信息

'LAYOUT_ON'=>true,    //启用模板
'LAYOUT_NAME'=>'HomeTemplate',   //模板的名字
'QQ_AUTH'  => array(
	'APP_ID'  => '101187093', //你的QQ互联APPID
	'APP_KEY' => 'e3be67094c51c0803aefc8b9846bc446',
	'SCOPE'   => 'get_user_info,get_repost_list,add_idol,add_t,del_t,add_pic_t,del_idol',
	'CALLBACK' => 'http://www.findme.wang/User/oauth/callback/type/qq.html',
 ),
'SINA_AUTH'=> array(
	'APP_ID'=>'209783629',
	'APP_KEY'=>'8c53ac8bab9fe9635a15ab08d8a905a1',
	'SCOPE'=>'get_user_info,get_repost_list,add_idol,add_t,del_t,add_pic_t,del_idol',
	'CALLBACK'=>'http://www.findme.wang/User/oauth/callback/type/sina.html',
	),
'TMPL_ACTION_ERROR'     =>  'Tpl/error', // 默认错误跳转对应的模板文件
'TMPL_ACTION_SUCCESS'   =>  'Tpl/success', // 默认成功跳转对应的模板文件
/************** 发邮件的配置 ***************/
	'MAIL_ADDRESS' => 'dequanLi_edu@126.com',   // 发货人的email
	'MAIL_FROM' => '德全个人网站',      // 发货人姓名
	'MAIL_SMTP' => 'smtp.126.com',   //邮件服务器的地址
	'MAIL_LOGINNAME' => 'dequanLi_edu@126.com',   
	'MAIL_PASSWORD' => '***',//邮箱密码
	// Email验证码有效期
	'EMAIL_CODE_EXPIRE_TIME' => 3600,
	// 用来DES加密的密钥
	'DES_KEY' => 'fd888_@#ldq_gewaq',
	// 使用的加密算法是什么
	'DATA_CRYPT_TYPE' => 'Des',
);