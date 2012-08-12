<?php
	/*
	*正则表达式测试
	*/
	function check_grep($grep,$content){
		grep_match_all($grep,$content,$result);
		return $result;
	}
	
	$input_grep = $_POST['input_grep'];
	$input_str = $_POST['input_str'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP100 8-5</title>
	<style>
		*{padding:0;margin:0;border:0;}
		body{font-size:12px;background-color:#f2f2f2;}
		input,textarea,td{padding:5px;}
		input{border:solid 1px #92B901;}
		label{margin:0 10px;}
		input[type="text"]{width:500px;border:solid 1px #92B901;}
		a{color:#92B901;}
		#content{width:1000px;margin:0 auto;background-color:#fff;color:#404040;text-align:left;}
		#result{width:100%;padding:20px;color:#92B901;font-size:16px;line-height:18px;}
		.input_label{width:150px;}
		.input_content{width:500px;}
		pre{background-color:#f2f2f2;display:inline;}
		
	</style>
</head>
<body>
<div id="content">
	<h1>正则表达式测试</h1>
	<form id="form1" action="" method="post">
		<table cellpadding=0 cellspacing=0>
			<tr>
				<td class="input_label">请输入匹配规则:</td>
				<td class="input_content"><input type="text" name="input_grep" value="<?php echo empty($_POST['input_grep'])?"":$_POST['input_grep'];?>"></td>
			</tr>
			<tr>
				<td class="input_label">请输入匹配字符串:</td>
				<td class="input_content">
					<input type="text" name="input_str" value="<?php echo empty($_POST['input_str'])?"":$_POST['input_str'];?>">
				</td>
			</tr>
			<tr>
				<td class="input_label"></td>
				<td class="input_content">
					<input type="submit" value="提交">
					<input type="reset" value="重置">
				</td>
			</tr>
			<tr>
				<td>正则表达式作业：</td>
				<td>
					<ul>
						<li>匹配邮箱: <pre>/^[\w]+[\w\.]*@[\w\.]+\.[a-zA-Z]+$/</pre></li>
						<li>匹配手机: <pre>/^1[2-9][2-9]\d{8}$/</pre></li>
					</ul>
				</td>
			</tr>
		</table>
	</form>
	<div id="result">
		
		<?php
			if(!empty($_POST['input_str'])){
				if(preg_match_all($input_grep,$input_str,$result)){
					$i = 1;
					echo "匹配到的字符串结果:<br>";
					foreach($result as $v){
						echo "第".$i."组:<br>";
						foreach($v as $vv){
							echo str_repeat("&nbsp;",5).$vv."<br>";
						}
						$i++;
					}
					
				}else{
					echo "未匹配！<br>";
				}
			}
			
		?>
	</div>
	
</div>
</body>
</html>