<?php
	//展示数据
	//数据树结构变化/index.php?app=admin&act=users-login
	class indexAction  
	{
		public $index;
		function __construct()
		{
			$this->index = new indexModel;
		}

		function index(){
			include(tpl('index'));
		}
		function initDATAT(){
			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_article($where);
			echo json($data,1);
		}
		function pullArticle(){
			$data = $_POST ;
			$toSql = $this->index->pull_article($data);
			echo $toSql;
		}
		function getPID(){
			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_categray($where);
			echo json($data,1);
			
		}

}