<?php 
class model 
{
	
	function __construct()
	{
		$this->table = 'wp_'.get_class($this);
		$this->config = $this->getCahe();
		
	}
	
		
	 /**
 	 * ACTIVE：获取一组数据，如要检索的数据本身具有单一性
 	 * $data 检索字段，$this->table 检索表格
 	 * @return  返回一维数组
 	 * 例子：getRow('id = 1') or getRow(1)
 	 * */
	function getRow($data)
	{
		$data = intval($data);
		if ( is_int($data)) {
 			$WHERE = 'id ='.$data;
 		}elseif(is_string($data)){
 			$WHERE = $data;
 		}else{
 			die('数据库错误：没有输入条件');
 		}
 		$sql = "SELECT * FROM $this->table WHERE $WHERE";
		return db()->getRow($sql);
	}
	
	 /**
 	 * ACTIVE：获取多组数据,如要检索的数据本身不具有单一性
 	 * $data 检索字段，$this->table 检索表格
 	 * @return  返回二维数组
 	 * 例子：getAll('status = 1') or getAll()
 	 * */
	function getAll($data = '')
	{
		$list = array();
 		$sql = "SELECT * FROM ";
 		$sql.= $this->table;
 		$sql.= $data ? " WHERE $data ":'';
		return db()->getAll($sql);
	}
	
	 /**
 	 * ACTIVE：存入数据库
 	 * $pararm 检索字段，$this->table 检索表格
 	 * @return  返回一维数组
 	 * 例子：getRow('id = 1')
 	 * */
	function insert($data)
	{
		$k = array();
 		$v = array();
 		$i = 0;
 		$data = array_filter($data);
 		foreach ($data as $key => $val)
 		{
 			$k[$i] = $key;
 			$v[$i] = is_array($val) ? serialize($val) : $val;
 			$i++;
 		}
 		$key = implode(',',$k);
 		$val = implode("','",$v);
 		$sql = "INSERT INTO $this->table ($key) VALUES ('$val')";
		return db()->insert($sql);
	}
	
	 /**
 	 * ACTIVE:删除表结构
 	 * @param  string $data  删除条件
 	 * @param  char $table 表明
 	 * */
	function del($data)
	{
		$sql = "DELETE FROM $this->table WHERE id = $data ";
		return db()->del($sql);
	}
	
	 /**
 	 * ACTIVE:更新数据
 	 * @param  string $data 更新数据
 	 * @param char $table 表明
 	 * */
	function updata($data)
	{
		$string = array();
 		$data_content = array_slice($data,1);
 		foreach ($data as $key => $val )
 		{
 			$val = is_array($val) ? serialize($val) :$val;
 			$string[$key]= $key."='".$val."'";
 		}
 		$data_content = implode(',',$string);
 		$sql = "UPDATE $this->table set $data_content WHERE id = $data[id]";
 	
		return db()->updata($sql);
	}
	
	/*读数据库表结构，生成缓存表*/
	function getCahe()
	{
		$path = SITE_ROOT.'conf/field/';
		$pathcopy = SITE_ROOT.'conf/DIYfield/';
		$name = $path.($this->table).'.php';
		$namecopy = $pathcopy.($this->table).'.php';
		if (!is_file($name)) db_cach_data($this->table);
		$data = m(include($name),include($namecopy));
		/*剔除不允许显示的数据*/
		foreach ($data as $key => $value)
		{
			if($value['is_show'])
			{
				$datashow[$key] = $value;
			}
		}
		return $data;
	}
	
	/**
	 * 自动识别为止方法
	 * getCache_NOid
	 * */
	/*function __call() 
	{
		
	}*/
	
	/**
 * 更新数据库缓存文件
 * Active :更新数据库缓存配置文件
 * */
function upload_sql_cahe($table)
{
	$pathcopy = SITE_ROOT."conf/DIYfield/";
	$namecopy = $pathcopy.$table.'.php';
	$cache = include($pathcopy.$table.'.php');
	$cache_bak = include($pathcopy.$table.'_bak.php');
	$array = m($cache_bak,$cache);
	file_put_contents($namecopy,'<?php return '.var_export($array,true).';');
	
}
}