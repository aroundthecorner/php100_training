<?php
	/*
	 *empty与isset对比
	 */
	 header('Content-Type:text/html;charset=utf-8');
	 $id=0;
	 
	 echo "========>测试0<br>";
	 if(empty($id)){
		echo "empty测试为真 <br>";
	 }
	 if(!isset($id)){
		echo "isset测试为假<br>";
	 }else{
		echo "--isset判断为真<br>";
	 }
	 
	 echo "========>测试NULL<br>";
	 $id=NULL;
	 if(empty($id)){
		echo "empty测试为真 <br>";
	 }
	 if(!isset($id)){
		echo "isset测试为假 <br>";
	 }else{
		echo "--isset判断为真<br>";
	 }
	 
	 echo "========>测试'0'<br>";
	 $id="0";
	 if(empty($id)){
		echo "empty测试为真 <br>";
	 }
	 if(!isset($id)){
		echo "isset测试为假 <br>";
	 }else{
		echo "--isset判断为真<br>";
	 }
	 
	 
	 echo "========>测试空字符串<br>";
	 $id="";
	 if(empty($id)){
		echo "empty测试为真 <br>";
	 }
	 if(!isset($id)){
		echo "isset测试为假 <br>";
	 }else{
		echo "--isset判断为真<br>";
	 }
	 
?>