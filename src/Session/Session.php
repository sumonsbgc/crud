<?php 
namespace App\Session;

class Session
{
	public static $init = FALSE;

	public static function init_session()
	{
		if ($init == FALSE){
			session_start();
		}
	}


	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if (isset($key)){
			return $_SESSION[$key];
		}
	}
}