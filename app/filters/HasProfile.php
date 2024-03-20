<?php

namespace app\filters;

#[\Attribute]
class HasProfile implements \app\core\AccessFilter
{

	public function redirected()
	{
		if (!isset($_SESSION['profile_id'])) {
			header('location:/Profile/create');
			return true;
		}
		return false;
	}
}
