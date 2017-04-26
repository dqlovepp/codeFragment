<?php
require('config.php');
require('functions.php');
// 1.获取json数据
$data = json_encode(array(
	'touser' => 'omejQsn7UCRttBjOotacALwlguQY',
	'msgtype' => 'text',
	'text' => array(
		'content' => 'Hi How are you ! Fine , thanks，and you ?',
	),
));
$at = getAccessToken();
echo http_post('https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token='.$at, $data, TRUE);

