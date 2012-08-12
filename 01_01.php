<?php
	/*
	$w_title = '标题';		//注释
	$p1 = "p2";
	$p2 = "p3";
	$p3 = "p4";
	$p4 = "p5";
	
	echo $$$$p1;
	*/
/*	
	$w_long_str = <<<LONG_STR
		这是个长字符串，那是相当的长啊，长啊长啊~~
		<!DOCTYPE html>
		<html>
			<head></head>
			<body>
				<div style="color:red;">娘亲啊~</div>
			</body>
		</html>
		
LONG_STR;
	
	echo $w_long_str;
*/
	class test{
		function whoAmI(){
			var_dump(__CLASS__);
			echo "<br>";
			var_dump(__METHOD__);
		}
	}
	
	var_dump(__FILE__);
	echo "<br>";
	var_dump(__LINE__);
	echo "<br>";
	$me = new test();
	$me->whoAmI();
	echo "<br>";
	var_dump(PHP_VERSION);
	echo "<br>";
	var_dump(PHP_OS);
	echo "<br>";
	
	
	define('THISPAGE',100000);
	define('NL','<br>');
	echo THISPAGE;
	echo "<br>";
	if(defined('THISPAGE')){ echo "my god<br>";}
	echo THISPAGE.NL;
	$a = 102;
	$b = '1a10a';
	var_dump($a==$b);
	
?>
<!-- <a href="01_02.php">click here</a> -->