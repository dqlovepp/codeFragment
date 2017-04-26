<?php
require('config.php');
require('functions.php');
$act = isset($_GET['act']) ? $_GET['act'] : '';
// 先判断有没有接收到数据
if(!empty($GLOBALS["HTTP_RAW_POST_DATA"]))
{
	// 解析xml
	$postObj = simplexml_load_string($GLOBALS["HTTP_RAW_POST_DATA"], 'SimpleXMLElement', LIBXML_NOCDATA);
	// 判断这个XML数据的类型
	if(isset($postObj->MsgType))
	{
	    switch ($postObj->MsgType) {
	    	case 'text':
	    		// 存到本地
				file_put_contents('./message/'.$postObj->FromUserName.'-'.$postObj->CreateTime, $postObj->Content);
				// 消息发回去
					$textTpl = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
        			$resultStr = sprintf($textTpl, $postObj->FromUserName, APPID, time(), 'text', $postObj->Content);
    				echo $resultStr;
	    		break;
	    	case 'image':
	    		
	    		break;
	    	case 'voice':
	    		
	    		break;
	    	case 'video':
	    		
	    		break;
	    	case 'location':
	    		
	    		break;
	    	case 'link':
	    		
	    		break;
	    	case 'event':
	    		if($postObj->Event == 'subscribe')
	    		{
				
	    		}
	    		elseif ($postObj->Event == 'unsubscribe')
	    		{
	    			
	    		}
	    		elseif ($postObj->Event == 'VIEW') {
	    			
	    		}
	    		elseif ($postObj->Event == 'CLICK') {
	    			
	    		}
	    		elseif ($postObj->Event == 'LOCATION') {
	    			
	    		}
	    		elseif ($postObj->Event == 'SCAN')
	    		{
                                   
	    		}
	    		break;
	    	default:
	    		echo '';
	    		break;
	    }
	exit;
	}
}
if($act == '')
{
	$echoStr = $_GET["echostr"];  // 一个字符串
	$signature = $_GET["signature"]; // 加密之后的字符串
    $timestamp = $_GET["timestamp"];  // 时间
    $nonce = $_GET["nonce"];	   // 响应字符串
    // 自己根据加密算法生成加密串
	$tmpArr = array('php28', $timestamp, $nonce);
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );
	// 用自己生成的加密串和对方传加密串进行比较
	if($tmpStr == $signature)
		echo $echoStr;   // 验证成功返回响应的字符串
}
