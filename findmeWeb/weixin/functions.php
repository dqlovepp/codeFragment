<?php
/**** 如何用PHP模拟GET和POST请示（方法一、fsockopen自己处理HTTP协议字符串 方法二、使用curl套函数要开启php_curl扩展 */
// GET方式提交数据
function http_get($url, $ssl = FALSE)
{
	$curl = curl_init(); // 启动一个CURL会话
	curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	if($ssl)
	{
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
		curl_setopt($curl, CURLOPT_SSLVERSION, 3);
	}
	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
	curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
	curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
	curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
	$tmpInfo = curl_exec($curl); // 执行操作
	if (curl_errno($curl)) {
		var_dump(curl_error($curl));
		return FALSE;
	}
	curl_close($curl); // 关闭CURL会话
	return $tmpInfo; // 返回数据
}
// post方式提交数据
// 第三个参数：如果请求的地址是https的那么需要设置为true
function http_post($url, $data, $ssl = FALSE)
{ // 模拟提交数据函数
	$curl = curl_init(); // 启动一个CURL会话
	curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
	if($ssl)
	{
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); // 从证书中检查SSL加密算法是否存在
		curl_setopt($curl, CURLOPT_SSLVERSION, 3);
	}
	curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
	curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
	curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
	curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
	curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
	$tmpInfo = curl_exec($curl); // 执行操作
	if (curl_errno($curl)) {
		return FALSE;
	}
	curl_close($curl); // 关闭CURL会话
	return $tmpInfo; // 返回数据
}
// 带缓存的，获取access_token
function getAccessToken()
{
	$cache_name = './cache_access_token';
	if(file_exists($cache_name) && (time() - filemtime($cache_name)) <= 5000)
		return file_get_contents($cache_name);
	else 
	{
		// 如果没有缓存就请示接口获取数据并生成缓存文件
		$ret = http_get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.APPCODE, TRUE);
		// 把JSON转化成一个数组
		$ret = json_decode($ret, TRUE);
		file_put_contents($cache_name, $ret['access_token']);
		return $ret['access_token'];
	}
}























