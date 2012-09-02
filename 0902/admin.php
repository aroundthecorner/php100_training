<?php
	include('db.php');
	$sql_str = "select * from news,news_type where news.type=news_type.ttid order by id";
  $query_rs = mysql_query($sql_str) or die("查询数据失败");
  while($row = mysql_fetch_array($query_rs)){
    $data_list[] = $row;
  }
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>后台管理</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<h1 style="margin-top:10px;font-size:25px;">后台新闻管理</h1>
		<table id="ad_list" cellspacing=1 cellpadding=0 >
			<tr><td colspan=9 style="text-align:right;"><a href="add.php" target="_self" style="font-size:14px;color:#0BAA13;font-weight:bold;">+添加新闻</a></td></tr>
			<tr class="tb_title">
				<td width="3%">id</td>
				<td width="18%">标题</td>
				<td width="8%">类型</td>
				<td width="8%">作者</td>
				<td width="6%">点击</td>
				<td width="10%">添加日期</td>
				<td width="15%">更新日期</td>
				<td>简介</td>
				<td width="10%">操作</td>
			</tr>
			<?php
				
				if(count($data_list)>0){			
					$i=1;
					foreach($data_list as $v){
						?>
					<tr <?php echo 'class="'.($i%2==0?'row_a':'b_line').'"'; ?>>
						<td style="text-align:center;"><?php echo $v['id'];?></td>
						<td><a href="detail.php?id=<?php echo$v['id'];?>" target="_blank"><?php echo $v['title']?$v['title']:'&nbsp;';?></a></td>
						<td style="text-align:center;"><?php echo $v['typename'];?></td>
						<td style="text-align:center;"><?php echo $v['author']?$v['author']:'&nbsp;';?></td>
						<td style="text-align:center;"><?php echo $v['hits']?$v['hits']:0;?></td>
						<td style="text-align:center;"><?php echo date("Y-m-d",$v['addtime']);?></td>
						<td style="text-align:center;"><?php echo $v['uptime']?date("Y-m-d h:i:s",$v['uptime']):'-';?></td>
						<td><?php echo $v['description']?$v['description']:'&nbsp;';?></td>
						<td style="text-align:center;">
							<?php
								if($v['del']==1){
									echo "--已删除--";
								}else{
							?>
							<span class="ad_control"><a href="edit.php?id=<?php echo $v['id'];?>">编辑</a></span>
							<span class="ad_control"><a href="del.php?id=<?php echo $v['id'];?>">删除</a></span>
							<?php
								}
							?>
						</td>
					</tr>
			<?php			
						$i++;
					}
				
			?>
		</table>
			<?php
			}
			else{
				echo '<span id="common_info">--没有数据--</span>';
			}
			?>
	</body>
</html>