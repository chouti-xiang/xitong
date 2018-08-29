<?php
	class articleAction  
	{
		public $article;
		function __construct()
		{
			$this->article = new articleModel;
			if(!$_SESSION['admin_id']){
				exit(include(tpl('login')));
			}
		}
		//获取文章列表
		function index(){
			$title=$_REQUEST['cntitle'];
			$where=" where cntitle like '%{$title}%'";
			$page=$_REQUEST['page'] ? $_REQUEST['page'] : 1;
			$pagesize=40;
			$order="creat_time desc";
			$offset=($page-1)*$pagesize;
			$article=$this->article->get_atricle_list($where,$order,$offset,$pagesize);
			$num=count($this->article->get_article_num($where));
			$pages=ceil($num/$pagesize);
			
			include(tpl('articlelist'));
		}

		//文章修改
		function update(){
			if ($_POST) {
				$data = $_POST;
				$id =$data['id'];
				$where=array('wid'=>$id);
				unset($data['id']);
				$data['content'] = htmlspecialchars($data['content']);
				$flag=$this->article->article_update($data,$where);
				if ($flag) {
					header('Location:/index.php?app=admin&act=article-index');
				}else{
					header('Location:/index.php?app=admin&act=article-update&id='.$id);
				}	
			}else{
				$id=$_GET['id'];
				$where=array('wid'=>$id);
				$data=$this->article->get_article_detail($where);
			
				include(tpl('article_edit'));
			}
		}

		//文章增加
		function add(){
			if ($_POST) {
				$data = $_POST;
				$data['content'] = htmlspecialchars($data['content']);
				$flag=$this->article->article_insert($data);
				if ($flag) {
					header('Location:/index.php?app=admin&act=article-index');
				}else{
					header('Location:/index.php?app=admin&act=article-add');
				}	
			}else{
				
				include(tpl('articlel_add'));
			}
		}

		//文章删除
		function del(){
			$id = $_POST['id'];
			$flag=$this->article->article_delete($id);
			if($flag){
		    	json('删除成功',1);	
			}else{
				json('删除失败',0);
			}
		}

		//文章类型列表
		function type(){
			$order="sorts desc";
			$data=$this->article->get_article_type($order);
			include(tpl('articletype'));
		}

		//文章类型添加
		function type_add(){
			if($_POST){
				$data=$_POST;
				$img = $this->imgup();
				foreach ($img as $k => $v){
					switch ($k){
						case 0: $v['path']?$data['image_category'] = $v['path'] :'';break;
					}
				}
				$flag=$this->article->type_add($data);
				if($flag){
					header('location:/admin/article/type/');
				}else{
					header('location:/admin/article/type_add/');
				}

			}else{
				include(tpl('article_typeadd'));
			}
		}

		//文章类型修改
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
				$flag=$this->article->type_update($data,$where);
				if($flag){
					header('location:/admin/article/type/');
				}else{
					header('location:/admin/article/type_update/?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->article->get_type_info($where);
				include(tpl('article_typeedit'));
			}
		}

		//文章分类删除
		function type_del(){
			$id=$_POST['id'];
			$flag=$this->article->type_del($id);
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