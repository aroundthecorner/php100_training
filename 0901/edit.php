<?php
	$info='';				//记录提示信息
	if(!empty($_GET['id'])){
		include('db.php');
		$type_sql = 'select * from news_type group by ttid';
		$type_query = mysql_query($type_sql) or die('执行查询失败...');
		$type = array();			
		while($type_row = mysql_fetch_array($type_query)){
			$type[]=$type_row;			//存储新闻类型
		}
		
		$news_sql = "select * from news,news_content where news.id=news_content.nid and news.id=".$_GET['id'];
		$news_query = mysql_query($news_sql) or die('查询数据库出错...');
		$news_detail = mysql_fetch_array($news_query) or die('获取数据失败...');
		
		if(!empty($_POST['submit'])){
			$set_sql  = "title='".(isset($_POST['title'])?handle_post($_POST['title']):'')."',";
			$set_sql .= "author='".(isset($_POST['author'])?handle_post($_POST['author']):'')."',";
			$set_sql .= "type='".(isset($_POST['type'])?handle_post($_POST['type']):'')."',";
			$set_sql .= "sort='".(isset($_POST['sort'])?handle_post($_POST['sort']):'')."',";
			$set_sql .= "description='".(isset($_POST['description'])?handle_post($_POST['description']):'')."',";
			$set_sql .= "uptime=".time();
			$update_sql_1 = 'update news set '.$set_sql.' where id='.$_POST['id'];
			if(mysql_query($update_sql_1)){
				$update_sql_2 = "update news_content set content='".(isset($_POST['content'])?handle_post($_POST['content']):'')."' where nid=".$_POST['id'];			//注意用post过来的id
				
				if(mysql_query($update_sql_2)){
					$info = '更新成功！';
				}else{
					$info = '保存新闻内容失败';
				}
			}else{
				$info = '保存新闻列表失败';
			}
		}
		
	}else{
		$info = '没有指定编辑的新闻！';
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
		<form id="form2" name="form2" action="" method="post">
			<table id="add_news" cellspacing=5 cellpadding=0>
				<tr>
					<td class="label">标题</td>
					<td><input type="text" name="title" style="width:300px;" value="<?php echo $news_detail['title'];?>"/></td>
				</tr>
				<tr>
					<td class="label">作者</td>
					<td><input type="text" name="author" style="width:200px;" value="<?php echo $news_detail['author'];?>"/></td>
				</tr>
				<tr>
					<td class="label">类型</td>
					<td>
						<select name="type" style="width:120px;padding:2px;color:#6C6D6D;font-size:12px;line-height:24px;height:34px;">
							<?php 
								foreach($type as $v){
									echo '<option value="'.$v['ttid'].'" '.($v['ttid']=$news_detail['type']?'selected':'').'>'.$v['typename'].'</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="label">排序</td>
					<td><input type="text" name="sort" style="width:100px;" value="<?php echo $news_detail['sort'];?>"/></td>
				</tr>
				<tr>
					<td class="label">简介</td>
					<td><textarea name="description" style="width:500px;height:100px;padding:5px;line-height:18px;"><?php echo $news_detail['description'];?></textarea></td>
				</tr>
				<tr>
					<td class="label">内容</td>
					<td><textarea name="content" style="width:500px;height:200px;padding:5px;line-height:18px;"><?php echo $news_detail['content'];?></textarea></td>
				</tr>
				<tr>
					<td class="label"></td>
					<td>
						<input type="submit" name="submit" value="保存" style="width:100px;padding:2px;font-size:14px;font-weight:bold;color:#000;"/>
						<input type="reset" value="清空" style="width:100px;padding:2px;font-size:14px;font-weight:bold;color:#000;"/>
						<input type="hidden" name='id' value="<?php echo empty($_GET['id'])?'':$_GET['id']; ?>"/>
					</td>
				</tr>
			</table>
		</form>
		<div style="color:#EEB12E;width:500px;padding:10px;text-align:center;">
			<?php
				if($info!=''){
					echo '<script>alert("'.$info.'");location.href="admin.php";</script>';
				}
			?>
		</div>
	</body>
</html>