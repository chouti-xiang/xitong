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

			if($_POST['pid'] == 1){
				echo json(array("推荐电影","口碑热剧","完美纪录片"),1);
			}elseif($_POST['pid'] == 2){
				echo json(array("工具类","生活类","鸡汤帖"),1);
			}elseif($_POST['pid'] == 3){
				echo json(array("我的工作","我的生活","我的感悟"),1);
			}

			
		}
}