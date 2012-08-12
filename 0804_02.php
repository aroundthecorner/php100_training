<?php
	//��ø������ں��������������
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
	*����һ�������ַ���������
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
		<h1>����������ںͼ��ʱ��������</h1>
		<form name="fomr1" action="" method="get">
			<label>����������:</label><input name="txt_date" type="text" value="<?php echo isset($_GET['txt_date'])?$_GET['txt_date']:date("Y-m-d"); ?>"><br/>
			<label>��������:</label><input name="txt_days" type="text" value="<?php echo isset($_GET['txt_days'])?$_GET['txt_days']:0; ?>" style="width:120px">
			<select name="date_unit" style="width:80px;">
				<option value="Day" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Day"?"selected":""; ?>>��</option>
				<option value="Week" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Week"?"selected":""; ?>>��</option>
				<option value="Month" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Month"?"selected":""; ?>>��</option>
				<option value="Year" <?php echo isset($_GET['date_unit'])&&$_GET['date_unit']=="Year"?"selected":""; ?>>��</option>
			</select>
			<br/>
			<label>��ѡ����ʾ��ʽ:</label>
				<select name="date_format">
					<option value="Y-m-d" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y-m-d"?"selected":""; ?>>��-��-��</option>
					<option value="Y��m��d��" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y��m��d��"?"selected":""; ?>>x��x��x��</option>
					<option value="Y-m-d H:i:s" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y-m-d H:i:s"?"selected":""; ?>>��-��-�� ʱ:��:��</option>
					<option value="Y��m��d�� H:i:s" <?php echo isset($_GET['date_format'])&&$_GET['date_format']=="Y��m��d�� H:i:s"?"selected":""; ?>>xx��xx��xx�� ʱ:��:��</option>
				</select>
			<br/><br/>
			<input type="submit" value="�ύ">
			<input type="reset" value="����">
		</form>
		
		<div id="result">
			<?php
			
				if(!empty($result)) {echo "������:".$result;} 
			?>
		</div>
		</div>
		<div id="analysis">
			<?php
				$endProgram = microtime();
				echo "������ʱ:".number_format(($endProgram-$beginProgram)*1000,6)."��";
			?>
		</div>
	<body>
</html>