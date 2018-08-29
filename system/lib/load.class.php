<?php 
class load
{
	public $table = null;
	public $model = null;
	public $config = array();
	
	function __construct(){
		if(!$this->table) {
			$this->table = $_ENV['module'].'Action';
		}
		$this->model = new $this->table();
		
}


}
