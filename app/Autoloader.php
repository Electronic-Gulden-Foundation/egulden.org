<?php

class Autoloader {

	private $_base_dir;

	public function __construct($base_dir)
	{
		$this->_base_dir = $base_dir;
	}

	public function load($class)
	{
		$class = str_replace('_', '/', $class);
		$path  = $this->_base_dir.'/'.$class.'.php';

		if(file_exists($path))
			include $path;
		else
			throw new Exception('Class '.$class.' not found');
	}

}
