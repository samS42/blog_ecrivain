<?php

namespace POO\model;

require_once('model/Manager.php');

class Adminmanager extends Manager
{
	function check_password($pseudo, $pass_form)
	{
		$db = $this->call_db();

		$req = $db->prepare('SELECT password FROM identification WHERE pseudo=:pseudo');
		$req->execute(array('pseudo' => $pseudo));
		$hashed_password = $req->fetch();
		
		return $hashed_password;
	}
}