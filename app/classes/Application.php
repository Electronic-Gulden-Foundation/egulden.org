<?php

class Application {

	public function handle()
	{
		$router = new Router();
		$router->parse($_GET['_url']);

		$dispatcher = new Dispatcher($router);

		View::$viewdir = APPPATH.'/views';

		return $dispatcher->dispatch();
	}

}
