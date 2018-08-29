<?php
	//展示数据
	//数据树结构变化
	class courseAction  
	{
		public $course;
		function __construct()
		{
			$this->course = new courseModel;
		}

		//课程列表
		function index(){
			$course_name=$_REQUEST['course_name'];
			$where=" where course_name like '%{$course_name}%'";
			$category=$_REQUEST['category'];
			if($category){
				$where.=" AND category=".$category;
			}
			$order="sorts desc";
			$page=$_REQUEST['page'] ? $_REQUEST['page'] : 1;
			$pagesize=10;
			$offset=($page-1)*$pagesize;
			$data=$this->course->get_course_list($where,$order,$offset,$pagesize);
			$num=count($this->course->get_course_num($where));
			$pages=ceil($num/$pagesize);
			//获取课程类别
			$type=$this->course->get_type($order);
			include(tpl('course'));
		}

		//课程添加
		function add(){
			if($_POST){
				$data=$_POST;
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path']?$data['course_image'] = $v['path'] :'';break;
					}
				}
				$flag=$this->course->course_insert($data);
				if($flag){
					header('location:/admin/course/index/');
				}else{
					header('location:/admin/course/add/');
				}
			}else{
				//获取课程类别
				$order="sorts desc";
				$type=$this->course->get_type($order);
				include(tpl('course_add'));
			}
		}

		//课程修改
		function update(){
			if($_POST){
				$data=$_POST;
				$id=$data['id'];
				unset($data['id']);
				$where=array('id'=>$id);
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path']?$data['course_image'] = $v['path'] :'';break;
					}
				}
				$flag=$this->course->course_updata($data,$where);
				if($flag){
					header('location:/admin/course/index/');
				}else{
					header('location:/admin/course/update/?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->course->get_course_detail($where);
				//获取课程类别
				$order="sorts desc";
				$type=$this->course->get_type($order);
				include(tpl('course_update'));
			}
		}

		//课程删除
		function del(){
			$id=$_POST['id'];
			$flag=$this->course->course_del($id);
			if($flag){
				json('删除成功',1);
			}else{
				json('删除失败',0);
			}
		}

		//课程分类
		function type(){
			$order="sorts desc";
			$data=$this->course->get_type($order);
			include(tpl('course_type'));
		}

		//课程分类添加
		function type_add(){
			if($_POST){
				$data=$_POST;
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path']?$data['image_category'] = $v['path'] :'';break;
					}
				}
				$flag=$this->course->type_insert($data);
				if($flag){
					header('location:/admin/course/type/');
				}else{
					header('location:/admin/course/type_add/');
				}
			}else{
				include(tpl('course_typeadd'));
			}
		}

		//课程分类修改
		function type_update(){
			if($_POST){
				$data=$_POST;
				$id=$data['id'];
				unset($data['id']);
				$where=array('id'=>$id);
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path']?$data['image_category'] = $v['path'] :'';break;
					}
				}
				$flag=$this->course->type_updata($data,$where);
				if($flag){
					header('location:/admin/course/type/');
				}else{
					header('location:/admin/course/type_update/?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->course->get_type_detail($where);
				include(tpl('course_typedetail'));
			}
		}

		//课程分类删除
		function type_del(){
			$id=$_POST['id'];
			$flag=$this->course->type_del($id);
			if($flag){
				json('删除成功',1);
			}else{
				json('删除失败',0);
			}
		}

		//图片上传
		function imgup(){
				$c = (array_filter($_FILES['uploadinput']['name']));

						//如果收到表单传来的参数，则进行上传处理，否则显示表单
				if(!empty($c)){
						//建目录函数，其中参数$directoryName最后没有"/"，
						//要是有的话，以'/'打散为数组的时候，最后将会出现一个空值
						function makeDirectory($directoryName) {
							$directoryName = str_replace("\\","/",$directoryName);
							$dirNames = explode('/', $directoryName);
							$total = count($dirNames) ;
							$temp = '';
							for($i=0; $i<$total; $i++) {
								$temp .= $dirNames[$i].'/';
								if (!is_dir($temp)) {
									$oldmask = umask(0);
									if (!mkdir($temp, 0777)) exit("不能建立目录 $temp"); 
									umask($oldmask);
								}
							}
							return true;
						}

						if($_FILES['uploadinput']['name'] <> ""){
							//设置文件上传目录
							$savePath = "upload";
							//创建目录
							makeDirectory($savePath);
							//允许的文件类型
							$fileFormat = array('gif','jpg','jpge','png');
							//文件大小限制，单位: Byte，1KB = 1000 Byte
							//0 表示无限制，但受php.ini中upload_max_filesize设置影响
							$maxSize = 0;
							//覆盖原有文件吗？ 0 不允许  1 允许 
							$overwrite = 0;
							//初始化上传类
							$f = new Upload( $savePath, $fileFormat, $maxSize, $overwrite);
							//如果想生成缩略图，则调用成员函数 $f->setThumb();
							//参数列表: setThumb($thumb, $thumbWidth = 0,$thumbHeight = 0)
							//$thumb=1 表示要生成缩略图，不调用时，其值为 0
							//$thumbWidth  缩略图宽，单位是像素(px)，留空则使用默认值 130
							//$thumbHeight 缩略图高，单位是像素(px)，留空则使用默认值 130
							$f->setThumb(1);
							
							//参数中的uploadinput是表单中上传文件输入框input的名字
							//后面的0表示不更改文件名，若为1，则由系统生成随机文件名
							if (!$f->run('uploadinput',1)){
								//通过$f->errmsg()只能得到最后一个出错的信息，
								//详细的信息在$f->getInfo()中可以得到。
								echo $f->errmsg()."<br>\n";
							}
							//上传结果保存在数组returnArray中。
							//echo "<pre>";
							$img = $f->getInfo();
					//		$data['thumb'] = $img[0]['path'];
					//		$data['img1'] = $img[1]['path'];
					//		$data['img2'] = $img[2]['paht'];
					//		$data['img3'] = $img[3]['path'];
					//		$data['img4'] = $img[4]['path'];
					//		$data['img5'] = $img[5]['path'];
							return $img;
									//	echo "</pre>";
							}
				}else{
					//				$data['thumb'] = '';
					//				$data['img1'] = '';
					//				$data['img2'] = '';
					//				$data['img3'] = '';
					//				$data['img4'] = '';
					//				$data['img5'] = '';
					$data = array();
					return $data;
				}
		}
}