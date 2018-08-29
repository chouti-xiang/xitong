<?php
class Song{
	public static $reg;
	public static $html;
	private $url_reg = '/^(http|https|ftp)\:\/\/.*?[.].*?$/';	//url正则
	private $url;

	public function __construct($reg = array(),$url = ''){
		//默认配置
		$default = array(
			'page'	=>	array(
				'mark'		=>	'[@page]',
				'reg'		=>  ''
				),
			'url'	=>	array(
				'mark'		=>	'[@url]',
				'reg'		=>  ''
				),
			'stmp'			=>  1,				//默认步调
			'default_mark'	=>	'[@mark]',		//默认正则标签
			'other_mark'    =>  '[@other]' 		//忽略内容标签
		);
		self::$reg = array_merge($default, $reg);
		
		if ($url) {
			$this -> setUrl($url);
		}
	}

	public function setReg($reg){
		self::$reg = array_merge($default, $reg);
	}
	
	//设置页面
	public function setUrl($url){
		//url正确性
		if (!preg_match($this ->url_reg, $url)){
			echo ' url is wrong. ';
			return false;
		}
		
		$this -> url = $url;
		self::$html = $this -> getHtml($url);
	}

	//获取页面指定标签内容，默认本页面
	public function get($flag = null,$html = null){

		//页面赋值
		if (!$html){
			if (!self::$html){
				$this -> setUrl($this -> url);
			}
			$html = self::$html;
		}

		//取值
		$mon = self::$reg;
		if (isset($mon[$flag]) && $flag != 'page'){
			if (!isset($mon[$flag]['mark'])){
				$mon[$flag]['mark'] = $mon['default_mark'];
			}

			//url返回值为数组
			if ($flag{0} == '_'){
				//替换忽略内容标签	
				$mreg = str_replace($mon['other_mark'], '.*?', $mon[$flag]['reg']);
				
				$mreg = str_replace(array('/','(',')'), array('\/','\(','\)'), $mreg);
				$mreg = '/' . str_replace($mon[$flag]['mark'], '(.*?)', $mreg) . '/';
				@preg_match_all($mreg,$html,$url);
				return $url[1];
			}

			//拆分正则
			$mreg = explode($mon[$flag]['mark'], $mon[$flag]['reg']);
			return $this -> str_substr($mreg[0],$mreg[1],$html);
		}else{
			return $html;
		}

	}

	//获取页面代码
	public function getHtml($url){
		//url正确性
		if (!preg_match($this ->url_reg, $url)){
			echo ' url is wrong. ';
			return false;
		}
		
		//获取页面内容
		$html =  @file_get_contents($url);
		if (!$html){
			echo ' no html. ';
			return false;
		}

		//确定字符集
		$encode = mb_detect_encoding($html , array('ASCII', 'GB2312', 'GBK', 'UTF-8'));
		if ($encode == false){
			#done
			echo ' code not inside. ';
			return false;
		}

		//转码
		if ($encode != 'UTF-8'){
			$html = iconv($encode, 'UTF-8', $html);
		}

		return $this ->html_format($html);
	}

	//获取全部链接
	public function getAllList($page = 1, $num = 10, $flag = null){
		$list = false;
		//参数验证
		if (is_numeric($page) && is_numeric($num) && $page < $page + $num){	
			$mon = self::$reg;
			$list = array();
			for ($i = $page;$i < $page + ($mon['stmp'] * $num);$i += $mon['stmp']){
				//拼装url
				$url = str_replace($mon['page']['mark'], $i, $mon['page']['reg']);
				
				//html赋值
				$html = $this->getHtml($url);
				if ($flag){
					$html = $this -> get($flag, $html);
				}
				
				$tmp = $this -> get('url', $html);
				$list = array_merge($list, $tmp);
			}
		}
		return $list;
	}
	
	//获取链接列表
	public function getList($html = null){
		$mon = self::$reg;
		//url正则确认
		if (!isset($mon['url']['reg'])){
			echo ' url reg no set. ';
			return false;
		}
		
		//html赋值
		if (!$html){
			if (!self::$html){
				$this -> setUrl($this -> url);
			}
			$html = self::$html;
		}
		
		return $this -> get('url', $html);
	}

	//批量获取指定页面，标签内容
	public function getAttr($list , $attr , $flag = null){
		$data = false;
		if (is_array($attr) && is_array($attr)){
			//循环列表
			foreach ($list as $url){
				$html = $this ->getHtml($url);
				
				//二次锁定
				if ($flag){
					$html = $this -> get($flag, $html);
				}
				
				//获取内容
				$tmp = null;
				foreach ($attr as $a){
					$tmp[$a] = $this ->get($a, $html);
				}
				
				$data[] = $tmp;			
			}
		}
		return $data;
	}
	
	// 字符串截取函数
	public function str_substr($start, $end, $str)
	{
		$temp = explode($start, $str, 2);
		//正则错误判断
		if (count($temp) !=  2){
			echo ' Reg is wrong: '.$start.'[@mark]'.$end;
			return false;
		}
		$content = explode($end, $temp[1], 2);
		return $content[0];
	}

	// 正则截取函数
	public function preg_substr($start, $end, $str)
	{
		$temp = @preg_split($start, $str);
		//正则错误判断
		if (count($temp) !=  2){
			echo ' Reg is wrong: ' . $start . '[@mark]' . $end;
			return false;
		}
		$content = @preg_split($end, $temp[1]);
		return $content[0];
	}

	//去标签
	public function html_format($html){
		$tag = array('<','"','|');
		return str_replace($tag, '', $html);
	}

	//预览
	public function for_mark($flag = null){
		header('Content-type: text/html; charset=utf-8');
		echo '<pre>' . $this -> get($flag) . '</pre>';
	}
}