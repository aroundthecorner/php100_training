<?php

	/**
	 *��ҵ1���˷���
	 *string fo(&����ֵ�����ޣ����ޣ�
	 */
	echo "----------------��ҵ1<br>";

	function fo(&$a,$begin=1,$end=9){
	$a=$begin."~".$end."�ĳ˷���<br>";
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

	echo "<br>----------------��ҵ2<br>";
	/*
	*��ҵ2������1��100������
	*/
	$arry=array();
	for($n=1;$n<=100;$n++){
	$arry[]=$n;
	}
	print_r($arry);
	echo "<br>";

	/*
	*���麯����ϰ
	*/
	echo "��������array��<br>";
	$test = array("a"=>1,"b"=>2,"c"=>3,"f"=>"abcd");
	print_r($test);

	echo "<br><br>����һ�����飬��һ�������ֵ��Ϊ��������һ��������ֵ��Ϊ��ֵ��array_combine()<br>";
	$array_a = array("a","b",0);
	$array_b = array("aa","bb","cc");
	$array_c = array("a"=>1,"b"=>2,"c"=>3,"d"=>4,"e"=>4);
	print_r(array_combine($array_a,$array_b));

	echo "<br><br>ͳ�����������е�ֵ(ֻͳ�Ƽ�ֵ)���ֵĴ���,array_count_values()<br>";
	print_r(array_count_values($array_c));

	echo "<br><br>�ø�����ֵ�������array_fill(),��һ��������ʼ���꣬�ڶ���������������������ΪҪ����ֵ<br>";
	print_r(array_fill(5,3,"aaa"));
	
	echo "<br><br>���������еļ���ֵarray_flip(),���ԭ����ֵ��ͬ�����������ֵļ�ֵ����Ϊ���<br>";
	print_r(array_flip($array_c));
	
	echo "<br><br>�������������еļ���array_keys()<br>";
	print_r(array_keys($array_c));
	
	echo "<br><br>��ֵ���������ָ������array_pad(����,���ȣ����ֵ),������м�������0��ʼ�����±�<br>";
	print_r(array_pad($array_b,10,"aaa"));
	
	echo "<br><br>��������������ֵ�ĳ˻�array_product<br>";
	echo array_product($array_c);
	
	echo "<br><br>�����������ȡ��һ��������Ԫarray_rand(),���ؼ��������ʱ���ؼ�����ɵ�����<br>";
	print_r(array_rand($array_c,2));
	
	echo "<br><br>�����鿪ͷ�Ƴ�һ��Ԫ��array_shift(),����ɾ����Ԫ�ص�ֵ<br>";
	echo array_shift($array_a);
	print_r($array_a);
	
	echo "<br><br>���������һ��Ԫ���Ƴ�array_pop()<br>";
	echo array_pop($array_a);
	print_r($array_a);
	
	echo "<br><br>�Ƴ��������ظ���ֵarray_unique()<br>";
	print_r(array_unique($array_c));
	
	echo "<br><br>��������ȡ��һ��array_slice(���飬��ʼֵ�����ȣ��Ƿ����ü�)���ַ�����������<br>";
	print_r(array_slice($array_c,2,3,true));
	
	echo "<br><br>����������е� KEY ��ת��Ϊ��д��Сдarray_change_key_case(array,CASE_LOWER/CASE_UPPER),Ĭ��ΪСд<br>";
	print_r(array_change_key_case($array_c,CASE_UPPER));
	
	echo "<br><br>��һ������ָ�Ϊ�µ������array_chunk(����,�������Ԫ�ظ���,�Ƿ���ԭ���ļ���)<br>";
	print_r(array_chunk($array_c,3,true));
	
	
?>