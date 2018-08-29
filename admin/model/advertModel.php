<?php
	class advertModel extends db 
	{
		function __construct()
		{
			parent::__construct();
		}
		//获取广告位
		function get_advert_list()
		{
			$data=$this->get('wx_codes')->select();
			return $data;
		}
				
		function advert_delete($id)
		{
			$sql = 'DELETE FROM wx_codes WHERE cid ='.$id;
		
			$data=$this->del($sql);
			return $data;
		}

		//获取广告详情
		function get_advert_detail($where){
			$data=$this->get('wx_codes')->where($where)->select();
			return $data;
		}

		//广告修改
		function advert_update($data,$b){
			$data= $this->updata($data,$b,'wx_codes');
			return $data;
		}

		//广告添加
		function advert_add($data){
			$data=$this->insert($data,'wx_codes');
			return $data;
		}


		//获取轮播
		function get_banner($order){
			$data=$this->get('course_banner')->order($order)->select();
			return $data;
		}

		//轮播添加
		function banner_insert($data){
			$data=$this->insert($data,'course_banner');
			return $data;
		}

		//获取轮播信息
		function get_banner_info($where){
			$data=$this->get('course_banner')->where($where)->select();
			return $data;
		}

		//轮播修改
		function banner_update($data,$where){
			$data=$this->updata($data,$where,'course_banner');
			return $data;
		}

		//轮播删除
		function banner_delete($id){
			$sql = 'DELETE FROM course_banner WHERE id ='.$id;
			$data=$this->del($sql);
			return $data;
		}
}
?>