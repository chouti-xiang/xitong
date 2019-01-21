<?php
	class indexModel extends db 
	{
		function __construct()
		{
			parent::__construct();
		}

		//查询用户数量
		function get_categray($where){
			$sql = "SELECT * FROM hy_categray WHERE pid = '".$where."'";
			$data=$this->getAll($sql);
			return $data;
		}

	   //获取文章列表
		function get_words_list($where){	
			$sql="SELECT * FROM wx_words ".$where;
			$data=$this->getAll($sql);
			return $data;
		}
		//查询文章数量
		function get_article_num(){
			$data=$this->get('course_articles')->select();
			return $data;
		}

		//查询广告数量
		function get_advert_num(){
			$data=$this->get('course_usersadvert')->select();
			return $data;
		}

		//查询课程数量
		function get_course_num(){
			$data=$this->get('course_info')->select();
			return $data;
		}


		//获取文章列表
		function getInfor($where){	
			$sql="SELECT * FROM wx_codes WHERE username = '".$where."'";
			$data=$this->getRow($sql);
			return $data;
		}

		function getWords($word){
			$sql="SELECT * FROM wx_words WHERE cntitle LIKE '%".$word."%'";
			$data=$this->getAll($sql);
			return $data;
		}
	}