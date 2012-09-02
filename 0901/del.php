<?php
	$info='';			//记录提示信息
	if(!empty($_GET['id'])){
		include('db.php');
		$news_sql = "update news set del=1 where id=".$_GET['id'];
		if(mysql_query($news_sql)){
			$info = '删除成功';
		}else{
			$info = '删除失败';
		}
	}else{
		$info = '没有指定删除的新闻！';
	}
	echo '<script>alert("'.$info.'");location.href="admin.php";</script>';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
</html>