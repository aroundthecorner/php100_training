<?php
	//³Ë·¨±í
	for($i=1;$i<=9;$i++){
		for($j=1;$j<=$i;$j++){
			$result = $i*$j;
			echo "$i*$j=".$result.($result>=10?"&nbsp;":"&nbsp;&nbsp;");
		}
		echo "<br>";
	}
	
	echo "----------------<br>";
	
	
	//µÝ¼õÐÇºÅ
	for($ii=9;$ii>0;$ii--){
		for($jj=1;$jj<=$ii;$jj++){
			echo "*";
		}
		echo "<br>";
	}
	
	echo "----------------<br>";
	
	//µ¹µÝ¼õÐÇºÅ
	for($ii=9;$ii>0;$ii--){
		$result= "";
		$blank = "";
		for($jj=1;$jj<=$ii;$jj++){					
			$result.="*";
		}
		for($t=0;$t<9-$ii;$t++){
			$blank.="&nbsp;";
		}
		echo $blank.$result;
		echo "<br>";
	}
	
?>