<?php

class View {

	public static $viewdir;

	private $_filename;

	private $_params = array();

	public function __construct($filename)
	{
		$this->_filename = $filename;
	}

	public function __set($key, $value)
	{
		$this->_params[$key] = $value;
	}

	public function render()
	{
		$file = View::$viewdir.'/'.$this->_filename.'.phtml';

		if ( ! file_exists($file))
			throw new Exception('View '.$file.' does not exist');

		extract($this->_params, EXTR_SKIP);

		// Render the actual view
		ob_start();
		include $file;
		$result = ob_get_clean();

		return $result;
	}

}
