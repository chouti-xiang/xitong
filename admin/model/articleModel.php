<?php
	class articleModel extends db 
	{
		function __construct()
		{
			parent::__construct();
		}

		//获取文章列表
		function get_atricle_list($where,$order,$offset,$pagesize){	
			$sql="SELECT * FROM wx_words ".$where." limit ".$offset.",".$pagesize;
			$data=$this->getAll($sql);
			return $data;
		}
		
		//统计文章数量
		function get_article_num($where){
			$sql="SELECT * FROM wx_words ".$where;
			$data=$this->getAll($sql);
			return $data;
		}

		//删除文章
		function article_delete($id){
			$sql = 'DELETE FROM wx_words WHERE wid ='.$id;
			$data=$this->del($sql);
			return $data;
		}

		//获取文章详情
		function get_article_detail($where){
			$data=$this->get('wx_words')->where($where)->select();
			return $data;
		}

		//文章修改
		function article_update($data,$b){

			$data = $this->updata($data,$b,'wx_words');
			
			return $data;
		}

		//文章添加
		function article_insert($data){
			$data=$this->insert($data,'wx_words');
			return $data;
		}

		//获取文章类型
		function get_article_type($order){
			$data=$this->get('course_articlestype')->order($order)->select();
			return $data;
		}

		//文章类型添加
		function type_add($data){
			$data=$this->insert($data,'course_articlestype');
			return $data;
		}

		//获取文章类型详情
		function get_type_info($where){
			$data=$this->get('course_articlestype')->where($where)->select();
			return $data;
		}

		//文章类型修改
		function type_update($data,$where){
			$data=$this->updata($data,$where,'course_articlestype');
			return $data;
		}

		//文章类型删除
		function type_del($id){
			$sql = 'DELETE FROM course_articlestype WHERE id ='.$id;
			$data=$this->del($sql);
			return $data;
		}

	}
?>