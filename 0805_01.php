<?php
	/*
	//正则
	$patten = '/^https?\:\/\/[\w\.\-]+[^\.\/][\w\/]$/';
	$input = "http://ww.ww-h/";
	if(preg_match($patten,$input,$arr)){
		echo "match!<br/>";
	}else{
		echo "not match!<br/>";
	}
	print_r($arr);
	*/

$input_url = "http://www.baidu.com";
$pp = "/<meta http-equiv=\"Content-Type\" content=\"text\/html;charset=(gb2312)\">/";
$get_content = file_get_contents($input_url);
if(preg_match_all($pp,$get_content,$arr)){
	echo "匹配到了<br>";
}else{
	echo "sorry<br>";
}
print_r($arr);
echo "<br>";
echo count($arr);
?>