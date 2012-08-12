<?php

	/**
	 *作业1：乘法表
	 *string fo(&返回值，下限，上限）
	 */
	echo "----------------作业1<br>";

	function fo(&$a,$begin=1,$end=9){
	$a=$begin."~".$end."的乘法表<br>";
	for($i=$begin;$i<=$end;$i++){
		for($j=1;$j<=$i;$j++){
			$a .= "$i"."x"."$j=".$i*$j.($i*$j>=10?"&nbsp;&nbsp;":"&nbsp;&nbsp;&nbsp;&nbsp;");
		}
		$a .="<br>";
	}
	}
	$a="";
	fo($a);
	echo $a;
	fo($a,5,8);
	echo $a;

	echo "<br>----------------作业2<br>";
	/*
	*作业2：生成1到100的数组
	*/
	$arry=array();
	for($n=1;$n<=100;$n++){
	$arry[]=$n;
	}
	print_r($arry);
	echo "<br>";

	/*
	*数组函数练习
	*/
	echo "创建数组array：<br>";
	$test = array("a"=>1,"b"=>2,"c"=>3,"f"=>"abcd");
	print_r($test);

	echo "<br><br>创建一个数组，用一个数组的值作为键名，另一个参数的值作为键值，array_combine()<br>";
	$array_a = array("a","b",0);
	$array_b = array("aa","bb","cc");
	$array_c = array("a"=>1,"b"=>2,"c"=>3,"d"=>4,"e"=>4);
	print_r(array_combine($array_a,$array_b));

	echo "<br><br>统计数组中所有的值(只统计键值)出现的次数,array_count_values()<br>";
	print_r(array_count_values($array_c));

	echo "<br><br>用给定的值填充数组array_fill(),第一个参数起始键标，第二个填充个数，第三个参数为要填充的值<br>";
	print_r(array_fill(5,3,"aaa"));
	
	echo "<br><br>交换数组中的键和值array_flip(),如果原数组值相同，则已最后出现的键值对作为结果<br>";
	print_r(array_flip($array_c));
	
	echo "<br><br>返回数组中所有的键名array_keys()<br>";
	print_r(array_keys($array_c));
	
	echo "<br><br>用值将数组填补到指定长度array_pad(数组,长度，填充值),如果已有键名，从0开始补充下标<br>";
	print_r(array_pad($array_b,10,"aaa"));
	
	echo "<br><br>计算数组中所有值的乘积array_product<br>";
	echo array_product($array_c);
	
	echo "<br><br>从数组中随机取出一个或多个单元array_rand(),返回键名，多个时返回键名组成的数组<br>";
	print_r(array_rand($array_c,2));
	
	echo "<br><br>从数组开头移出一个元素array_shift(),返回删除的元素的值<br>";
	echo array_shift($array_a);
	print_r($array_a);
	
	echo "<br><br>将数组最后一个元素移出array_pop()<br>";
	echo array_pop($array_a);
	print_r($array_a);
	
	echo "<br><br>移除数组中重复的值array_unique()<br>";
	print_r(array_unique($array_c));
	
	echo "<br><br>从数组中取出一段array_slice(数组，起始值，长度，是否重置键)，字符串键名保留<br>";
	print_r(array_slice($array_c,2,3,true));
	
	echo "<br><br>将数组的所有的 KEY 都转换为大写或小写array_change_key_case(array,CASE_LOWER/CASE_UPPER),默认为小写<br>";
	print_r(array_change_key_case($array_c,CASE_UPPER));
	
	echo "<br><br>把一个数组分割为新的数组块array_chunk(数组,数组块中元素个数,是否保留原来的键名)<br>";
	print_r(array_chunk($array_c,3,true));
	
	
?>