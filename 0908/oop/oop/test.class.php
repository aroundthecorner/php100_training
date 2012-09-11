<?php
   class test {
   
    public $host;
	public $user;
    public $pass;
	public $dbname;
	public $charset;
	
	function __construct($h,$u,$p,$d,$c){
	 $this->host=$h;
	 $this->user=$u;
	 $this->pass=$p;
	 $this->dbname=$d;
	 $this->charset=$c;
	 $this->conn();
	}
	
    function conn(){
	  @mysql_connect($this->host,$this->user,$this->pass)or die(mysql_error());
	  @mysql_select_db($this->dbname)or die(mysql_error());
	   mysql_query("set names '".$this->charset."'");
	}
   
   function fun(){
     $s="select * from one";
	 $query=mysql_query($s);
	 while($rs = mysql_fetch_array($query)){
	   $ru[]=$rs[0];
	 }
	 return $ru;
   }
   
   }
  

?>