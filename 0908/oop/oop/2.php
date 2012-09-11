<?php
include("test.class.php");
include("b.class.php");
include("conf.php");

$db = new b($ar[0],$ar[1],$ar[2],$ar[3],$ar[4]);

  foreach($db->fun() as $v){
     echo $v." USD<br>";
  }

?>