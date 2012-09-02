<?php
	include('db.php');
	//page($p_total,$p_current,$url,$total,$p_pagelen=5,$p_leftgap=2,$p='p')
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>test</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<?php
				//echo page(20,5,'index.php',100);
				//$arr = my_mysql_query('select * from news_type');
				//print_r($arr);
				$ret_arr = "";
				get_child(0,1,$ret_arr,true);
				echo '<select>';
				echo ($ret_arr);
				echo '</select>';
			?>
	</body>
</html>