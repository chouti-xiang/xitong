<?php
	class courseModel extends db 
	{
		function __construct()
		{
			parent::__construct();
		}

		//获取课程列表
		function get_course_list($where,$order,$offset,$pagesize){
			$sql="SELECT * FROM course_info ".$where." order by ".$order." limit ".$offset.",".$pagesize;
			$data=$this->getAll($sql);
			return $data;
		}

		//获取课程数量
		function get_course_num($where){
			$sql="SELECT * FROM course_info ".$where;
			$data=$this->getAll($sql);
			return $data;
		}

		//课程添加
		function course_insert($data){
			$data=$this->insert($data,'course_info');
			return $data;
		}

		//课程修改
		function course_updata($data,$where){
			$data=$this->updata($data,$where,'course_info');
			return $data;
		}

		//课程删除
		function course_del($id){
			$sql = 'DELETE FROM course_info WHERE id ='.$id;
			$data=$this->del($sql);
			return $data;
		}

		//获取课程信息
		function get_course_detail($where){
			$data=$this->get('course_info')->where($where)->select();
			return $data;
		}

		//获取课程类型
		function get_type($order){
			$data=$this->get('course_type')->order($order)->select();
			return $data;
		}

		//课程类型添加
		function type_insert($data){
			$data=$this->insert($data,'course_type');
			return $data;
		}

		//课程类型修改
		function type_updata($data,$where){
			$data=$this->updata($data,$where,'course_type');
			return $data;
		}

		//获取课程类型详情
		function get_type_detail($where){
			$data=$this->get('course_type')->where($where)->select();
			return $data;
		}

		//课程类型删除
		function type_del($id){
			$sql = 'DELETE FROM course_type WHERE id ='.$id;
			$data=$this->del($sql);
			return $data;
		}

	}