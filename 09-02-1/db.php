<?php
	/*
	*存放数据库链接和常用函数
	*09-01,2012
	*by 小心
	*/
	
	//数据库信息
	$DB_CONFIG = array(
		'HOST'			=> 'localhost',						//数据库地址	
		'DB_NAME' 		=> 'php100',						//数据库名
		'USER_NAME'		=> 'root',							//用户
		'USER_PWD' 		=> '',									//密码
		'DB_CHARSET' 	=> 'UTF8'								//默认编码
	);
	
	//链接数据库
	$db_conn = mysql_connect($DB_CONFIG['HOST'],$DB_CONFIG['USER_NAME'],$DB_CONFIG['USER_PWD']) or die('链接数据库失败...（出错信息:'.mysql_error().')');
	mysql_select_db($DB_CONFIG['DB_NAME']) or die('选择数据库失败...(出错信息:'.mysql_error().')');
	mysql_query("set names '".$DB_CONFIG['DB_CHARSET']."'");
	
	//获得所有记录数
	$TOTAL = mysql_num_rows(mysql_query('select * from news where del is null')) or die('获得新闻总数失败...');
	
	//处理post的数据，清除不规则内容，待持续添加
	function handle_post($val){
		$result = trim($val);				//去除空白
		return $result;
	}
	
	/*
	*处理分页
	*p_total:总页数
	*p_current:当前页码
	*p_pagelen:显示页标记的个数，默认显示5个
	*p_leftgap：当前页距离最左端标记的距离
	*$total：总记录数
	*url:分页显示的地址，p:分页传递的参数值，默认值为'p'
	*返回生成的分页字符串，或空字符串
	*/
	function page($p_total,$p_current,$url,$total,$p_pagelen=5,$p_leftgap=2,$p='p'){
		$p_begin = 1;					//记录开始数字
		$p_end = $p_total;		//记录结束数字
		/*
		情况1:P_total <= P_pagelen
		情况2:P_total > P_pagelen 并且 P_current <= P_leftgap
		情况3:P_total > P_pagelen 并且 P_current > P_leftgap 并且 P_current - P_leftgap + P_pagelen <= P_total
		情况4:P_total > P_pagelen 并且 P_current - P_leftgap + P_pagelen > P_total
		*/
		if($p_total>$p_pagelen){
			if($p_current<=$p_leftgap){
				$p_end = $p_pagelen;
			}else if(($p_current-$p_leftgap+$p_pagelen)<=$p_total){
				$p_begin = $p_current - $p_leftgap;
				$p_end = $p_begin + $p_pagelen;
			}else{
				$p_begin = $p_total - $p_pagelen;
			}
		}
		
		//生成分页字符串
		$ret_str = '<div id="for_page"><span class="page_total">'.$total.'条</span>';
		$ret_str .= ($p_current>$p_begin?'<a href='.$url.'?'.$p.'='.($p_current-1).'>上一页</a>':'');
		$ret_str .= '<a href='.$url.'?'.$p.'=1>首页</a>';
		for($i=$p_begin;$i<=$p_end;$i++){
			$ret_str .= $i!=$p_current?('<a href='.$url.'?'.$p.'='.$i.'>'.$i.'</a>'):('<span class="cur_page">'.$i.'</span>');
		}
		$ret_str .= ($p_end<$p_total?'<span class="page_more">...</span>':'');
		$ret_str .= ($p_current<$p_end?'<a href='.$url.'?'.$p.'='.($p_current+1).'>下一页</a>':'');
		$ret_str .= '<a href='.$url.'?'.$p.'='.$p_total.'>尾页</a>';
		$ret_str .= '</div><div class="clear_div"></div>';
		
		return $ret_str;
	}
?>