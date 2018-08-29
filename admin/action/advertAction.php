<?php
	class advertAction  
	{
		public $advert;
		function __construct()
		{
			$this->advert = new advertModel;
		}

		//获取广告列表
		function index(){
			$data=$this->advert->get_advert_list();
			include(tpl('advert_list'));
		}

		//广告添加
		function add(){
			if ($_POST) {
				$data = $_POST;
				$data['creattime']=time();
				$flag = $this->advert->advert_add($data);
				if ($flag) {
					header('Location:/index.php?app=admin&act=advert-index');
				}else{
					json('添加失败',0);
				}
			}else{
				include(tpl('advert_add'));
			}
		}

		//广告修改
		function update(){
			if ($_POST) {
				$data = $_POST;
				$id=$data['id'];
				$where = array('cid'=>$id);
				unset($data['id']);
				$flag =$this->advert->advert_update($data,$where);
				if ($flag) {
					header('Location:/index.php?app=admin&act=advert-index');
				}else{
					header('Location:/index.php?app=admin&act=advert-update?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('cid'=>$id);
				$data=$this->advert->get_advert_detail($where);
				include(tpl('advert_edit'));
			}
		}

		//删除广告
		function del(){
			$id = $_POST['id'];
			$flag=$this->advert->advert_delete($id);
			if($flag){
				json('删除成功',1);	
			}else{
				json('删除失败',0);	
			}
		}

		//获取轮播
		function banner(){
			$order="sorts desc";
			$data=$this->advert->get_banner($order);
			include(tpl('banner'));
		}

		//轮播添加
		function banner_add(){
			if($_POST){
				$data=$_POST;
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path'] ? $data['images'] = $v['path'] :'';break;
					}
				}
				$data['creat_time']=time();
				$data['update_time']=time();
				$flag=$this->advert->banner_insert($data);
				if($flag){
					header('location:/index.php?app=admin&act=advert-index');
				}else{
					header('location:/admin/advert/banner_add/');
				}
			}else{
				include(tpl('banner_add'));
			}
		}

		//轮播修改
		function banner_update(){
			if($_POST){
				$data=$_POST;
				$id=$data['id'];
				unset($data['id']);
				$where=array('id'=>$id);
				$data['update_time']=time();
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path'] ? $data['images'] = $v['path'] :'';break;
					}
				}
				$flag=$this->advert->banner_update($data,$where);
				if($flag){
					header('location:/admin/advert/banner/');
				}else{
					header('location:/admin/advert/banner_update/?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->advert->get_banner_info($where);
				include(tpl('banner_edit'));
			}
		}

		//轮播删除
		function banner_del(){
			$id = $_POST['id'];
			$flag=$this->advert->banner_delete($id);
			if($flag){
				json('删除成功',1);	
			}else{
				json('删除失败',0);	
			}
		}

		//只想处理图片上传问题
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