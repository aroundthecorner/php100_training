<?php
	include('db.class.php');
	include('listArray.class.php');
	include('a.class.php');
	include('b.class.php');
	
	$test = new a('localhost','root','xiaoxin','php100','utf8');
	$test->showList();
?>