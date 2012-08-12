<?php
	function bin_show($val){
		$result = '';
		$a = $val;
		while((int)($a/2)==0){
			$a = $a/2;
			$result.=$a%2;
		}
		return $result;
	}
	$a = 0xff;
	echo bin_show($a);
?>
