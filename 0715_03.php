<html>
<head>
	<style>
		*{font-size:12px;font-family:΢���ź�,����,Arial;}
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
	<h2>���б�ɫ��ҵ</h2>
	<table cellpadding=0 cellspacing=0 id="table_a">
		<tr>
			<td>���</td>
			<td>����</td>
			<td>����</td>
		</tr>
	<?php 
		
		$lineNo = 10;			//ѭ������
		for($i=1;$i<=$lineNo;$i++){
	?>
		<tr class="<?php
			echo ($i%2==0?"colorA":"colorB");			//���б�ɫ
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
	<h2>���ӱ�ɫ��ҵ</h2>
	<table cellpadding=0 cellspacing=0 id="table_b">
	<?php
		$rowNo = 10 ;			//����
		$gridNo = 10 ;			//ÿ�и�����
		for($j=1;$j<=$rowNo;$j++){
	?>
		<tr>
			<?php 
				$curGrid=$j%2;		//��¼��ɫ��ʼ����
				$k=1;
				while($k<=$gridNo){
			?>
			<td class="<?php 
							echo (($k+$curGrid)%2==0?"colorA":"colorB");	//�����ӱ�ɫ
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

