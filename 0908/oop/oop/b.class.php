<?php
   class b extends test {
	  
	 function fun(){
	    foreach(parent::fun() as $v){
          $ru[]=$v[0]*0.7*100;
         }
	    return $ru;
	   }
   
   }
  

?>