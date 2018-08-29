<?php 
class action extends object
{
	public $table = null;
	public $model = null;
	public $act_name = "action"; 
	public $func_pre = "do";
	public $config = array();
	
	function __construct(){
		parent::__construct();
		if(!$this->table) {
			$this->table = $_ENV['module'];
		}
		$this->model = new $this->table();
		$this->config = $this->model->config;
}
/**
 * title 根据参数调用对应的方法
 * ?action=index-test
 * */
function run(){
	if(!$_GET[$this->act_name])
	{
		$this->doDeflaut();	
	}else{
		$func_name = $this->func_pre.$_ENV[$this->act_name];	
		$this->$func_name();			
	}
}
	
	
function doadd()
{

	if($_GET[id])
	{
		$data = $this->model->getRow($_GET[id]);
	}
	include admin_tpl('add.tpl');
}

function dosave()
{
	if($_POST[id])
	{
		$data = $this->model->updata($_POST);
	}else{
		$data = $this->model->insert($_POST);
	}
	json(1);
}

function dotable()
{
	$data = $this->model->getAll();
	include admin_tpl('table.tpl');
}

function dodelete()
{
	$data = $this->model->del($_POST[id]);
	if($data)
	{
		json(1);
	}
}
	

/**
 * 上传图片
 * */
function doupload()
{
	
if ($_FILES["Filedata"]["size"] < 100000)
{
	if ($_FILES["Filedata"]["error"] > 0)
	{
		echo "Error:".$_FILES["Filedata"]["error"]."<br />";	
	}else {
//		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
// 		echo "Type: " . $_FILES["file"]["type"] . "<br />";
//  		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//		echo "Stored in: " . $_FILES["file"]["tmp_name"];
		
		if (file_exists("upload/" . $_FILES["Filedata"]["name"]))
	      {
	      echo $_FILES["Filedata"]["name"] . " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["Filedata"]["tmp_name"],"./upload/img/" . $_FILES["Filedata"]["name"]);
	      $_EVN['upload'] = "./upload/img/" .$_FILES["Filedata"]["name"];;
//	      echo "Stored in: " . "./upload/img/" . $_FILES["file"]["name"];

	      }
	}
}else{
	echo "Invalid file";
}
	
}
}
	
	