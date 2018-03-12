<?php

namespace POO\model;

class Manager
{
	protected function call_db()
{
		$db = new \PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '');
	
		return $db;
}
}