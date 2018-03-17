<?php

namespace POO\model;

class Manager
{
	/*db connexion*/

	protected function call_db()
	{
		$db = new \PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '');
	
		return $db;
	}
}