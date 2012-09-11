<?php
	class listArray extends db{
		public $listArray=array();
		
		function __construct($h,$u,$p,$d,$c){
			parent::__construct($h,$u,$p,$d,$c);
			$this->getList();
		}
		function getList(){
			$sqlStr = "select * from opp";
			$result = mysql_query($sqlStr);
			while($rs=mysql_fetch_array($result)){
				$listArray[]=$rs['money'];
			}
		}
	}
?>