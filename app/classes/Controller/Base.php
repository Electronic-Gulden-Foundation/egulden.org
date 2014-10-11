<?php

abstract class Controller_Base {

	protected $_dispatcher = NULL;

	protected $_router = NULL;

	protected $_template = 'templates/index';

	public function after()
	{
		echo $this->_template->render();
	}

	public function before()
	{
		// Initialize the template
		if(is_string($this->_template))
		{
			$this->_template = new View($this->_template);
		}
	}

	public function setDispatcher(Dispatcher $dispatcher)
	{
		$this->_dispatcher = $dispatcher;
	}

	public function setRouter(Router $router)
	{
		$this->_router = $router;
	}
}
