<?php

abstract class Controller_Base {

	protected $dispatcher = NULL;

	protected $router = NULL;

	public function after()
	{

	}

	public function before()
	{

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
