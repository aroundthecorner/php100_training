<?php
	include('db.php');
	$type_sql = 'select * from news_type group by ttid';
	$type_query = mysql_query($type_sql) or die('执行查询失败...');
	$type = array();			//存储类型
	$type_options = '';		//组建新闻类型type的下拉列表
	
	while($type_row = mysql_fetch_array($type_query)){
		$type[]=$type_row;
		$type_options .='<option value="'.$type_row['ttid'].'">'.$type_row['typename'].'</option>';
	}
	
	$info = '';
	if(!empty($_POST['submit'])){
		//组建添加用的SQL语句
		$add_news = "title='".(isset($_POST['title'])?handle_post($_POST['title']):'')."',";
		$add_news .= "author='".(isset($_POST['author'])?handle_post($_POST['author']):'')."',";
		$add_news .= "type='".(isset($_POST['type'])?handle_post($_POST['type']):'')."',";
		$add_news .= "sort='".(isset($_POST['sort'])?handle_post($_POST['sort']):'')."',";
		$add_news .= "description='".(isset($_POST['description'])?handle_post($_POST['description']):'')."',";
		$add_news .= "addtime=".time();
		$add_news_sql = "insert into news set ".$add_news;
		
		if(mysql_query($add_news_sql)){
			$add_content = "nid=".mysql_insert_id().",";
			$add_content .= "content='".(isset($_POST['content'])?handle_post($_POST['content']):'')."'";
			$add_content_sql = "insert into news_content set ".$add_content;
			
			//添加新闻具体内容
			if(mysql_query($add_content_sql)){
				echo "<script>alert('添加新闻成功！');location.href='admin.php';</script>";
			}else{
				$info ='添加新闻内容失败';
			}
		}else{
			$info = '添加列表失败';
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>添加新闻</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<h1 style="font-size:18px;">添加新闻</h1>
		<form id="form1" name="form1" action="" method="post">
			<table id="add_news" cellspacing=5 cellpadding=0>
				<tr>
					<td class="label">标题</td>
					<td><input type="text" name="title" style="width:300px;"/></td>
				</tr>
				<tr>
					<td class="label">作者</td>
					<td><input type="text" name="author" style="width:200px;"/></td>
				</tr>
				<tr>
					<td class="label">类型</td>
					<td>
						<select name="type" style="width:120px;padding:2px;color:#6C6D6D;font-size:12px;line-height:24px;height:34px;">
							<?php echo $type_options;?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="label">排序</td>
					<td><input type="text" name="sort" style="width:100px;"/></td>
				</tr>
				<tr>
					<td class="label">简介</td>
					<td><textarea name="description" style="width:500px;height:100px;padding:5px;line-height:18px;"></textarea></td>
				</tr>
				<tr>
					<td class="label">内容</td>
					<td><textarea name="content" style="width:500px;height:200px;padding:5px;line-height:18px;"></textarea></td>
				</tr>
				<tr>
					<td class="label"></td>
					<td>
						<input type="submit" name="submit" value="添加" style="width:100px;padding:2px;font-size:14px;font-weight:bold;color:#000;"/>
						<input type="reset" value="重置" style="width:100px;padding:2px;font-size:14px;font-weight:bold;color:#000;"/>
					</td>
				</tr>
			</table>
		</form>
		<div style="color:#EEB12E;width:500px;padding:10px;text-align:center;">
			<?php
				echo $info;
			?>
		</div>
	</body>
</html>