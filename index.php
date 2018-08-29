<?php 

header("Content-Type: text/html; charset=utf-8");
define('APP_ROOT',dirname(__FILE__).'/');
define('SITE_ROOT',dirname(dirname(__FILE__)).'/');
require_once APP_ROOT."/system/lib/load.class.php";
require_once APP_ROOT."/system/lib/config.php";
require_once APP_ROOT."/app/conf.php";
if(isset($_REQUEST['act'])){
	$vars = strip_tags($_REQUEST['act']);
	$vars = explode('-',$vars);
	list($module,$action) = $vars;
}
// ini_set("display_errors", "On");

// error_reporting(E_ALL | E_STRICT);


if (empty($module)){
	$action = 'index';
	$module = 'index';
	$_REQUEST['app'] = 'web';
}

$_ENV['app'] = $_REQUEST['app'];
$_ENV['action'] = $action;
$_ENV['module'] = $module;

if(isset($_REQUEST['app'])){

	 if(in_array($_REQUEST['app'], $config)){

	 	 require_once APP_ROOT.$_REQUEST['app'].'/config/config.php';

	 	 if(is_file(APP_ROOT.$_REQUEST['app'].'/action/'.$_ENV['module'].'Action.php')){

			include(APP_ROOT.$_REQUEST['app'].'/model/'.$_ENV['module'].'Model.php');
			include(APP_ROOT.$_REQUEST['app'].'/action/'.$_ENV['module'].'Action.php');
			
		 }else{
		 	header("Location:/404.html");
		    exit();
		 }
	 }else{
 			header("Location:/404.html");
		    exit();
	 }
}

session_start(); 


$load = new load();
$th = $load->model;

run($th);

function run($th){
	$a  = $_ENV['action'];

	$th->$a();
	
}

