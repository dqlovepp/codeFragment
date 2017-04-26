<?php
require('config.php');
require('functions.php');
/********** 获取二维码ticket ***************/
// 1.获取json数据
$data = json_encode(array(
	'action_name' => 'QR_LIMIT_SCENE',
	'action_info' => array(
		'scene' => array(
			'scene_id' => 1,  // 1-100000之间任意一个数就行，干什么用？用来标识这个图片，将来用户扫描这张图片时会把这个ID传给我们，我们就可以知道是哪张图片
		),
	),
));
// 2. 获取 access_token
$at = getAccessToken();
// 3. 通过POST请示接口
$ticket = http_post('https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token='.$at, $data, TRUE);
$ticket = json_decode($ticket, TRUE);
// 4.使用ticket兑换图片
$img = http_get('https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket='.urlencode($ticket['ticket']), TRUE);
file_put_contents('1.png', $img);

echo '图片已经生成，文件名：1.png';