<?php

class Application {

	public function handle()
	{
		$router = new Router();
		$router->parse($_GET['_url']);

		$dispatcher = new Dispatcher($router);

		return $dispatcher->dispatch();
	}

}
