<?php
	echo __FILE__;
	$preg_str = '/[\\\\\/]([\w\.]*)$/';
	preg_match($preg_str,__FILE__,$result);
	echo "<br>";
	print_r($result);
?>