<?php
	$input_url = empty($_POST['input_url'])?"":trim($_POST['input_url']);
	$input_preg = empty($_POST['input_grep'])?"":trim($_POST['input_grep']);
	$my_charset = "utf-8";
	$msg="本页编码是".$my_charset;
	
	if(!empty($_POST['input_url'])){
			//获得远端内容
			$get_content = file_get_contents($input_url);
			//获取对方所用编码格式，默认以utf-8处理
			$preg_charset = '/meta[\s]+http-equiv=[\"\']?Content-Type[\"\']?[\s]+content=[\"\']?text\/html;[\s]*charset=([\w\-]{1,})[\"\']?/is';
			if(preg_match($preg_charset,$get_content,$the_result)){
				$char_set = strtolower($the_result[1]);
				$msg .=  ",对方采用的编码是：".$char_set;
			}else{
				$char_set = $my_charset;
				$msg .= ",未找到对方编码方式，默认以".$my_charset."处理";
			}
			if($char_set!=$my_charset){
				$input_preg_charset = iconv($my_charset,$char_set."//IGNORE",$input_preg);
			}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP100 8-5</title>
	<style>
		*{padding:0;margin:0;}
		body{font-size:12px;background-color:#f2f2f2;}
		input,td,textarea{padding:5px;}
		input,textarea{border:solid 1px #92B901;}
		label{margin:0 10px;}
		input[type="text"]{width:500px;border:solid 1px #92B901;}
		a{color:#92B901;}
		#content{width:1000px;margin:0 auto;background-color:#fff;color:#404040;text-align:left;}
		#result{width:100%;}
		.input_label{width:150px;}
		.input_content{width:800px;}
		#info{padding:10px 20px;color:#8A8A8A;}
		#result{padding:20px;color:#77940C;font-size:14px;}
		pre,xmp{background-color:#eee;display:inline;white-space: pre-wrap;word-wrap: break-word;}
		.li_label{margin-right:5px;color:#0D58AC;}
	</style>
</head>
<body>
<div id="content">
	<h1>数据采集</h1>
	<form id="form1" name="form1" action="" method="post">
		<table cellpadding=0 cellspacing=0>
			<tr>
				<td class="input_label">请输入采集地址:</td>
				<td class="input_content"><input type="text" name="input_url" value="<?php echo $input_url;?>"></td>
			</tr>
			<tr>
				<td class="input_label">请输入采集规则:</td>
				<td class="input_content">
					<textarea name="input_grep" style="width:700px;height:80px;"><?php echo $input_preg;?></textarea>
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
				<td class="input_label">参考正则:</td>
				<td class="input_content">
					<ul>
						<li><span class="li_label">检测页面的编码:</span> <xmp>/<meta[\s]+http-equiv=[\"\']?Content-Type[\"\']?[\s]+content=[\"\']?text\/html;[\s]*charset=([\w\-]{1,})[\"\']?/is</xmp></li>
						<li><span class="li_label">抓取Sina首页新闻列表:</span><xmp>/<!-- 新闻列表 begin -->.*(<li><a href=[^><]*>(.*)<\/a><\/li>).*<!-- 新闻列表 end -->/isU</xmp></li>
					</ul>
				</td>
			</tr>
		</table>
	</form>
	<br>
	<div id="info">
		<?php
			echo $msg."<br>";
		?>
	</div>
	<hr>
	<div id="result">
		<?php
			//输出匹配内容
			//输出匹配原子
			
			if(preg_match_all($input_preg_charset,$get_content,$result)){
				for($i=0;$i<count($result[0]);$i++){
					echo ($char_set==$my_charset?$result[0][$i]:iconv($char_set,$my_charset."//IGNORE",$result[0][$i]))."<br>";
				}
				
				/*
				if(count($result)>1){
					echo "<ul>";
					for($i=1;$i<count($result);$i++){
						if(is_array($result[$i])){
							foreach($result[$i] as $v){
								echo "<li>".iconv($char_set,$my_charset."//IGNORE",$v)."</li>";
							}
						}else{
							echo "<li>".iconv($char_set,$my_charset."//IGNORE",$result[$i])."</li>";
						}
					}
					echo "</ul>";
					
					print_r($result);
				}else{
					echo "匹配了1项记录<br>";
					print_r($result);
				}
				*/
			}else{
				echo "未匹配<br>";
			}
		?>
	</div>
</div>
</body>
</html>