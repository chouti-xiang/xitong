<?php 
class from
{
	function __construct()
	{
		
	}
	
	/**
	 * ACTIVE：表格渲染
	 * @param  $array  配置文档数据
	 * */
	function table($array)
	{
		if ($array['is_list']) {
			if(is_string($array['value']))
			{
				$array['value1']  = unserialize($array['value']);
				$array['value'] = is_array($array['value1']) ? implode(',',$array['value1']) : $array['value'];
			}
			return "<td>{$array['value']}</td>";
		}
	}
	
	/**
	 * ACTIVE:表单路由
	 * @param  $array  配置文档数据
	 * */
	function form($array)
	{
		if($array['is_table']){
			$widget = $array['widget'] ? $array['widget'] :'input' ;
			return "<li><label>{$array['title']}</label>".$this->$widget($array)."</li>";
		}
		
	}
	
	/**
	 * ACTVIE:单选框数据
	 * @param  $array  配置文档数据
	 * */
	function radio($array)
	{
		$data ='';
		foreach ($array['dict'] as $key =>$value){
		$checked = $value == $array['data'] ? 'checked' : '';
		$data .= "<input class='radio' type='radio' name='{$array['key']}' $checked value='$value' />$value";
		}
		return $data;
	}
	
	/**
	 * ACTVIE:下拉框数据
	 * @param  $array  配置文档数据
	 * */
	function select($array)
	{
		$data = "<select name='{$array['key']}'>";
		foreach ($array['dict'] as $key =>$value){
			$selected = $value == $array['data'] ? 'selected' : '';
			$data .= "<option $selected value='$value' >$value</option>";
		}
		return $data."</select>";
	}
	
	/**
	 * ACTVIE:复选框数据
	 * @param  $array  配置文档数据
	 * */
	function checkbox($array)
	{
		$number = unserialize($array['data']);
		foreach ($array['dict'] as $key =>$value){
			$checked = in_array($value,$number) ? 'checked' : '';
			$nameStr = $array['key']."[{$key}]";
			$data .= "<input type='checkbox' name='$nameStr' value='$value' $checked />$value";
		}
		return $data;
		
	}
	
	/**
	 * ACTVIE:txt选框数据
	 * @param  $array  配置文档数据
	 * */
	function input($array)
	{
		$data = "<input type='' name='{$array['key']}' value='{$array['data']}' /></li>";
		return $data;
	}
	
	/**
	 * ACTIVE:图片数据
	 * @param  $array 配置文档数据
	 * */
	function img($array)
	{
		$data = "<input type='text' name='{$array['key']}'value='{$array['data']}' /><input type='file' name='file' id='file' /><a class='tumb' href='javascript:;'>上传</a>";
		return $data;
	}

}