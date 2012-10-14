<?php
	class act extends db{
		/**
		*说明：R，查询(Read)函数
		*参数：$tb表名，$wh条件（默认为1），$fd字段列表（默认为*）
		*返回：array(二维数组），如果查询失败返回false
		*/
		function R($tb,$wh=1,$fd='*'){
			$sql_str = "select $fd from $tb where $wh";
			$query = q($sql_str);
			if($query){
				$r_arr = array();
				while($rs=f($query)){
					$r_arr[]=$rs;
				}
				return $r_arr;
			}else{
				return fasle;
			}
		}
		
		/**
		*说明：C，插入(Create)函数
		*参数：$tb表名，$v_arr要插入的字段与数值对数组
		*返回：返回操作产生的 ID，如果没有auto_increment字段，返回0，发生错误返回false
		*/
		function C($tb,$v_arr){
			if(!is_array($v_arr) || $tb==''){
				return false;
			}
			
			$tmp_str = 'set ';
			foreach($v_arr as $k=>$v){
				$temp_str .= $k."='".$v."',";
			}
			$temp_str = rtrim($temp_str,',');
			$sql_str = "insert into $tb ".$temp_str;
			if(q($sql_str)){
				return i();
			}else{
				return false;
			}
		}
		
		/**
		*说明：U，更新(Update)函数
		*参数：$tb表名，$v_arr要更新的字段与数值对数组,$wh更新条件
		*返回：返回更新的记录个数，错误返回false
		*/
		function U($tb,$v_arr,$wh){
			if(!is_array($v_arr) || $tb==''){
				return false;
			}
			
			$tmp_str = 'set ';
			foreach($v_arr as $k=>$v){
				$temp_str .= $k."='".$v."',";
			}
			$temp_str = rtrim($temp_str,',');
			$sql_str = "update $tb ".$temp_str." where $wh";
			if(q($sql_str)){
				return count(R($tb,$wh));
			}else{
				return false;
			}
		}
		
		/**
		*说明：D，删除(Delete)函数
		*参数：$tb表名，$wh删除条件
		*返回：返回删除的记录个数，错误返回false
		*/
		function D($tb,$wh){
			$r_count = count(R($tb,$wh));
			$sql_str = "delete from $tb where $wh";
			if(q($sql_str)){
				return $r_count;
			}else{
				return false;
			}
		}
	}
?>