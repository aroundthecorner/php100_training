<?php
	define('USERNAME','admin');
	define('PASSWORD','admin');
	
	preg_match('/[\/\\\\]([\w\.]*)$/',__FILE__,$result);
	$the_file = $result[1];		//记录本文件的文件名加后缀
	$login_ok = false;			//记录登录成功状态	
	$logout = false;			//记录logout状态
	$username = @$_POST['username'];
	$passwd = @$_POST['passwd'];
	$action = @$_GET['action'];
	if($action=='logout'){
		setcookie("username","",time()-5);
		$logout = true;
	}else if(isset($_COOKIE["username"])){
			$login_ok = true;
		}else if($username==USERNAME && $passwd==PASSWORD){
			setcookie("username",$username);
			$login_ok = true;
			}
?>
<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>cookie 登录</title>
	<style>
		*{font-family:微软雅黑,Arial;font-size:16px;padding:0;margin:0;color:#5d5d5d;}
		body{background-color:#EaEaEa;}
		#login{padding:10px;margin:10px auto;width:500px;}
		#login_form .label{line-height:30px;width:80px;height:30px;color:#fff;background-color:#1D7B9E;text-align:center;padding:5px;}
		.input_txt{width:200px;height:34px;padding:2px 5px;border:1px solid #419EA6;}
		#login_btn{display:block;width:300px;height:40px;font-size:16px;border:0;color:#fff;background-color:#7FA12B;padding:5px;text-align:center;margin:2px;cursor:hand;}
		.tb_btn{background-color:#7FA12B;}
		.tb_title{background-color:#E09818;color:#fff;font-weight:bold;;height:20px;padding:5px;font-size:20px;}
		#logout{padding:20px;margin:10px auto;width:500px;}
		#div_logout a{display:block;text-align:center;width:300px;height:30px;background-color:#AD5C05;color:#fff;font-size:18px;text-decoration:none;}
	</style>
	</head>
	<body>
		<?php
			if(!$login_ok){
		?>
		<div id="login">
		<form name="form1" id="form1" action="<?php echo $the_file;?>" method="post">
			<table cellpadding=0 cellspacing=5 id="login_form">
				<tr>
					<td colspan=2 class="tb_title">
						用户登录
					</td>
				</tr>
				<tr>
					<td class="label">用户名</td>
					<td><input id="username" type="text" name="username" class="input_txt"></td>
				</tr>
				<tr>
					<td class="label">密码</td>
					<td><input id="pwd" type="password" name="passwd" class="input_txt"></td>
				</tr>
				<tr>
					<td colspan=2 class="tb_btn">
						<input id="login_btn" type="submit" name="submit">
					</td>
				</tr>
			</table>
			
		</form>
		</div>
		<?php
			}else{
		?>
		<div id="logout">
			<div id="info">
				<span style="color:#3DA306;font-weight:bold;font-size:18px;"><?php echo empty($_COOKIE["username"])?$username:$_COOKIE["username"]."</span> 登录成功";?></span>
			</div>
			<div id="div_logout">
				<a href="<?php echo $the_file;?>?action=logout">退出登录</a>
			</div>
			
			
		</div>
		<?php
			}
		?>
	</body>
</html>
