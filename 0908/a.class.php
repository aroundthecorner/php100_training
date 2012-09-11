<?php
	class a extends listArray{
		function showList(){
			$this->getList();
			foreach($this->arr as $v){
				echo $v."<br>";
			}
		}
	}
?>