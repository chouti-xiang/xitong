<?php 

class object{
	 
	function __construct()
	{
	}
	
	
	function getRow($sql)
	{
		return db()->getRow($sql);
	}
	
	function getAll($sql)
	{
		return db()->getAll($sql);
	}
	
	function insert($sql)
	{
		return db()->insert($sql);
	}
	
	function del($sql)
	{
		return db()->del($sql);
	}
	
	function updata($sql)
	{
		return db()->updata($sql);
	}
	

}

