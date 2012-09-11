<?php
	class b extends listArray{
		function showList(){
			$bArray = parent::getList();
			foreach($bArray as $v){
				echo $v*0.7."<br>";
			}
		}
	}
?>