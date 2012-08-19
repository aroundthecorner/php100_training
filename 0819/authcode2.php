<?php
session_start();
define('CODEWIDTH',100);					
define('CODEHEIGHT',30);
define('NOISE',60);
$size = 12;
$ratio = 1;			//此处不能设置大于1，否则显示和实际值不符。
$font_file = 'simsun.ttc';
//生成随机运算符
function get_cal(&$cal_str){
	$list = array(0,1,2,3,4,5,6,7,8,9);
	$list_cn = array('零','壹','贰','叄','肆','伍','陆','柒','捌','玖');
	$cal_op = array('+','-','*','/');
	$cal_op_cn = array('加','减','乘','除');
	$op_1 = rand(0,9);
	$op_2 = rand(0,3);
	$op_3 = rand(0,9);
	
	$op_1_val = $list[$op_1];
	$op_2_val = $cal_op[$op_2];
	$op_3_val = $list[$op_3];
	if($op_2==3){
		while($op_3_val==0){
			$op_3 = rand(0,9);
			$op_3_val = $list[$op_3];
		}
	}
	
	$op_str = $op_1_val.$op_2_val.$op_3_val;
	$cal_str = $list_cn[$op_1].' '.$cal_op_cn[$op_2].' '.$list_cn[$op_3].' = ?';
	$result=0;
	eval('$result='.$op_str.';');
	return $result;
}
$cal_str="";
$check_num = get_cal($cal_str);
$_SESSION['authcode2'] = $check_num;

header("Content-type:image/jpeg");
$im = imagecreatetruecolor(CODEWIDTH,CODEHEIGHT);
$blue1 = imagecolorallocate($im,34,168,231);
$blue2 = imagecolorallocate($im,133,232,214);
$text_color = imagecolorallocate($im,250,250,250);
imagefill($im,0,0,$blue1);

//随机生成两条线
$y1 = rand(0,CODEHEIGHT);
$y2 = rand(0,CODEHEIGHT);
$y3 = rand(0,CODEHEIGHT);
$y4 = rand(0,CODEHEIGHT);
imageline($im,0,$y1,CODEWIDTH,$y3,$blue2);
imageline($im,0,$y2,CODEWIDTH,$y4,$blue2);

//随机生成噪点
for($i=0;$i<NOISE;$i++){
	imagesetpixel($im,rand(0,CODEWIDTH),rand(0,CODEHEIGHT),imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)));
}

//将随机运算符显示在图片上
imagettftext($im,$size,0,2,20,$text_color,$font_file,$cal_str);

$output_x = CODEWIDTH*$ratio;
$output_y = CODEHEIGHT*$ratio;
$im_output = imagecreatetruecolor($output_x,$output_y);
imagecopyresized($im_output,$im,0,0,0,0,$output_x,$output_y,CODEWIDTH,CODEHEIGHT);

imagejpeg($im_output);
imagedestroy($im);
imagedestroy($im_output);

?>