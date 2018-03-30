<?php

namespace POO\model;

class Manager
{
	/*db connexion*/

	protected function call_db()
	{
		/*$db = new \PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '');*/
	
		$db = new \PDO('mysql:host=db729884925.db.1and1.com;dbname=db729884925;charset=utf8', 'dbo729884925', 'Mayonnaise_1_2');
		return $db;
	}
}