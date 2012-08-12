<?php
$page_header = <<< header
	<!doctype html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>php100 8-11 网站计数</title>
		<style>
			body{font-size:12px;color:#342E2B;margin:0;padding:0;font-family:Arial,微软雅黑;background-color:#efefef;}
			img{border:0;}
			#content{text-align:center;color:#fff;background-color:#060606;height:90px;padding:5px;margin-top:100px;font-size:14px;line-height:28px;}
		</style>
	</head>
	<body>
	<div id="content">
header;

$page_footer = <<< footer
	</div>
	</body>
	</html>
footer;


	$file_name = 'no.txt';
    $fp = fopen($file_name,'r');
	$current_no = (int)fgets($fp);
	fclose($fp);
	
	$fp = fopen($file_name,'w');
	$current_no++;
	fwrite($fp,$current_no);
	fclose($fp);
	$output_str = '<div>';
	for($i=0;$i<strlen($current_no);$i++){
		$output_str.='<img width="64px" height="64px" src="images/'.substr($current_no,$i,1).'.png"/>';
	}
	$output_str.='</div>';
	echo $page_header;
	echo "本页面被点击次数<br>";
	echo $output_str;
	echo $page_footer;
	

?>