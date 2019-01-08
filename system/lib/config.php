<?php 
	//define('SITE_ROOT',dirname(dirname(dirname(__FILE__))).'/');
	define('M_ROOT',dirname(__FILE__).'/');
	date_default_timezone_set("Asia/Hong_Kong");
	$_SQL = array(
		'DBTYPE' =>'mysql',
		'DBHOST' =>"localhost",
		'DBUSER' =>'tsaycomcn',
		'DBPASS' => '123456',
		'DBNAME' => 'tsaycomcn',
		'DBCHARSET' => 'utf8'
	);

	//数据库配置
	$_ENV['SQL'] = $_SQL;
	
	require_once M_ROOT."DB.php";
	require_once M_ROOT."global.func.php";
	require_once M_ROOT."object.class.php";
	require_once M_ROOT."model.class.php";
	require_once M_ROOT."action.class.php";
	require_once M_ROOT."upload.class.php";
	require_once M_ROOT."Mobile_Detect.php";
?>