<?php
header("content-type:image/jpeg");
$im = imagecreate(200,200);
imagecolorallocate($im,255,255,255);
$red = imagecolorallocate($im,255,0,0);
$str = "中";
$str2 = "国";
imagettftext($im,80,0,10,80,$red,"mini.ttf",$str);
imagettftext($im,80,0,20,160,$red,"mini.ttf",$str2);

imagejpeg($im);
imagedestroy($im);
?>