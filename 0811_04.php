<?php
	//删除非空目录
	function show_msg($action,$info){
		echo '<span style="color:#16EDF0;font-size:14px;font-family:Arial;line-height:30px;">'.$action.'</span>'.'<span style="color:#fff;font-size:14px;font-family:Arial;line-height:30px;">'.$info.'<br>';
	}
	function del_dir($dir){
		$d = opendir($dir);
		//去除 . 和 ..
		readdir($d);
		readdir($d);
		
		//遍历目录
		while($file = readdir($d)){
			$cur_file = $dir.'/'.$file;
			if(is_dir($cur_file)){
				del_dir($cur_file);
			}else{
				show_msg('>>>delete file: ',$cur_file);
				unlink($cur_file);
			}
		}
		show_msg('>>>delete directory: ',$dir);
		rmdir($dir);
		closedir($d);
	}
	echo '<div style="font-family:Arial,微软雅黑;font-size:14px;width:800px;color:#16F01B;background-color:#0e0e0e;margin:20px auto;height:500px; overflow-y:auto;padding:10px;"><form name="form1" action="" method="get">';
	
	$dir_path = empty($_GET['dir'])?'':$_GET['dir'];
	$html_str = <<<mark
	<input type="text" name="dir" value="">
	<input type="submit" value="删除">
	<span style="color:#F04416;">删除有风险,操作须谨慎!</span>
	<br><br>
mark;
	
	echo '遍历删除目录:'.$html_str;
	
	
	
	if(is_dir($dir_path) ){
		echo '<span style="color:#F0B016;">'.'>>>begin<<<'.'<br>';
		del_dir($dir_path);
		echo '<span style="color:#F0B016;">'.'>>>done<<<'.'<br>';
	}else{
		show_msg('无目录可以删除...','');
	}
	echo '</form></div>';
?>

