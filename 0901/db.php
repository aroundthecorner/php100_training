<?php
	//数据库信息
	$DB_CONFIG = array(
		'HOST'			=> 'localhost',				
		'DB_NAME' 		=> 'php100',
		'USER_NAME'		=> 'root',
		'USER_PWD' 		=> 'xiaoxin',
		'DB_CHARSET' 	=> 'UTF8'
	);
	//链接数据库
	$db_conn = mysql_connect($DB_CONFIG['HOST'],$DB_CONFIG['USER_NAME'],$DB_CONFIG['USER_PWD']) or die('链接数据库失败...（出错信息:'.mysql_error().')');
	mysql_select_db($DB_CONFIG['DB_NAME']) or die('选择数据库失败...(出错信息:'.mysql_error().')');
	mysql_query("set names '".$DB_CONFIG['DB_CHARSET']."'");
	
	//处理post的数据，清除不规则内容，待完成
	function handle_post($val){
		$result = trim($val);				//去除空白
		return $result;
	}
?>