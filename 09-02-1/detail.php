<?php
	if(!empty($_GET['id'])){
		include('db.php');
		$news_sql = "select * from news,news_content where news.id=news_content.nid and news.id=".$_GET['id'];
		$news_query = mysql_query($news_sql) or die('查询数据库出错...');
		$news_val = mysql_fetch_array($news_query);
		$title = $news_val['title'];
		$content = $news_val['content'];
		mysql_query("update news set hits=hits+1 where id=".$_GET['id']) or die('更新点击数失败');			//更新点击数
	}else{
		$title='没有新闻内容';
		$content='';
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新闻内容</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<div style="width:600px;margin:10px auto;">
			<h1 style="background-color:#fff;line-height:40px;font-size:24px;text-align:center;font-weight:bold;color:#000;">
				<?php
					echo $title;
				?>
			</h1>
			<?php
				if($content!=''){
			?>
			<p style="padding:20px;line-height:18px;text-indent:20px;font-size:14px;color:#212121;background-color:#9DB6F6;">
			<?php	
					echo $content;
				?>
			</p>
			<?php
				}
			?>
		</div>
	</body>
</html>