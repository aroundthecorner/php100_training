<?php
	/***
	*�������ĳ˷���
	*��ʽ��string nn(int ��ʼ����,int ��������)
	*/
	function nn($beginNo,$endNo){
		$result = "";
		//����������ִ�����ʼ���֣������߽��н���
		if($endNo<$beginNo){
			$t = $beginNo;
			$beginNo=$endNo;
			$endNo = $t;
		}
		//�޶��������ֲ��ܴ���9
		if($endNo>9){
			return "��Ѿ�������Ұ�~";
		}
		
		for($i=$beginNo;$i<=$endNo;$i++){
			for($j=1;$j<=$i;$j++){
				$tempResult = $j*$i;
				//�жϽ���Ƿ�����λ���Խ�����пո񲹳�
				$result.=$j." x ".$i." = ".$tempResult.($tempResult>=10?"&nbsp;&nbsp;&nbsp;":"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
			}
			$result.="<br>";
		}
		return $result;
	}
?>