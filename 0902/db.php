<?php
	//数据库信息
	$DB_CONFIG = array(
		'HOST'			=> 'localhost',				
		'DB_NAME' 		=> 'php100',
		'USER_NAME'		=> 'root',
		'USER_PWD' 		=> 'xiaoxin',
		'DB_CHARSET' 	=> 'UTF8'
	);
	//链接数据库
	$db_conn = mysql_connect($DB_CONFIG['HOST'],$DB_CONFIG['USER_NAME'],$DB_CONFIG['USER_PWD']) or die('链接数据库失败...（出错信息:'.mysql_error().')');
	mysql_select_db($DB_CONFIG['DB_NAME']) or die('选择数据库失败...(出错信息:'.mysql_error().')');
	mysql_query("set names '".$DB_CONFIG['DB_CHARSET']."'");
	
	//获得所有记录数
	$TOTAL = mysql_num_rows(mysql_query('select * from news where del is null')) or die('获得新闻总数失败...');
	
	//处理post的数据，清除不规则内容，待完成
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
	
	/*
	*封装mysql_query和mysql_fetch_array
	*返回查询到的结果二维数组，如果出错或没有数据返回false
	*/
	function my_mysql_query($sql){
		$ret_arr = array();
		$rs = mysql_query($sql);
		if($rs){
			while($v = mysql_fetch_array($rs)){
				$ret_arr[] = $v;
			}
			return $ret_arr;
		}else{
			return false;
		}
	}
	
	/*
	*无限级分类
	*/
	//$pid：父节点，$level：用来显示层级缩进关系
	//$option:为true表示生成带option选项的字符串
	//$check_val:传入检验value，设定selected
	//调用时get_child(0,0,返回值数组);
	function get_child($pid,$level,&$ret_str,$option=false,$check_val=''){
		//获得所有等于父节点id的子节点
		$result = mysql_query('select * from news_type where tid='.$pid) or die("查询时出错...");
		//显示节点
		while($rs = mysql_fetch_array($result)){
			$ret_str .= ($option?'<option value="'.$rs['ttid'].'"'.($check_val==''?'':($check_val==$rs['ttid']?' selected':'')).'>':'').'|'.str_repeat('--',$level).$rs['typename'].($option?'</option>':'</br>');
			get_child($rs['ttid'],$level+1,$ret_str,$option,$check_val);
		}
	}
?>