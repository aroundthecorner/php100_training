<?php
	//获得给定日期和相距天数的日期
	$beginProgram = microtime();
	define("ONEDAY",24*60*60);
	function getResult($d1,$gap,$unit,$format="Y-m-d"){
	/*
		echo $gap*ONEDAY."<br/>";
		echo strtotime($d1." ".$gap." year")."<br/>";
		echo strtotime($d1)."<br/>";
		*/
		return date($format,strtotime($d1." ".$gap." ".$unit));
	}
	
	/*
	*传入一个日期字符串，返回
	*/
	function getLongDate($d1){
		
	}
	
	if(isset($_GET['txt_date'])){
		$result = getResult($_GET['txt_date'],$_GET['txt_days'],$_GET['date_unit'],$_GET['date_format']);
	}else{
		$result="";
	}
	
?>
<html>
	<head>
		<title></title>
		<style>
			body{
				font-size:12px;
				color:#333;
				width:600px;
				margin:10 auto;
			}
			h1{color:#000;}
			input[type='text']{
				width:200px;
				margin:5px 0;
				padding:5px;
			}
			select{
				width:160px;
				margin:5px 0;
				padding:5px;
			}
			#result{
				width:500px;
				font-size:30px;
				color:#409616;
				margin:20px auto;
				font-weight:bold;
				text-align:center;
			}
			#container{background-color:#B6DAE4;padding:10px 30px;}
			form{padding-left:10px;}
			#analysis{font-size:12px;color:#8D9192;padding:5px;text-align:center;}
		</style>
	</head>
	<body>
		<div id="container">
		<h1>计算给定日期和间隔时间后的日期</h1>
		<form name="fomr1" action="" method="get">
			<label>请输入日期:</label><input name="txt_date" type="text" value="<?php echo isset($_GET['txt_date'])?$_GET['txt_date']:date("Y-m-d"); ?>"><br/>
			<label>请输入间隔:</label><input name="txt_days" type="text" value="<?php echo isset($_GET['txt_days'])?$_GET['txt_days']:0; ?>" style="width:120px">
			<select name="date_unit" style="width:80px;">
				<option value="Day" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Day"?"selected":""; ?>>天</option>
				<option value="Week" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Week"?"selected":""; ?>>周</option>
				<option value="Month" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Month"?"selected":""; ?>>月</option>
				<option value="Year" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Year"?"selected":""; ?>>年</option>
			</select>
			<br/>
			<label>请选择显示格式:</label>
				<select name="date_format">
					<option value="Y-m-d" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y-m-d"?"selected":""; ?>>年-月-日</option>
					<option value="Y年m月d日" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y年m月d日"?"selected":""; ?>>x年x月x日</option>
					<option value="Y-m-d H:i:s" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y-m-d H:i:s"?"selected":""; ?>>年-月-日 时:分:秒</option>
					<option value="Y年m月d日 H:i:s" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y年m月d日 H:i:s"?"selected":""; ?>>xx年xx月xx日 时:分:秒</option>
				</select>
			<br/><br/>
			<input type="submit" value="提交">
			<input type="reset" value="重置">
		</form>
		
		<div id="result">
			<?php
			
				if(!empty($result)) {echo "计算结果:".$result;} 
			?>
		</div>
		</div>
		<div id="analysis">
			<?php
				$endProgram = microtime();
				echo "计算用时:".number_format(($endProgram-$beginProgram)*1000,6)."秒";
			?>
		</div>
	<body>
</html>