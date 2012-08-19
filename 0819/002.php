<?php
function get_cal(&$cal_str){
	$list = array(0,1,2,3,4,5,6,7,8,9);
	$list_cn = array('零','壹','贰','叄','肆','伍','陆','柒','捌','玖');
	$cal_op = array('+','-','*','/');
	$cal_op_cn = array('加','减','乘');
	$op_1 = rand(0,9);
	$op_2 = rand(0,2);
	$op_3 = rand(0,9);
	
	$op_1_val = $list[$op_1];
	$op_2_val = $cal_op[$op_2];
	$op_3_val = $list[$op_3];
	if($op_2_val=='/'){
		while($op_3_val!=0){
			$op_3 = rand(0,9);
			$op_3_val = $list[$op_3];
		}
	}
	
	$op_str = $list[$op_1].$cal_op[$op_2].$list[$op_3];
	$cal_str = $list_cn[$op_1].' '.$cal_op_cn[$op_2].' '.$list_cn[$op_3].' = ?';
	$result=0;
	eval('$result='.$op_str.';');
	return $result;
}

$cal_str = "";
echo get_cal($cal_str);
echo "<br>";
echo $cal_str;

?>

