<?php
	class mysql{
		protected $server;
		protected $username;
		protected $pwd;
		protected $database;
		protected $charset;
		
		function __construct($d,$u,$p,$s='localhost',$c='utf8'){
			$this->server = $s;
			$this->username = $u;
			$this->pwd = $p;
			$this->database = $d;
			$this->charset = $c;
		}
		
		function conn(){
			mysql_connect($this->server,$this->username,$this->pwd) or die('链接数据库失败...');
			mysql_select_db($this->database) or die('选择数据库失败...');
			q("set names '".$this->charset."'") or die('设置失败...');
		}
		
		function q($s){
			return mysql_query($s);
		}
		
		function f($s,$t=1){
			switch($t){
				case 2:
					return mysql_fetch_row($s);
				default:
					return mysql_fetch_array($s);
			}
		}
	}
?>