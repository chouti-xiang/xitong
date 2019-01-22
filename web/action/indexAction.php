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
			// $data = array(
			// 			0=>array(
			// 					'title'=>"甄子丹：勇敢走每一步 什么困难都可解决",
			// 					'thumb'=>"/web/resources/3.jpg",
			// 				),
			// 			1=>array(
			// 					'title'=>"小饼饼：2019加油小饼饼",
			// 					'thumb'=>"/web/resources/4.jpg",
			// 				),
			// 		);
			// 	echo json($data, 1);

			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_article($where);
			echo json($data,1);


		}
		function pullArticle(){
			$content = $_POST['content'] ? $_POST['content'] : NULL;
			$title = $_POST['title'] ? $_POST['title'] : NULL;
			$author = $_POST['author'] ? $_POST['author'] : NULL;
			$thumb = $_POST['thumb'] ? $_POST['thumb'] : NULL;
			$columnId = $_POST['columnId'] ? $_POST['columnId'] : NULL;
			$data = $this->index->pull_article($content,$title,$author,$thumb,$columnId);


		}

		// function initDATAM(){
		// 	$data = array(
		// 				0=>array(
		// 						'title'=>"大黄蜂",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"https://imgsrc.baidu.com/baike/pic/item/8ad4b31c8701a18b7d122ac7932f07082938feb9.jpg",
		// 						'type'=>"热剧"
		// 					),
		// 				1=>array(
		// 						'title'=>"我们",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"/web/resources/1.jpg",
		// 						'type'=>"热剧"
		// 					),
		// 			);
		// 		echo json($data, 1);
		// }
		// function initDATA(){
		// 	$data = array(
		// 				0=>array(
		// 						'title' => '这是标题',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想1</div>'
		// 					),
		// 				1=>array(
		// 						'title' => '这是标题',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想2</div>'
		// 					),
		// 			);
		// 		echo json($data, 1);
		// }
		// function addCART(){
			
		// 	if($_POST['selected']==1){
		// 		$data = array(
		// 				0=>array(
		// 						'title' => '这是标题',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想1</div>'
		// 					),
		// 				1=>array(
		// 						'title' => '这是标题',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想2</div>'
		// 					),
		// 			);
		// 		echo json($data, 1);

		// 	}elseif ($_POST['selected']==2) {
		// 		$data = array(
		// 				0=>array(
		// 						'title' => '这是标题1',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想2</div>'
		// 					),
		// 				1=>array(
		// 						'title' => '这是标题2',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想1</div>'
		// 					),
		// 			);
		// 		echo json($data, 1);
				

				
		// 	}elseif($_POST['selected']==3){
		// 		$data = array(
		// 				0=>array(
		// 						'title' => '这是标题2',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想3</div>'
		// 					),
		// 				1=>array(
		// 						'title' => '这是标题3',
		// 						'url' => 'www.baidu.com',
		// 						'description' => '这是简介',
		// 						'date' => '2019.1.7',
		// 						'tag' => '<div style="color:red">我的思想1</div>'
		// 					),
		// 			);
		// 		echo json($data, 1);
				

		// 	}
			
		// }
		// function movieCART(){
		// 	if($_POST['selected']==1){
		// 		$data = array(
		// 				0=>array(
		// 						'title'=>"大黄蜂",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"https://imgsrc.baidu.com/baike/pic/item/8ad4b31c8701a18b7d122ac7932f07082938feb9.jpg",
		// 						'type'=>"热剧"
		// 					),
		// 				1=>array(
		// 						'title'=>"我们",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"/web/resources/1.jpg",
		// 						'type'=>"热剧"
		// 					)
		// 			);
		// 	    echo json($data, 1);


		// 		}elseif($_POST['selected']==2){
		// 			$data = array(
		// 				0=>array(
		// 						'title'=>"大江大河",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"https://gss0.bdstatic.com/-4o3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=5fe00fa9fa03918fd7d13acc690641aa/fc1f4134970a304e19d8f8b3dcc8a786c8175c84.jpg",
		// 						'type'=>"热剧"
		// 					),
		// 				1=>array(
		// 						'title'=>"我们的四十年",
		// 						'url'=>"www.baidu.com",
		// 						'thumb'=>"/web/resources/1.jpg",
		// 						'type'=>"热剧"
		// 					),
		// 			);
		// 	    echo json($data, 1);

		// 		}
		// }
		// function tuijianCART(){
		// 	if($_POST['selected']==1){
		// 		$data = array(
		// 				0=>array(
		// 						'title'=>"甄子丹：勇敢走每一步 什么困难都可解决",
		// 						'thumb'=>"/web/resources/3.jpg",
		// 					),
		// 				1=>array(
		// 						'title'=>"小饼饼：2019加油小饼饼",
		// 						'thumb'=>"/web/resources/4.jpg",
		// 					),
		// 			);
		// 		echo json($data, 1);


		// 	}elseif ($_POST['selected']==2) {
		// 		$data = array(
		// 				0=>array(
		// 						'title'=>"努力让人生更好",
		// 						'thumb'=>"/web/resources/1.jpg",
		// 					),
		// 				1=>array(
		// 						'title'=>"加油加油",
		// 						'thumb'=>"/web/resources/2.jpg",
		// 					),
		// 			);
		// 		echo json($data, 1);
				
		// 	}
		// }

		function getPID(){
			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_categray($where);
			echo json($data,1);
			
		}

}