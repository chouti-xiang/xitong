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
			d(1111);
			include(tpl('index'));
		}

		function addCART(){
			d($_POST);
			d('hello vue');
		}

		function getPID(){
			echo json(array("直播真想","我的口碑","热门活动"),1);
		}
}