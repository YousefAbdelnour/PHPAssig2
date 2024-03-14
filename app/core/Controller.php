<?php

namespace app\core;

class Controller
{
	function view($name, $data = null)
	{
		if (is_array($data) && !array_is_list($data)) {
			extract($data);
		}
		include('app/views/' . $name . '.php');
	}
}
