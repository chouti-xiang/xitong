<?php
	//展示数据
	//数据树结构变化https://47.95.197.104/index.php?app=admin&act=users-login
	class indexAction  
	{
		public $index;
		function __construct()
		{
			$this->index = new indexModel;
		}

		function index(){
			if($_SESSION['admin_id']){
				include(tpl('index'));
					// header('Location:/index.php?app=admin&act=index-index');
			}else{
				header('location:/index.php?app=admin&act=users-login');
			}
		}
		function home(){
			//获取会员数
			$data=$this->index->get_user_num();
			$u_num=count($data);
			//获取课程数
			$data=$this->index->get_course_num();
			$c_num=count($data);
			//获取文章数
			$data=$this->index->get_article_num();
			$a_num=count($data);
			//获取广告数
			$data=$this->index->get_advert_num();
			$v_num=count($data);
			include(tpl('home'));
		}

		function code(){
			$nick = $_POST['nickname'];
			$code = $_POST['code'];
			$data = $this->index->getInfor($nick);

			if($data['wxcode'] == $code && $code != ''){
				json('登陆成功',1);
			}else{
				json('邀请码不对',0);
			}
		}

		function words(){
			$word = $_POST['word'] ;
			if($word){
				$data = $this->index->getWords($word);
			}else{
				json('数据为空',0);
				exit;
			}

			json($data,1);

		}	
}