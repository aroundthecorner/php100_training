<?php
	session_start();
	$msg = "";
	if(isset($_POST['input_code'])){
		$input_code = $_POST['input_code'];
		if($input_code == $_SESSION['authcode2']){
			$msg = "验证码正确";
		}else{
			$msg = "sorry,验证码错误";
		}
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>验证码</title>
	<style>
		*{font-size:16px;padding:0;margin:0;font-family:微软雅黑,Arial;}
		body{background-color:#DCDCDC;}
		#container{width:400px;margin:20px auto;background-color:#fff;padding:20px;}
		.intro_txt{font-size:12px;color:#1C9CC1;}
		.input_txt{display:block;line-height:30px;padding:10px;margin:10px 0;font-size:18px;border:1px solid #1C9CC1;}
		.input_btn{display:block;line-height:30px;padding:5px;margin:2px 0;font-size:18px;width:80px;}
		#authocode{margin-right:10px;}
		#info{font-size:18px;color:#4FCC0A;font-weight:bold;padding:10px;}
		.input_label{font-size:18px;display:block;font-weight:bold;color:#606060;}
	</style>
</head>
<body>
<div id="container">
	<form name="form2" action="" method="post">
	<label class="input_label">输入验证码：</label>
	<input type="text" name="input_code" class="input_txt">
	<img id="authocode" src="authcode2.php" onclick="this.src='authcode2.php';"><a href="" onclick="document.getElementById('authocode').src='authcode2.php';return false;" class="intro_txt">看不清请点击图片</a>
	<input type="submit" name="submit" value="验证" class="input_btn">
	</form>
	<div id="info">
		<?php echo $msg;?>
	</div>
</div>
</body>
</html>