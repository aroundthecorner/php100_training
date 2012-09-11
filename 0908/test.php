<?php
	include('db.class.php');
	$db = new db('localhost','root','xiaoxin','php100','utf8');
	if($db->connect()){
		header("Content-Type:text/html;charset=utf-8");
		echo "链接成功";
	}	
	
?>