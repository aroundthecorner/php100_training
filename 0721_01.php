<?php
	/*
	function fo($a,$b="@",$c){
		for($i=1;$i<=$a;$i++){
			echo $b;
		}
		echo "<br>";
	}
	fo(3,2);
	
	function fo2($n){
		$n=$n*$n;
	}
	$a = 2;
	$result = fo2($a);
	
	var_dump($result);
	*/
	$a = array(1,3,5,6,3,4,3);
	$b = array("a","b","c");
	
	//$c = array_combine($a,$b);
	//print_r($c);
	//print_r(array_count_values($a));
	$a[] = 10;
	//print_r($a);
	//echo array_rand($a);
	array_fill($a,"111");
	print_r($a);
?>