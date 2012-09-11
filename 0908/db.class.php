<?php
	class db{
		public $host;
		public $user;
		public $pwd;
		public $dbname;
		public $charset;
		
		function __construct($h,$u,$p,$d,$c){
			$this->host = $h;
			$this->user = $u;
			$this->pwd = $p;
			$this->dbname = $d;
			$this->charset = $c;
			$this->connect();
		}
		
		function connect(){
			@mysql_connect($this->host,$this->user,$this->pwd) or die(mysql_error());
			@mysql_select_db($this->dbname) or die(mysql_error());
			mysql_query("set names '".$this->charset."'");
		}
	}
?>