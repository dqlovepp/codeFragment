<?php

$kw = isset($_GET['q']) ? $_GET['q'] : null;
$kw = strtolower($kw);

if (!empty($kw)) {
	$arr = array('li','zhao');
	$result = array(
			'li' => '{"AS":{"Query":"li","FullResults":1,"Results":[{"Type":"AS","Suggests":[{"Txt":"李易峰","Type":"AS","Sk":"","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e6%98%93%e5%b3%b0\u0026qs=AS\u0026sk=","HCS":0.2389},{"Txt":"李彦宏","Type":"AS","Sk":"AS1","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e5%bd%a6%e5%ae%8f\u0026qs=AS\u0026sk=AS1"},{"Txt":"里约奥运会","Type":"AS","Sk":"AS2","Url":"http://www.bing.com/results.aspx?q=%e9%87%8c%e7%ba%a6%e5%a5%a5%e8%bf%90%e4%bc%9a\u0026qs=AS\u0026sk=AS2"},{"Txt":"李晨","Type":"AS","Sk":"AS3","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e6%99%a8\u0026qs=AS\u0026sk=AS3"},{"Txt":"linkedin","Type":"AS","Sk":"AS4","Url":"http://www.bing.com/results.aspx?q=linkedin\u0026qs=AS\u0026sk=AS4"},{"Txt":"李钟硕","Type":"AS","Sk":"AS5","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e9%92%9f%e7%a1%95\u0026qs=AS\u0026sk=AS5"},{"Txt":"李连杰","Type":"AS","Sk":"AS6","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e8%bf%9e%e6%9d%b0\u0026qs=AS\u0026sk=AS6"},{"Txt":"李毅吧","Type":"AS","Sk":"AS7","Url":"http://www.bing.com/results.aspx?q=%e6%9d%8e%e6%af%85%e5%90%a7\u0026qs=AS\u0026sk=AS7"}]}]}}',
			'zhao' => '{"AS":{"Query":"zhao","FullResults":1,"Results":[{"Type":"AS","Suggests":[{"Txt":"赵丽颖","Type":"AS","Sk":"","Url":"http://www.bing.com/results.aspx?q=%e8%b5%b5%e4%b8%bd%e9%a2%96\u0026qs=AS\u0026sk=","HCS":0.2864},{"Txt":"招商银行信用卡中心","Type":"AS","Sk":"AS1","Url":"http://www.bing.com/results.aspx?q=%e6%8b%9b%e5%95%86%e9%93%b6%e8%a1%8c%e4%bf%a1%e7%94%a8%e5%8d%a1%e4%b8%ad%e5%bf%83\u0026qs=AS\u0026sk=AS1"},{"Txt":"赵薇","Type":"AS","Sk":"AS2","Url":"http://www.bing.com/results.aspx?q=%e8%b5%b5%e8%96%87\u0026qs=AS\u0026sk=AS2"},{"Txt":"召唤小冰","Type":"AS","Sk":"AS3","Url":"http://www.bing.com/results.aspx?q=%e5%8f%ac%e5%94%a4%e5%b0%8f%e5%86%b0\u0026qs=AS\u0026sk=AS3"},{"Txt":"招聘","Type":"AS","Sk":"AS4","Url":"http://www.bing.com/results.aspx?q=%e6%8b%9b%e8%81%98\u0026qs=AS\u0026sk=AS4"},{"Txt":"最好的我们","Type":"AS","Sk":"AS5","Url":"http://www.bing.com/results.aspx?q=%e6%9c%80%e5%a5%bd%e7%9a%84%e6%88%91%e4%bb%ac\u0026qs=AS\u0026sk=AS5"},{"Txt":"招商银行网上银行","Type":"AS","Sk":"AS6","Url":"http://www.bing.com/results.aspx?q=%e6%8b%9b%e5%95%86%e9%93%b6%e8%a1%8c%e7%bd%91%e4%b8%8a%e9%93%b6%e8%a1%8c\u0026qs=AS\u0026sk=AS6"},{"Txt":"招商证券","Type":"AS","Sk":"AS7","Url":"http://www.bing.com/results.aspx?q=%e6%8b%9b%e5%95%86%e8%af%81%e5%88%b8\u0026qs=AS\u0026sk=AS7"}]}]}}'
		);
	if (in_array($kw, $arr)) {
		echo $result[$kw];
	} else {
		echo '{"AS":{"Query":"","FullResults":0}}';
	}
	exit();
}