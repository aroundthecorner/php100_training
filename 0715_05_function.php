<?php
	/***
	*带参数的乘法表
	*格式：string nn(int 起始数字,int 结束数字)
	*/
	function nn($beginNo,$endNo){
		$result = "";
		//如果结束数字大于起始数字，将两者进行交换
		if($endNo<$beginNo){
			$t = $beginNo;
			$beginNo=$endNo;
			$endNo = $t;
		}
		//限定结束数字不能大于9
		if($endNo>9){
			return "你丫想累死我啊~";
		}
		
		for($i=$beginNo;$i<=$endNo;$i++){
			for($j=1;$j<=$i;$j++){
				$tempResult = $j*$i;
				//判断结果是否是两位，对结果进行空格补充
				$result.=$j." x ".$i." = ".$tempResult.($tempResult>=10?"&nbsp;&nbsp;&nbsp;":"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			}
			$result.="<br>";
		}
		return $result;
	}
?>