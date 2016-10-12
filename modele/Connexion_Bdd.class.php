<?php

/**
*  class coonnexion db en singleton
*/

class Connexion
{

	private static $_instance;


	private function __construct()
	{
		require_once 'Config.php';
		self::$_instance = new PDO($dsn, $db_user, $db_pass);
	}

	public static function getInstance(){
		if(is_null(self::$_instance)){
			new Connexion();
		}
		return self::$_instance;
	}

}

 ?>