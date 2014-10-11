<?php

/**
 * This router is very simple, it just parses the input url in one way
 * /<controller>/<action>/<param1>/.../<paramN>
 *
 * @author  Dennis Ruhe
 */
class Router {

	/**
	 * The controller name
	 */
	protected $_controller_name = 'index';

	/**
	 * The action name
	 */
	protected $_action_name = 'index';

	/**
	 * Contains the parameters
	 */
	protected $_params = array();

	/**
	 * Intitializes a new router
	 *
	 * @param  String  Default controller name
	 * @param  String  Default action name
	 * @param  Array   Default parameter array
	 */
	public function __construct($default_controller = 'index', $default_action = 'index', array $default_params = array())
	{
		$this->_controller_name = $default_controller;
		$this->_action_name     = $default_action;
		$this->_params          = $default_params;
	}

	/**
	 * Parse given route into controller, action and parameters
	 *
	 * @param  String  String containing the route
	 */
	public function parse($route)
	{
		// Explode the route by '/' and filter it
		$route = explode('/', $route);
		$route = array_filter($route);

		// Controller is the first param, action second, other data is in the params array
		$this->_controller_name = isset($route[0]) ? $route[0] : 'index';
		$this->_action_name     = isset($route[1]) ? $route[1] : 'index';
		$this->_params          = array_slice($route, 3);
	}

	/**
	 * Get the controller name
	 *
	 * @return  String  Controller name
	 */
	public function getControllerName()
	{
		return ucfirst($this->_controller_name);
	}

	/**
	 * Get the action name
	 *
	 * @return  String  Action name
	 */
	public function getActionName()
	{
		return $this->_action_name;
	}

	/**
	 * Get the parameter for given key, or supply no parameters to
	 * get the entire array
	 *
	 * @param  Mixed  Key to search for
	 * @param  Mixed  Default value to return if key does not exist
	 *
	 * @return Mixed  Entire param array when no key given
	 *                Otherwise default value
	 */
	public function getParams($key = NULL, $default = NULL)
	{
		if($key !== NULL)
		{
			// Check if key exists and return the value
			// Otherwise return the default value
			return isset($this->_params[$key])
				? $this->_params[$key]
				: $default;
		}

		return $this->_params;
	}
}
