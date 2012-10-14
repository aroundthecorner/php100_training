<?php
	include('./smarty/libs/Smarty.class.php');
	define('SMARTY_ROOT','./smarty');
	$smarty = new Smarty();
	$smarty->template_dir = SMARTY_ROOT.'/templates/';
	$smarty->compile_dir = SMARTY_ROOT.'/templates_c/';
	$smarty->config_dir = SMARTY_ROOT.'/configs/';
	$smarty->cache_dir = SMARTY_ROOT.'/cache/';
	$smarty->caching=1;
	$smarty->cache_lifetime=60*60;
	$smarty->left_delimiter="<{";
	$smarty->right_delimiter="}>";
?>