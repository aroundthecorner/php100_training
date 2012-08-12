<?php
/*
 *遍历返回多级数组，返回值为一维数组
 *array listArray(array 数组源,&array 存放结果的数组)
 */
 $arr_a = array(
				array(1,2),
				array(3,array("a","b","c",array(11,22,33,44,55))),
				7,8,9);
 
 function listArray($arr,&$result){
	if(is_array($arr)){
		foreach($arr as $value){
			listArray($value,&$result);
		}
	}else{
		$result[] = $arr;	
	}
 }
 $result=array();
 
 listArray($arr_a,$result);
 print_r($result);
 
 echo "<br>";
/*
 *将时间戳转为特定时间,返回
 *array getDate(时间戳)
 */
 print_r(getDate());
 /*
 echo "<br><br>-----------时间函数----------<br>";
 $m = microtime();
 echo "<br>$m";
*/
 ?>