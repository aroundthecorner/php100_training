<?php
	/**
	 *字符串和正则
	 */
	 
	 //输出换行
	 define("ONEDAY",24*60*60);
	 function br(){
		echo "<br/>";
	 }
	 //输出说明
	 function label($content){
		echo "<br/>***".$content."<br/>";
	 }
	 //输出日期
	 function D($int_time){
		if($int_time!="" && $int_time!=0){
			return date("Y-m-d H:i:s",$int_time);
		}else{
			return date("Y-m-d H:i:s");
		}
	 }
	 //计算两个日期间的天数
	 function betweenDays($d1,$d2){
		return (strtotime(date("Y-m-d",$d2))-strtotime(date("Y-m-d",$d1)))/ONEDAY;
	 }
	 
	 
	 $str1 = "1231231$@#$$jaldjfla$$$askdjf..ahsdflj^^^asdlfkj";
	 $str2 = "<font color='#cc5500'>oscar<strong>'s</strong></font> <font color=blue><em>world</em></font>";
	 
	 label("htmlspecialchars():");
	 echo htmlspecialchars($str2);
	 
	 br();
	 
	 label("strip_tags():");
	 echo strip_tags($str2);
	 
	 br();
	 
	 label("str_replace():");
	 echo str_replace("<","*",$str2);
	 br();
	

	 label("nubmer_format(数字,小数位,小数点分隔符,千分位分隔符)");
	 echo number_format(7808123.33543,2);
	 br();
	 
	 label("str_split()");
	 print_r(str_split("zhong's world 中文也有 good"));
	 br();
	 
	 label("substr()");
	 echo substr("123456789",-2,-1);
	 br();
	 
	 label("iconv_substr()");
	 echo iconv_substr("this is 我是一个php程序员",8,2,"gb2312");
	 br();
	 
	 label("urlencode()");
	 echo urlencode("http://www.google.com/index.php?a=中文&b='s");
	 br();
	 
	 label("date()");
	 $cur_time = time();
	 echo date("Y年m月d日 H:i:s",$cur_time);
	 br();
	 
	 label("strtotime():");
	 $v1 = strtotime("2012-12-11 -2 month -1 day -1 week");
	 echo D($v1);
	 br();
	 
	 label("strtotime():");
	 $d2 = strtotime("-2 day");
	 $d1 = time();
	 echo betweenDays($d2,$d1);
	 
?>
