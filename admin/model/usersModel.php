<?php
	class usersModel extends db 
	{
		function __construct()
		{
			parent::__construct();
		}

		//获取用户信息
		function get_users_info($where){
			$data=$this->get('wx_admins')->where($where)->select();
			return $data;
		}

		//获取用户组
		function get_user_group(){
			$data=$this->get('course_usersgroup')->select();
			return $data;
		}

		//用户添加
		function users_insert($data){
			$data=$this->insert($data,'course_users');
			return $data;
		}

		//获取用户列表
		function get_users($where,$offset,$pagesize){
			$sql="SELECT * FROM course_users".$where." limit ".$offset.",".$pagesize;
			$data=$this->getAll($sql);
			return $data;
		}

		//用户信息修改
		function update_user($data,$where){
			$data=$this->updata($data,$where,'course_users');
			return $data;
		}

		//获取用户数量
		function get_user_num($where){
			$sql="SELECT * FROM course_users".$where;
			$data=$this->getAll($sql);
			return $data;
		}

		//用户组添加
		function users_group_add($data){
			$data=$this->insert($data,'course_usersgroup');
			return $data;
		}

		//获取用户组详情
		function get_group_info($where){
			$data=$this->get('course_usersgroup')->where($where)->select();
			return $data;
		}

		//用户组修改
		function group_update($data,$where){
			$data=$this->updata($data,$where,'course_usersgroup');
			return $data;
		}

		//用户组删除
		function group_del($id){
			$sql = 'DELETE FROM course_usersgroup WHERE id ='.$id;
			$data=$this->del($sql);
			return $data;
		}
		
	}
?>