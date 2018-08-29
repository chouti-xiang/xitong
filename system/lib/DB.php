<?php 
 class db 
 {
 	var $link;
 	var $sql;
 	var $get;
 	var $where;
 	var $order;
 	var $limit;
 	function __construct()
 	{
 
 		$this->link= mysqli_connect($_ENV['SQL']['DBHOST'],$_ENV['SQL']['DBUSER'],$_ENV['SQL']['DBPASS']) or die('无法连接数据库');
 		mysqli_select_db($this->link,$_ENV['SQL']['DBNAME']) or die('找不到数据库');
 		mysqli_set_charset($this->link,'utf8');
 	}
 	
 	function getRs($sql)
 	{
 		// d($sql);
 		return mysqli_query($this->link,$sql);
 	}
 	/**
 	 * ACTIVE：获取一组数据，如要检索的数据本身具有单一性
 	 * */
 	function getRow($sql)
 	{
 		$rs = $this->getRs($sql);
 		$row = mysqli_fetch_assoc($rs);

 		if (!$row) {
 			return $row;
 			die('查询异常：没有找到符合标准的数据');	
 		}
 		return $row;
 	}
 	/**
 	 * ACTIVE：获取多组数据,如要检索的数据本身不具有单一性
 	 * */
 	function getAll($sql, $type=1)
 	{
 		$rs = $this->getRs($sql);
 		if (!$rs) {
 			return $list;
 			die('查询异常：没有找到符合标准的数据');
 		}
 		if($rs->num_rows > 0){
 			 while($all = @mysqli_fetch_assoc($rs))
	 		{
	 			$list[] = $all;
	 		};
 		}else{
 			$list = '';
 		}
 		return $list;
 	}
 	 /**
 	 * ACTIVE：存入数据库
 	 * */
 	function insert($data,$table)
 	{

		$k = array();
 		$v = array();
 		$i = 0;
 		//$data = array_filter($data);过滤为空的数组，但是有些值是空，这个还要商讨
 		foreach ($data as $key => $val)
 		{
 			$k[$i] = $key;
 			$v[$i] = is_array($val) ? serialize($val) : $val;
 			$i++;
 		}
 		$key = implode(',',$k);
 		$val = implode("','",$v);
 		$sql = "INSERT INTO {$table} ($key) VALUES ('$val')";
 		$rs = $this->getRs($sql);
 		return mysqli_insert_id($this->link);
 		
 	}
 	/**
 	 * ACTIVE:删除表结构
 	 * */
 	function del($sql)
 	{
 		$rs = $this->getRs($sql);
 		return $rs;
 	}
 	/**
 	 * ACTIVE:更新数据
 	 * @param  string $a 更新数据
 	 * @param  string $b 条件
 	 * @param char $table 表明
 	 * */
 	function updata($a,$b,$table)
 	{
 		$where = '';
 		$string = array();
 		$a  = is_array($a) ? $a : 1;
 		foreach ($a as $k => $v){
 			$c = $k.' = "'.$v.'"';
 			$string[$k] =  $c ;
 		}
 		$where = implode(',',$string);
 		
 		$whereb = '';
 		$stringb = array();
 		$b = is_array($b) ? $b : 1;
 		foreach ($b as $k => $v){
 			$cb = $k.' = "'.$v.'"';
 			$stringb[$k] =  $cb ;
 		}
 		$whereb = implode(' AND ',$stringb);
 		
 		$sql = "UPDATE $table set $where WHERE $whereb";
       
 		$rs = $this->getRs($sql);
 		return $rs;
 	}
 
 	/**
 	 * ACTIVE:读数据库表结构，生成数据库缓存
 	 * */
 	function db_cach_data($sql)
 	{
 		$table_content = db()->getRs($sql);
 		while($all = mysql_fetch_assoc($table_content))
 		{
 			 $list[] = $all;
 		}
 		return $list;
 	}

 	function order($string)
 	{
 		$this->sql = "$this->sql ORDER BY $string" ;
 		return $this;
 	}

 	function limit($page,$num)
 	{
 		if($page == 0)
 		{
 			$min = $page ;
 			$max = $num ;
 		}else{
 			$min = (($page-1) * $num);
 			$max =  $num ;
 		}
 
 		$limit = 'limit '.$min.','.$max;
 		$this->sql = "$this->sql $limit" ;
 		return $this;
 		
 	}

 	 function where($b)
 	{
 		
 		if(!$b){
 			$this->sql = "$this->sql WHERE 1=1" ;
 			return $this;
 		}
 		$whereb = '';
 		$stringb = array();
 		$b = is_array($b) ? $b : 1;
 		foreach ($b as $k => $v){
 			$cb = $k.' = "'.$v.'"';
 			$stringb[$k] =  $cb ;
 		}
 		$whereb = implode(' AND ',$stringb);
 		$this->sql = "$this->sql WHERE $whereb" ;
 		return $this;
 	}

 	function like($b,$type = 1){
 		if(!count($b) || empty($b)){
 			return $this;
 		}
 		$whereb = '';
 		$stringb = array();
 		$b = is_array($b) ? $b : 1;
 		
 		switch ($type) {
 			case '1':
 				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "'.$v.'%"';
		 			$stringb[$k] =  $cb ;
		 		}
 				break;
			case '2':
				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "%'.$v.'"';
		 			$stringb[$k] =  $cb ;
	 			}
			break;
 			default:
 				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "%'.$v.'%"';
		 			$stringb[$k] =  $cb ;
	 			}
 				break;
 		}
 		$whereb = implode(' AND ',$stringb);
 		$this->sql = "$this->sql AND $whereb" ;
 		return $this;

 	}

 	 function likeb($b,$type = 1){
 		if(!count($b) || empty($b)){
 			return $this;
 		}
 		$whereb = '';
 		$stringb = array();
 		$b = is_array($b) ? $b : 1;
 		
 		switch ($type) {
 			case '1':
 				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "'.$v.'%"';
		 			$stringb[$k] =  $cb ;
		 		}
 				break;
			case '2':
				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "%'.$v.'"';
		 			$stringb[$k] =  $cb ;
	 			}
			break;
 			default:
 				foreach ($b as $k => $v){
		 			$cb = $k.' LIKE "%'.$v.'%"';
		 			$stringb[$k] =  $cb ;
	 			}
 				break;
 		}
 		$whereb = implode(' AND ',$stringb);
 		$this->sql = "$this->sql AND binary $whereb" ;
 		return $this;

 	}

 	function get($table)
 	{
 		$this->sql = 'SELECT * FROM '.$table;
 		return $this;
 	}

 	//关联查询A,B,C
 	function relation($relation)
 	{

 		$this->sql = "$this->sql AND $relation" ;
 		return $this;
 	}

 	function select()
 	{
 		$data = $this->getAll($this->sql);
 		return $data ;
 	}

 	function sql()
 	{
 		return $this->sql;
 	}

 	function Jquery($sql)
 	{
 		$rs = $this->getRs($sql);
 	}
 }