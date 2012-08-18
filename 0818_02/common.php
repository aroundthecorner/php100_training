<?php
//存放用户名和密码的文件
define('DB','db.txt');

//记录本文件的文件名加后缀
function get_file($file_path){
	preg_match('/[\/\\\\]([\w\.]*)$/',$file_path,$result);
	return(isset($result[1])?$result[1]:"");
}

//检查用户名和密码
function check_user($username,$pwd){
	$check_str = strtolower($username).':'.$pwd."\r\n";
	$file_content = file(DB);
	if(in_array($check_str,$file_content)){
		return true;
	}
	return false;
}
 
//查找重复用户名
function check_double($username){
	$file_content = implode(file(DB));
	$file_content = str_replace("\r\n","##",$file_content);
	if(preg_match('/#?'.$username.':/',$file_content,$result)){
		return true;
	}
	return false;
}

//注册保存用户名和密码
function reg_write($username,$pwd){
	$file_h = fopen(DB,'a+');
	if(fwrite($file_h,strtolower($username).':'.$pwd."\r\n")){
		fclose($file_h);
		return true;
	}
	return false;
}
?>