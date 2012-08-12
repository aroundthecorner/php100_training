<html>
<head>
	<style>
		*{font-size:12px;font-family:微软雅黑,宋体,Arial;}
		body{width:900px;margin:0 auto;}
		h2{font-size:14px;color:#999;}
		#table_a .colorA{background-color:#7DAAC1;color:#fff;}
		#table_a .colorB{background-color:#f9f9f9;}
		#table_a td{height:20px;width:100px;border:1px solid #f9f9f9;text-align:center;}
		
		#table_b td{height:30px;width:30px;}
		#table_b .colorA{background-color:#E7B210;}
		#table_b .colorB{background-color:#f9f9f9;}
	</style>
</head>
<body>
	<h2>隔行变色作业</h2>
	<table cellpadding=0 cellspacing=0 id="table_a">
		<tr>
			<td>序号</td>
			<td>年龄</td>
			<td>工资</td>
		</tr>
	<?php 
		
		$lineNo = 10;			//循环行数
		for($i=1;$i<=$lineNo;$i++){
	?>
		<tr class="<?php
			echo ($i%2==0?"colorA":"colorB");			//隔行变色
		?>">
			<td><?php echo $i;?></td>
			<td><?php echo $i+10;?></td>
			<td><?php echo $i+1000;?></td>
		</tr>
	<?php
		}
	?>
	</table>
	
	<br><br>
	<h2>格子变色作业</h2>
	<table cellpadding=0 cellspacing=0 id="table_b">
	<?php
		$rowNo = 10 ;			//行数
		$gridNo = 10 ;			//每行格子数
		for($j=1;$j<=$rowNo;$j++){
	?>
		<tr>
			<?php 
				$curGrid=$j%2;		//记录标色起始格子
				$k=1;
				while($k<=$gridNo){
			?>
			<td class="<?php 
							echo (($k+$curGrid)%2==0?"colorA":"colorB");	//隔格子标色
						?>">
			</td>
			<?php
				$k++;
				}
			?>
		</tr>
	<?php
		}
	?>
	</table>
</body>
</html>

