<?php
	include('./smarty/smarty_config.php');
	
	$title = 'smarty';
	$content = 'smarty works!';
	$value = 20;
	$arr1 = array('a'=>'aaa','b'=>'bbb');
	$arr2 = array('aaaa','bbbb');
	$arr3 = array(array('aaaa1','bbbb1'),array('aaaa2','bbbb2'));
	$arr4 = array('aa'=>array('aaaa11','bbbb11'),'bb'=>array('aaaa22','bbbb22'));
	
	$smarty->assign('title',$title);
	$smarty->assign('content',$content);
	$smarty->assign('arr1',$arr1);
	$smarty->assign('arr2',$arr2);
	$smarty->assign('arr3',$arr3);
	$smarty->assign('arr4',$arr4);
	$smarty->assign('value',$value);
	$smarty->display('test.tpl');
?>