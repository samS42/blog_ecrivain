<?php

class Manager
{
	protected function call_db()
{
		$db = new PDO('mysql:host=localhost;dbname=miniuchat;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
		return $db;
}
}