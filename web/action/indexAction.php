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
			//判断session是否有值
			// 如果有值就输出
			// d($_SESSION['name']);
			include(tpl('index'));

		}
		function initDATAT(){
			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_article($where);
			echo json($data,1);
		}
		function pullArticle(){
			$data = $_POST ;

			$img = $this->imgup();
			d($img);
			exit;
			foreach ($img as $k => $v){
				switch ($k){
					case 0: $v['path']?$data['image_category'] = $v['path'] :'';break;
				}
			}

			$toSql = $this->index->pull_article($data);
			echo $toSql;
		}
		function getPID(){
			$where = $_POST['pid'] ? $_POST['pid'] : 1;
			$data = $this->index->get_categray($where);
			echo json($data,1);
			
		}
		function add(){
			include(tpl('add'));
		}
		function login(){
			include(tpl('login'));
		}
		function check(){
			$name =$_POST['name'];
			$password =$_POST['password'];
			// print_r($name);
			// print_r($password);
			$check = $this->index->checkLogin($name,$password);
			// print_r('这是check');
			
			if(!empty($check)){
				$_SESSION['name'] = $name;
				echo '登录成功';
			}else{
				echo '用户名密码错误';
			}

			// 去数据数据库中校验
			// 如果是这个，存在session $_SESSION
			// 告诉用户登录成功，跳转到index
		}
		function logout(){
			print_r(11111);
			unset($_SESSION['name']);
			header("location:index.php?app=web&act=index-index");
			

		}


		//只想处理图片上传问题
		function imgup(){
			d($_POST);
			d($_FILES);
			exit;
				$c = (array_filter($_FILES['thumb']['name']));

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