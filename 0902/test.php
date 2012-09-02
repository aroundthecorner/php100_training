<?php
	include('db.php');
	//page($p_total,$p_current,$url,$total,$p_pagelen=5,$p_leftgap=2,$p='p')
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>分页</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<?php
				echo page(20,5,'index.php',100);
			?>
	</body>
</html>