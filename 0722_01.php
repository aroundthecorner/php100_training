<?php
/*
 *�������ض༶���飬����ֵΪһά����
 *array listArray(array ����Դ,&array ��Ž��������)
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
 *��ʱ���תΪ�ض�ʱ��,����
 *array getDate(ʱ���)
 */
 print_r(getDate());
 /*
 echo "<br><br>-----------ʱ�亯��----------<br>";
 $m = microtime();
 echo "<br>$m";
*/
 ?>