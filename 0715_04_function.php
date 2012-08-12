<?php
	/***
	*循环画格子
	*格式：string drawGrid(int 行数,int 列数,string 格子颜色,int 格子大小,int 起始有色否)
	*/
	function drawGrid($rowNo,$colNo,$colorStr,$scale,$beginBox){
		/*画色竖条
		$temp = "";
		$gidWrapperDiv = "<div style='background-color:red;width:".$scale*$colNo."px;'>";
		$gridStyleBegin ="<span style='display:block;float:left;width:".$scale."px;height:".$scale."px;";
		for($i=1;$i<=$rowNo*$colNo;$i++){
			$temp.= $gridStyleBegin."background-color:".($i%2==0?$colorStr:"")."'></span>";
		}
		return $gidWrapperDiv.$temp."</div>";
		*/
		
		$beginBox = ($beginBox>1 || $beginBox<0)?1:$beginBox;
		$result = "";
		for($i=1;$i<=$rowNo;$i++){
			$temp="<tr>";
			$curLine = ($i+$beginBox)%2;
			for($j=1;$j<=$colNo;$j++){
				$temp.="<td style='width:".$scale."px;height:".$scale."px;background-color:".(($j+$curLine)%2==0?$colorStr:"").";'></td>";
			}
			$result .=$temp."</tr>";
		}
		return "<table cellspacing=0 cellpadding=0>".$result."</table>";
	}
?>