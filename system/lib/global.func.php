<?php
function d($data)
{
	
	echo "<pre style='float:left;'>";
	print_r($data);
	echo "</pre><br />";
}
/**
 * name:前台模版定向
 * $tpl:指定模版定向
 * */
function tpl($tpl = '')
{
	header("Content-Type: text/html; charset=utf-8");
	// if($tpl) {
	// 	return "./protel/tpl/$tpl.php";
	// }
	return APP_ROOT."/{$_ENV['app']}/view/{$tpl}.tpl.php";
	//return "./protel/tpl/{$_ENV['module']}/{$_ENV['action']}.php";
}


/**
*name:手机端模板定向
*$mobile:指向模板定向
*
**/
function mobile($tpl=''){
	header("Content-Type: text/html; charset=utf-8");
	return SITE_ROOT."/mobile/view/{$tpl}.tpl.php";
}

/**
 * 转发DB类，调用数据库
 * static 保证只创建一次DB类
 * */
function db()
{
	static $db;
	if($db) return $db;
	$db = new db();
	return $db;
}

/**
 * Ajax通讯函数
 * @param  string data  状态描述
 * @param   int  flag  状态值
 * */
function json($data = null,$flag = 0)
{
	
	$json = array();
	if(is_array($data))
	{
		$json = array('flag' => $flag,'data' =>$data);
	}elseif (is_object($data))
	{
		$json = (array)($data);
	}elseif (is_string($data))
	{
		$json = array('flag' => $flag,'data' =>$data);
	}else{
		$flag = (int)$data;
		$msg = $flag ? '操作成功':'操作失败';
		$json = array('flag' => $flag,'data' => $msg);
	}
	die(json_encode($json));
}
		
/**
 * 截取链接
 * @param  $string $_SERVER['HTTP_REFERER'] 需要截取的链接
 * @param   
 * */
function s($url)
{
	$array = explode('-',$url);
	return $array[1];
}

/**
 * ACTIVE:数据库整理
 * */
function db_arrgement()
{
	
}

/**
 * ACTIVE:更新数据库缓存
 * */
function db_cach_data($table)
{
	$list = array();
	$cache = array();
	$cache_1 = array();//二维数组
	$hide_array = array('Null','Default','Extra','Field','Type'); //不显示内容
	$path = SITE_ROOT."conf/field/";
	$pathcopy = SITE_ROOT."conf/DIYfield/";
	mkdir($path,0777);
	// 查询表结构
 	$sql = "describe $table";
 	$list = db()->db_cach_data($sql);
 	$c =$list;
 	foreach ($c as $key =>$value)
		{
			foreach ($value as $k => $val)
			{
				if(!in_array($k,$hide_array))
				{
					$cache_1[$k] = $val;
				};
				$cache_diy1['title'] = $value['Field'];
				$cache_diy1['is_list'] = '';
				$cache_diy1['is_table'] = '';
				$cache_diy1['class'] = '';
			}
			$cache_diy1['label'] = $val['Field'];
			$cache[$value['Field']] = $cache_1;
			$cache_diy[$value['Field']] = $cache_diy1;
		}
	$name = $path.$table.'.php';
	$namecopy = $pathcopy.$table.'.php';
	file_put_contents($name,'<?php return '.var_export($cache,true).';');
	file_put_contents($namecopy,'<?php return '.var_export($cache_diy,true).';');
}

/**
 * 合并数组
 * $b 覆盖 $a
 * @param array $b $a 
 * */
function m($a,$b)
{
	foreach ($a as $key1 =>$value1)
	{
		$c[$key1] = array_merge($a[$key1],$b[$key1]);
	}
	return $c;
}


/**
 * 替换字符串
 * @param  $sting  被替换的字符串
 * @param  $data 替换的参数
 * */
function replace_string($data1,$data2 ='',$string)
{
	$string = str_replace($data,'',$string);
} 


//发送短信
function send_sms($M,$S){
	//企业ID $userid
	$userid = '123456';
	//用户账号 $account
	$account = '600028';
	//用户密码 $password
	$password = '11457306';
	//发送到的目标手机号码 $mobile
	$mobile = $M;
	//短信内容 $content
 	$content = $S;
    //发送短信
	$gateway="http://sh2.ipyy.com/sms.aspx?action=send&userid={$userid}&account={$account}&password={$password}&mobile={$mobile}&content={$content}&sendTime=&extno=";
	$result = file_get_contents($gateway);

	$xml = simplexml_load_string($result);
	return $xml->returnstatus;
}


//对象转换数组
