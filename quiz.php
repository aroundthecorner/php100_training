<?php
	/**
	 *��������𰸿�
	 *int getResult(string ����,string ��,int ����),���������õĴ𰸸���
	 */
	 $GLOBALS["result"] = array();
	 $GLOBALS["questions"] = array();
	 $passwords = "abcd";
	 function putResult($q,$r,$f,$no){
		$GLOBALS["result"][$q] = array($r,$f,$no);
		$GLOBALS["questions"] = array_keys($GLOBALS["result"]);
		return(count($GLOBALS["result"]));
	 }
	 
	 /**
	 *�޸�����𰸿�
	 *string changeResult(string ����,string ��,string ����)
	 */
	 function changeResult($q,$r,$f){
		if(in_array($q,$GLOBALS["questions"])){
			$GLOBALS["result"][$q][0] = $r;
			$GLOBALS["result"][$q][1] = $f;
			return "��Ŀ���³ɹ�";
		}else{
			return "û���ҵ�����Ŀ";
		}
	 }
	
	//���������,���ص÷֣��������-1���ʾû�д���Ŀ
	function checkResult($inputQ,$inputA){
		if(in_array($inputQ,$GLOBALS["questions"])){
			return($inputA==$GLOBALS["result"][$inputQ][0]?$GLOBALS["result"][$inputQ][1]:0);
		}else{
			return -1;
		}	
	}
	
	//�����Ŀ��Ϣ
	 putResult("q1","c",10,1);
	 putResult("q2","c",10,2);
	 putResult("q3","abcd",500,3);
	 putResult("q4","ab",1000,4);
	
?>
<!DOCTYP html>
<html>
	<head>
	<title>PHP100��ҵ-С����</title>
		<style>
			*{padding:0;margin:0;}
			body{font-size:12px;color:#59595A;}
			label{display:block;font-size:14px;font-weight:bold;margin-top:10px;color:#568C08;}
			#content{width:300px;margin:10px 100px;}
		</style>
	</head>
	<body>
	<div id="content">
		<h1>����ͷ����</h1>
		<form name="form1" action="" method="post">
		<label>1.������������Ů��</label>
		<input type="checkbox" name="q1[]" value="a">������.������
		<input type="checkbox" name="q1[]" value="b">����.��ɭ
		<input type="checkbox" name="q1[]" value="c">�Ծ���
		
		<label>2.��Σ�յĶ���</label>
		<input type="checkbox" name="q2[]" value="a">��
		<input type="checkbox" name="q2[]" value="b">����
		<input type="checkbox" name="q2[]" value="c">��
		
		<label>3.��ʲô�����ڽ���</label>
		<input type="checkbox" name="q3[]" value="a">��¹�̷�
		<input type="checkbox" name="q3[]" value="b">�ع���
		<input type="checkbox" name="q3[]" value="c">����ҩ
		<input type="checkbox" name="q3[]" value="d">ζǧ����
		
		<label>4.Ѿ��Ʒζ����������λ˳�ۣ�</label>
		<input type="checkbox" name="q4[]" value="a"><img src="http://mm.zj.com/images/ent/CR-oYU9yGsGoYyOoM4cndL4.jpg" width="50%"><br>
		<input type="checkbox" name="q4[]" value="b"><img src="http://pic.dfhon.com/pictures/2010033102/0958.jpg" width="50%"><br>
		<input type="checkbox" name="q4[]" value="c"><img src="http://www.ex8.cn/upimg/userup/0904/1314251NB5.gif" width="50%"><br>
		<input type="checkbox" name="q4[]" value="d"><img src="http://img1.mypsd.com.cn/20101116/Mypsd_1033_201011130910070011B.jpg" width="50%"><br>
		
		<br><br>
		<input type="submit" name="subMe" value="�ύ">
		</form>
		<br>
		<?php
		//����ύ����
			if(isset($_POST['subMe'])){
				$score =0;
				$answerList = "";
				foreach($_POST as $key=>$value){
					if(in_array($key,$GLOBALS["questions"])){
						$checkIt = checkResult($key,implode($_POST[$key]));
						$score +=($checkIt==-1?0:$checkIt);
						$answerList .= $GLOBALS["result"][$key][2].",";
					}
				}
				echo "<span style='color:#E7931C;font-size:14px;font-weight:bold;'>���ش���".$answerList."�÷���:</span><span style='color:#1387E0;font-size:16px;font-weight:bold;'>".$score."</span>";
			}
		?>
		<hr>
		<form name="form2" action="" method="post">
			<label>��������:</label>
			<input type="password" name="pwd">
			<input type="submit" name="subP" value="�ύ">
		</form>
		<?php
			if(isset($_POST['subP'])){
				if($_POST['pwd']==$passwords){
		?>
		<form name="form3" action="" method="post">
			<label>��Ŀ���:</label>
			<input type="text" name="the_no">
			<label>��Ŀ��:</label>
			<input type="text" name="the_answer">
			<label>�÷�:</label>
			<input type="text" name="the_score">
			<br>
			<input type="submit" name="subN" value="�޸�">
		</form>
		<?php
				}else{
					echo "�������";
				}
			}
			
			if(isset($_POST['subN'])){
				echo changeResult($_POST['the_no'],$_POST['the_answer'],$_POST['the_score']);
			}
		?>
	</div>	
	<body>
</html>
