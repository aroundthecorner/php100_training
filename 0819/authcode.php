<?php
session_start();
define('CODEWIDTH',60);					
define('CODEHEIGHT',20);
define('NOISE',60);
$num = 4;
$size = 5;
$ratio = 2;
//生成随之指定位数的字符串
function get_code($digit=4){
	$list = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
	$code = "";
	for($i=0;$i<$digit;$i++){
		$code .=$list[rand(0,count($list)-1)];
	}
	return $code;
}

//生成随机4位数字字符串代码
$check_num = get_code($num);
$_SESSION['authcode'] = $check_num;

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

//将随机数字显示在图片上
/*
$x_l = 2;
$x_u = (CODEWIDTH-$size*$num)/$num;
$rand_x = rand($x_l,($x_u>$x_l?$x_u:$x_l));
$y_l = 1;
$y_u = (CODEHEIGHT-$size)/2-$y_l;
$gap_l = $size+2;
$gap_u = (CODEWIDTH-$x_u*2)/$num-$size+$gap_l;
*/
$rand_x = rand(3,8);
for($j=0;$j<$num;$j++){
	$rand_y = rand(2,6);	
	imagestring($im,$size,$rand_x,$rand_y,substr($check_num,$j,1),$text_color);
	$rand_x += rand(8,12);
}

$output_x = CODEWIDTH*$ratio;
$output_y = CODEHEIGHT*$ratio;
$im_output = imagecreatetruecolor($output_x,$output_y);
imagecopyresized($im_output,$im,0,0,0,0,$output_x,$output_y,CODEWIDTH,CODEHEIGHT);

imagejpeg($im_output);
imagedestroy($im);
imagedestroy($im_output);
?>