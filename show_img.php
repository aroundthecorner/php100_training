<?php
	$dir_path = './img/';
	$is_img = array('.jpg','.bmp','.png','.gif');

	$new_name = $_POST['item'];
	$old_name = $_POST['old'];
	/*
	foreach($_POST as $k=>$v){
		$new_name = substr($k,0,4)=='item'?$v:$new_name;
		$old_name = substr($k,0,3)=='old'?$v:$old_name;
		$change_no = substr($k,0,2)=='no'?$v:$change_no;
	}
	*/
	if(!empty($new_name) && !empty($old_name)){
		if(rename($dir_path.'/'.$old_name,$dir_path.'/'.$new_name)){
			$msg = '改名成功';
		}else{
			$msg = '改名失败';
		}
	}else{
		$msg = '';
	}
	
	$d = opendir($dir_path);
	//去除.和..
	readdir($d);
	readdir($d);
?>
<!doctype html>
<html>
	<head>
	<title>遍历图片</title>
	<style>
		body{font-size:12px;background-color:#efefef;color:#1f1f1f;margin:0;padding:0;font-family:Arial,微软雅黑;}
		img{border:0}
		#content{width:1000px;margin:10px auto;}
		.input_text{border:1px solid #92B901;width:120px;color:#a2a2a2;padding:2px;}
		.input_button{border:1px solid #1C53A5;}
		.item{width:200px;height:350px;border:1px solid #aeaeae;float:left;margin:5px;background-color:#fff;text-align:center;padding:5px;}
		label{font-size:12px;color:#92B901;display:block;margin-bottom:5px;}
		.msg{color:#AF0E37;}
	</style>
	</head>
	<body>
		<div id="content">
		<h2>遍历或改名指定目录下的图片</h2>
		<?php
			$i=1;
			while($file=readdir($d)){
				$temp_path = $dir_path."/".$file;
				if(!is_dir($temp_path)){
					if(in_array(substr($file,-4),$is_img)){
		?>
			<div class="item">
				<img src="<?php echo $temp_path; ?>">
				<label>文件名: <?php echo $file;?></label>
				
				<form name="<?php echo 'form'.$i;?>" action="" method="post">
				<input class="input_text" type="text" name="<?php echo 'item';?>" value="<?php echo $file;?>">
				<input type="hidden" name="<?php echo 'old';?>" value="<?php echo $file;?>">
				<input type="submit" value="改名">
				</form>
				<span class="msg"><?php echo ($new_name==$file)?$msg:'';?>
				</span>
			</div>
		<?php
						
					}	
				}
				$i++;
			}			
		?>
		</div>
	</body>

</html>

