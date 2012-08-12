<?php
	$dir_name = empty($_GET['dir'])?'.':$_GET['dir'];
	$output_str = '<ul style="font-size:12px;">';
	$d = opendir($dir_name);
	
	while($content=readdir($d)){
		$current_dir = $dir_name."/".$content;
		if(is_dir($current_dir)){
			$output_str.= '<li><a href="0811_02.php?dir='.$current_dir.'">'.$content.'</a></li>';
		}else{
			$output_str.='<li>'.$content.'</li>';
		}
	}
	$output_str.='</ul>';
	closedir($d);
	echo $output_str;
?>

