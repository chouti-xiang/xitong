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
}