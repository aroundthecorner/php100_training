<?php
	session_start();
	include('common.php');
	$THE_FILE = get_file(__FILE__);
	$msg = '';
	
	//动作列表
	$action = array('reg','logout');
	$act = 'index';
	
	if(isset($_GET['act'])){
		$act = in_array($_GET['act'],$action)?$_GET['act']:$act;
	}
	
	//提交登录
	if(!empty($_POST['submit1'])){
		$username1 = empty($_POST['username1'])?"":$_POST['username1'];
		$pwd1= empty($_POST['pwd1'])?"":$_POST['pwd1'];
		if(check_user($username1,$pwd1)){
			$_SESSION['username'] = $username1;
			$msg = "欢迎".$username1."登录";
		}else{
			$msg = "用户名或密码错误";
		}
	}
	
	//提交注册
	if(!empty($_POST['submit2'])){
		$username2 = empty($_POST['username2'])?"":$_POST['username2'];
		$pwd2 = empty($_POST['pwd2'])?"":$_POST['pwd2'];
		if(check_double($username2)){
			$act = 'reg';
			$msg = "用户名重复";		
		}else{
			if(reg_write($username2,$pwd2)){
				$_SESSION['username'] = $username2;
				$msg = "注册成功";
			}else{
				$act = "reg";
				$msg = "注册失败";
			}
		}
	}
	
	//判断是否退出
	if($act=='logout'){
		unset($_SESSION['username']);
		session_destroy();
		$act = 'index';
	}
	
	//判断是否登录
	if(!empty($_SESSION['username'])){
		$act = 'logout';
		$msg = '欢迎'.$_SESSION['username'];
	}
	
	
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP100-注册登录</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="container">
<?php
	switch($act){
	case 'index':
?>
	<div id="login_form">
		<form name="form1" action="<?php echo $THE_FILE;?>" method="post">
			<table cellspacing=5 cellpadding=0 class="tb">
				<tr>
					<td colspan=2 class="tb_title">登录</td>
				</tr>
				<tr>
					<td class="tb_label">用户名</td>
					<td><input type="text" name="username1" class="input_txt"></td>
				</tr>
					<td class="tb_label">密码</td>
					<td><input type="password" name="pwd1" class="input_txt"></td>
				</tr>
				<tr>
					<td colspan=2 class="tb_btn"><input type="submit" name="submit1" class="input_btn" value="登录"><a href="<?php echo $THE_FILE;?>?act=reg">新用户注册</a></td>
				<tr>
			</table>
		</form>
	</div>
<?php
	break;
	case 'reg':
?>
	<div id="reg_form">
		<form name="form2" action="<?php echo $THE_FILE;?>" method="post">
			<table cellspacing=5 cellpadding=0 class="tb">
				<tr>
					<td colspan=2 class="tb_title">注册</td>
				</tr>
				<tr>
					<td class="tb_label">用户名</td>
					<td><input type="text" name="username2" class="input_txt"></td>
				</tr>
					<td class="tb_label">密码</td>
					<td><input type="password" name="pwd2" class="input_txt"></td>
				</tr>
				<tr>
					<td colspan=2 class="tb_btn"><input type="submit" name="submit2" class="input_btn" value="注册"><a href="<?php echo $THE_FILE;?>">已有账户登录</a></td>
				<tr>
			</table>
		</form>
	</div>
<?php
	break;
	case 'logout':
?>
	<div id="logout">
		<a href="<?php echo $THE_FILE;?>?act=logout">退出</a>
	</div>
<?php
	}
?>
	<div id="info">
		<?php echo $msg;?>
	</div>
</div>
</body>
</html>