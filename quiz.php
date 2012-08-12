<?php
	/**
	 *创建问题答案库
	 *int getResult(string 问题,string 答案,int 分数),返回已配置的答案个数
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
	 *修改问题答案库
	 *string changeResult(string 问题,string 答案,string 分数)
	 */
	 function changeResult($q,$r,$f){
		if(in_array($q,$GLOBALS["questions"])){
			$GLOBALS["result"][$q][0] = $r;
			$GLOBALS["result"][$q][1] = $f;
			return "题目更新成功";
		}else{
			return "没有找到此题目";
		}
	 }
	
	//检验输入答案,返回得分，如果返回-1则表示没有此题目
	function checkResult($inputQ,$inputA){
		if(in_array($inputQ,$GLOBALS["questions"])){
			return($inputA==$GLOBALS["result"][$inputQ][0]?$GLOBALS["result"][$inputQ][1]:0);
		}else{
			return -1;
		}	
	}
	
	//添加题目信息
	 putResult("q1","c",10,1);
	 putResult("q2","c",10,2);
	 putResult("q3","abcd",500,3);
	 putResult("q4","ab",1000,4);
	
?>
<!DOCTYP html>
<html>
	<head>
	<title>PHP100作业-小测试</title>
		<style>
			*{padding:0;margin:0;}
			body{font-size:12px;color:#59595A;}
			label{display:block;font-size:14px;font-weight:bold;margin-top:10px;color:#568C08;}
			#content{width:300px;margin:10px 100px;}
		</style>
	</head>
	<body>
	<div id="content">
		<h1>无厘头测试</h1>
		<form name="form1" action="" method="post">
		<label>1.世界上最美的女人</label>
		<input type="checkbox" name="q1[]" value="a">杰西卡.阿尔巴
		<input type="checkbox" name="q1[]" value="b">艾玛.沃森
		<input type="checkbox" name="q1[]" value="c">苍井空
		
		<label>2.最危险的动物</label>
		<input type="checkbox" name="q2[]" value="a">蛇
		<input type="checkbox" name="q2[]" value="b">兔子
		<input type="checkbox" name="q2[]" value="c">人
		
		<label>3.吃什么有助于健康</label>
		<input type="checkbox" name="q3[]" value="a">三鹿奶粉
		<input type="checkbox" name="q3[]" value="b">地沟油
		<input type="checkbox" name="q3[]" value="c">胶囊药
		<input type="checkbox" name="q3[]" value="d">味千拉面
		
		<label>4.丫的品味觉得以下哪位顺眼？</label>
		<input type="checkbox" name="q4[]" value="a"><img src="http://mm.zj.com/images/ent/CR-oYU9yGsGoYyOoM4cndL4.jpg" width="50%"><br>
		<input type="checkbox" name="q4[]" value="b"><img src="http://pic.dfhon.com/pictures/2010033102/0958.jpg" width="50%"><br>
		<input type="checkbox" name="q4[]" value="c"><img src="http://www.ex8.cn/upimg/userup/0904/1314251NB5.gif" width="50%"><br>
		<input type="checkbox" name="q4[]" value="d"><img src="http://img1.mypsd.com.cn/20101116/Mypsd_1033_201011130910070011B.jpg" width="50%"><br>
		
		<br><br>
		<input type="submit" name="subMe" value="提交">
		</form>
		<br>
		<?php
		//获得提交数据
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
				echo "<span style='color:#E7931C;font-size:14px;font-weight:bold;'>您回答了".$answerList."得分是:</span><span style='color:#1387E0;font-size:16px;font-weight:bold;'>".$score."</span>";
			}
		?>
		<hr>
		<form name="form2" action="" method="post">
			<label>管理密码:</label>
			<input type="password" name="pwd">
			<input type="submit" name="subP" value="提交">
		</form>
		<?php
			if(isset($_POST['subP'])){
				if($_POST['pwd']==$passwords){
		?>
		<form name="form3" action="" method="post">
			<label>题目编号:</label>
			<input type="text" name="the_no">
			<label>题目答案:</label>
			<input type="text" name="the_answer">
			<label>得分:</label>
			<input type="text" name="the_score">
			<br>
			<input type="submit" name="subN" value="修改">
		</form>
		<?php
				}else{
					echo "密码错误";
				}
			}
			
			if(isset($_POST['subN'])){
				echo changeResult($_POST['the_no'],$_POST['the_answer'],$_POST['the_score']);
			}
		?>
	</div>	
	<body>
</html>
