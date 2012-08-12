<?php
	$upload_path = './upload/';
	//$file_types = array('image/jpeg','image/gif','image/png','image/bmp');
	$file_type = array('jpg','gif','png','bmp');
	$max_size = 2000000;		//2M
	$max_upload = 5;
	$msg="";
	$default_num = 1;

	//显示信息
	function show_msg($info){
		global $msg;
		$msg.='<span style="font-size:12px;color:#D58109;">'.$info.'</span><br>';
	}
	//获得文件名(包括后缀)
	function get_filename($path){
		// $preg_str = '/[\/\\](\w*)$/';
		// preg_match($preg_str,$path,$result);
		// return count($result)>1?$result[1]:'';
		$temp = explode('\\',$path);
		return array_pop($temp);
	}
	
	//获得后缀名
	function get_type($file_name){
		$temp = explode('.',$file_name);
		$count_temp = count($temp);
		return $count_temp>1?$temp[$count_temp-1]:'';
	}
	
	//获得去后缀文件名
	function get_name($file_name){
		$temp = explode('.',$file_name);
		$count_temp = count($temp);
		array_pop($temp);
		return $count_temp>1?implode($temp):$file_name;
	}
	
	//处理上传文件
	function upload_file($name,$type,$size,$tmp_name,$index){
		global $file_type;
		global $max_size;
		global $upload_path;
		$pub_str = '处理第'.$index.'个上传 >>>';
		$the_type = strtolower(get_type($name));
		$the_name = strtolower(get_name($name));

		if(!in_array($the_type,$file_type)){
			show_msg($pub_str.'不允许上传此种文件类型');
			return false;
		}
		
		if($size>$max_size){
			show_msg($pub_str.'文件最大上传值为'.(round($max_size/1024/1024)).'M,请不要超过此大小');
			return false;
		}
		
		$new_path_name = $upload_path.$the_name.'_'.time().'.'.$the_type;
		if(move_uploaded_file($tmp_name,$new_path_name)){
			show_msg($pub_str.'恭喜,上传文件成功');
			return true;
		}else{
			show_msg($pub_str.'上传转移文件出错');
			return false;
		}
	}

	//遍历输出文件
	function show_files(){
		global $upload_path;
		global $file_type;
		
		$dir_files = scandir($upload_path);
		$return_str = '<ul id="list_files">';
		for($i=2;$i<count($dir_files);$i++){
			$img_src = iconv('gbk','utf-8',$upload_path.$dir_files[$i]);
			if(in_array(strtolower(get_type($dir_files[$i])),$file_type)){
				$return_str .='<li><img src="'.$img_src.'">文件名: '.iconv('gbk','utf-8',$dir_files[$i]).'</li>';
			}
		}
		return $return_str .= '</ul>';
	}
	
	$num = !isset($_GET['num'])?$default_num:$_GET['num'];
	if($num>$max_upload){
		show_msg('最多可同时上传'.$max_upload);
		$num = $max_upload;
	}
	if($num<1){
		show_msg('至少要有1个上传选择');
		$num = 1;
		
	}

	// if($_POST['submit']){
		// $file = $_FILES['upload_file'];
		// upload_file($file['name'],$file['type'],$file['size'],$file['tmp_name']);
	// }

	
	if(!empty($_POST['submit'])){
		$files = $_FILES['upload_file'];
		for($j=0;$j<$num;$j++){
			if($files['error'][$j]==0){
				upload_file(iconv('utf-8','gbk',$files['name'][$j]),$files['type'][$j],$files['size'][$j],$files['tmp_name'][$j],$j);
			}else{
				show_msg('处理第'.$j.'个上传 >>>没有上传数据或者上传失败');
			}
		}
	}
?>

<!doctype html>
<html>
<head>
<title>多文件上传</title>
<style>
	body{font-size:12px;background-color:#efefef;color:#1f1f1f;margin:0;padding:0;font-family:Arial,微软雅黑;}
	#content{width:1000px;margin:10px auto;padding:20px;}
	.input_file{border:1px solid #92B901;width:420px;color:#a2a2a2;padding:2px;}
	#files{padding:10px;background-color:#fff;color:#b3b3b3;}
	#list_files{list-style-type:none;}
	#list_files li{line-height:50px;}
	#list_files li img{display:block;margin:2px;}
	h2{font-size:16px;font-weight:bold;color:#4A4A4A;}
	.control{margin:5px 10px;font-size:14px;color:#41A610;text-decoration:none;}
</style>
</head>

<body>
<div id="content">
	<a class="control" href="<?php echo get_filename(__FILE__).'?num='.($num+1);?>" title="添加输入框">+</a>|<a class="control" href="<?php echo get_filename(__FILE__).'?num='.($num-1);?>" title="减少输入框">-</a>
	<form action="" method="post" enctype="multipart/form-data">
		<?php
			for($i=1;$i<=$num;$i++){
		?>
		<input class="input_file" type="file" name="upload_file[]"><br>
		<?php
			}
		?>
	
	<input type="submit" name="submit" value="上传">
	<br>
		<?php
			echo $msg;
		?>
	</form>
	<h2>已上传图片列表</h2>
	<div id="files">
		<?php
			echo show_files();
		?>
	</div>
</div>
</body>
</html>