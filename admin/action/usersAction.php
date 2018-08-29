<?php
	//展示数据
	//数据树结构变化
	class usersAction  
	{
		public $users;
		function __construct()
		{
			$this->users = new usersModel;
		}
		function login(){
			include(tpl('login'));
		}
		//管理员登录
		function dologin(){
			if($_POST){
				$data=$_POST;
				$username=$data['username'];
				$where=array('username'=>$username);
				$info=$this->users->get_users_info($where);
				if($info){
					if($info[0]['usersgroup_id']=='1'){
						if($info[0]['password']==$data['password']){
							$_SESSION['admin_id']=$info[0]['id'];
							$_SESSION['admin_name']=$info[0]['username'];
							json('登录成功',1);
						}else{
							json('密码错误',0);
						}
					}else{
						json('您不是管理员',0);
					}
				}else{
					json('账户不存在',0);
				}
			}else{
				include(tpl('login'));
			}
		}

		//管理员退出
		function loginout(){
			unset($_SESSION['admin_id']);
			unset($_SESSION['admin_name']);
			header('location:/admin/users/login/');
		}

		//用户列表
		function index(){
			$username=$_REQUEST['username'];
			$where=" where username like '%{$username}%'";
			if($_REQUEST['usersgroup_id']){
				$usersgroup_id=$_REQUEST['usersgroup_id'];
				$where.=" AND usersgroup_id=".$usersgroup_id;
			}
			$page=$_REQUEST['page'] ? $_REQUEST['page'] : 1;
			$pagesize='10';
			$offset=($page-1)*$pagesize;
			$data=$this->users->get_users($where,$offset,$pagesize);
			//获取用户组
			$group=$this->users->get_user_group();
			//获取用户数量
			$num=count($this->users->get_user_num($where));
			//得到总页数
			$pages=ceil($num/$pagesize);
			include(tpl('users'));
		}

		//删除用户
		function det(){
			$where=array('username'=>$_SESSION['admin_name'],'id'=>$_SESSION['admin_id']);
			$info=$this->users->get_users_info($where);
			if($info){
				$sql = 'DELETE FROM course_users WHERE id = '.$_POST['id'];
				$this->users->getAll($sql);
				json('删除成功',1);
			}else{
				json('删除失败',0);
				exit;
			}

		}

		function load(){


			require_once 'system/lib/phpexcel/PHPExcel.php';
			require_once 'system/lib/phpexcel/PHPExcel/IOFactory.php';
			$name = '品课网已经回复用户列表';
			$objPHPExcel = new PHPExcel();
			$sql = 'SELECT * FROM course_users where usersgroup_id=4';
			$data = $this->users->getAll($sql);
			  foreach($data as $k => $v){  
  
             $num=$k+1;  
             $objPHPExcel->setActiveSheetIndex(0)//Excel的第A列，uid是你查出数组的键值，下面以此类推  
                          ->setCellValue('A'.$num, $v['id'])     
                          ->setCellValue('B'.$num, $v['username'])  
                          ->setCellValueExplicit('C'.$num, $v['phone'],PHPExcel_Cell_DataType::TYPE_STRING)  
                          ->setCellValue('D'.$num, $v['course'])  
                          ->setCellValue('E'.$num, $v['grade']);  
            }   

            $objPHPExcel->getActiveSheet()->setTitle('User');

             $objPHPExcel->setActiveSheetIndex(0);  
             header('Content-Type: applicationnd.ms-excel');  
             header('Content-Disposition: attachment;filename="'.$name.'.xls"');  
             header('Cache-Control: max-age=0');  
             $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
             $objWriter->save('php://output');  
             exit;  
			// //Excel表格式,这里简略写了8列
			// $letter = array('A','B','C','D','E');
			// //表头数组
			// $tableheader = array('用户昵称','用户手机号','预约科目','用户年级','用户备注');
			// //填充表头信息
			// for($i = 0;$i < count($tableheader);$i++) {
			// $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
			// }
			// $sql = 'SELECT * FROM course_users where usersgroup_id=4';
			// $data = $this->users->getAll($sql);
			
			// //填充表格信息
			// for ($i = 2;$i <= count($data) + 1;$i++) {
			// $j = 0;
			// foreach ($data[$i - 2] as $key=>$value) {
			// 	d($value);
			// $excel->getActiveSheet()->setCellValue($letter[$j][$i],$value);
			// $j++;
			// }
			// }
			// d(111);
			//创建Excel输入对象
		

			// require_once 'system/lib/phpexcel/PHPExcel/IOFactory.php';
			
			// $data = excelToArray('web/action/cn.csv','csv');
			// $data = array_filter($data);
			// foreach ($data as $key => $value) {
			// 	if($key>1){
					
			// 			$ndata['email'] = $value[0];
			// 			$ndata['createtime'] = time();	
			// 			$ndata['issub'] = 1;
			// 			$ndata['iscn'] = 1;
			// 			$ndata['ip'] = $_SERVER['SERVER_ADDR'];
			// 			$this->email->insert($ndata,'email');
			// 	}
			// }
		}

		//用户密码修改
		function passagechange(){
			if($_POST){
				
				$flag = $this->users->get_users_info(array('password'=>$_POST['password'],'username'=>'admin'));
				if($flag){
					if($_POST['newpassword'] == $_POST['repassword']){
						$flag=$this->users->update_user(array('password'=>$_POST['newpassword']),array('username'=>'admin'));
						if($flag){
							echo '<script>alert("修改成功");location.href = "/admin/users/group/";</script>';
							
						}else{
							echo '<script>alert("修改失败");location.href = "/admin/users/passagechange/";</script>';
							
						}
					}else{
						echo '<script>alert("两次输入密码不一致");location.href = "/admin/users/passagechange/";</script>';
						
					}
				}else{
					echo '<script>alert("原密码不正确");location.href = "/admin/users/passagechange/";</script>';
					//header('location:/admin/users/passagechange/');
				}
			}else{

				include(tpl('passagechange'));
			}
		}
		
		//用户添加
		function add(){
			if($_POST){
				$data=$_POST;
				$flag=$this->users->users_insert($data);
				if($flag){
					header('location:/admin/users/index/');
				}else{
					header('location:admin/users/add/');
				}
			}else{
				//获取用户组
				$group=$this->users->get_user_group();
				include(tpl('user_add'));
			}
		}

		//用户修改
		function update(){
			if($_POST){
				$data=$_POST;
				$id=$data['id'];
				unset($data['id']);
				$where=array('id'=>$id);
				$flag=$this->users->update_user($data,$where);
				if($flag){
					header('location:/admin/users/index/');
				}else{
					header('location:/admin/users/update/?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->users->get_users_info($where);
				//获取用户组
				$group=$this->users->get_user_group();
				include(tpl('user_edit'));
			}
		}

		//用户组列表
		function group(){
			$data=$this->users->get_user_group();
			include(tpl('user_group'));
		}

		//添加用户组
		function group_add(){
			if($_POST){
				$data=$_POST;
				$flag=$this->users->users_group_add($data);
				if($flag){
					header('location:/admin/users/group/');
				}else{
					header('location:/admin/users/group_add/');
				}
			}else{
				include(tpl('user_groupadd'));
			}
		}

		//用户组修改
		function group_update(){
			if($_POST){
				$data=$_POST;
				$id=$data['id'];
				$where=array('id'=>$id);
				unset($data['id']);
				$flag=$this->users->group_update($data,$where);
				if($flag){
					header('location:/admin/users/group/');
				}else{
					header('location:/admin/users/group_update?id='.$id);
				}
			}else{
				$id=$_GET['id'];
				$where=array('id'=>$id);
				$data=$this->users->get_group_info($where);
				include(tpl('user_groupedit'));
			}
		}

		//用户组删除
		function group_del(){
			$id=$_POST['id'];
			$flag=$this->users->group_del($id);
			if($flag){
				json('删除成功',1);
			}else{
				json('删除失败',0);
			}
		}
}