<?php

class Db {

	private  $_db;

	public function __construct(){
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=my_meetic;unix_socket=/home/anton_m/.mysql/mysql.sock','root', '');
			$this->_db=$bdd;
		}


		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}

	function getDb(){
		return $this->_db;
	}
	
}
?>