<?php
	class listArray extends db{
		public $arr=array();
		function getList(){
			$result = mysql_query("select * from oop");
			while($rs=mysql_fetch_array($result)){
				$this->arr[] = $rs['money'];
			}
		}
	}
?>