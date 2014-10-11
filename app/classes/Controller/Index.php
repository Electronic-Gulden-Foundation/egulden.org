<?php

class Controller_Index extends Controller_Base {

	public function indexAction()
	{
		$this->_template->content = new View('index/index');
	}

}
