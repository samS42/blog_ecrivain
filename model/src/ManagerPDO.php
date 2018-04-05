<?php

namespace JeanForteroche;

class ManagerPDO
{
	/*db connexion*/
	protected function call_db()
	{
		/*Data base connection in local*/
		/*$db = new \PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '');*/
	
		$db = new \PDO('mysql:host=db729884925.db.1and1.com;dbname=db729884925;charset=utf8', 'dbo729884925', 'Mayonnaise_1_2');

			return $db;
	}
}