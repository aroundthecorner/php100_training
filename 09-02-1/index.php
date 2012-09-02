<?php
	include('db.php');
	//定义用于本页的分页参数
	$EACH_PAGE = 5;				//每页显示记录数
	$URL = 'index.php';		//分页地址
	
	//分页用
	$p_current = empty($_GET['p'])?'1':$_GET['p'];			//获得当前页码
	$p_total = ceil($TOTAL/$EACH_PAGE);			//总页数
	$sql_limit =  " limit ".($p_current-1)*$EACH_PAGE.','.$EACH_PAGE;
	
	//得到对应的记录数
  $sql_str = "select * from news,news_type where news.type=news_type.ttid and news.del is null order by news.sort";
	
	$sql_str .= $sql_limit;
	$query_rs = mysql_query($sql_str) or die("查询数据失败");
	
	$data_list=array();				//防止未定义错误
	//获取新闻列表
  while($row = mysql_fetch_array($query_rs)){
    $data_list[] = $row;
  }
  
  if(count($data_list)>0){
    $output = '<ul id="news_list">';			//用列表显示新闻
    $i = 1;			//序号
    foreach($data_list as $v){
			$output .= '<li>';
      $output .= '<div class="n_title"><span style="font-size:20px;color:#0E99CD;margin-right:8px;">'.($EACH_PAGE*($p_current-1)+$i).'.</span> <a href="detail.php?id='.$v['id'].'" target="_blank">'.$v['title'].'</a></div>';
			$output .= '<div class="n_info"><span>点击:'.($v['hits']?$v['hits']:'0').'</span>';
			$output .= '<span>添加日期:'.date('Y-m-d',$v['addtime']).'</span>';
			$output .= '<span>作者:'.$v['author'].'</span>';
			$output .= '<span>类型:'.$v['typename'].'</span></div>';
      $output .= '<p class="n_desc">'.$v['description'].'</p>';
      $output .= '<a href="detail.php?id='.$v['id'].'" target="_blank">详细..</a>';
			$output .= '</li>';
      $i++;
    }
		$output .= '</ul>';
  }else{
    $output = "没有新闻记录";
  }
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新闻列表</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>
	<body>
		<div id="content">
			<h1 style="font-size:30px;color:#000;font-weight:bold;margin-bottom:12px;">新闻列表</h1>
			<?php
				echo $output;
			
			//page($p_total,$p_current,$url,$total,$p_pagelen=5,$p_leftgap=2,$p='p')
				echo page($p_total,$p_current,$URL,$TOTAL);
			?>
		</div>
	</body>
</html>

