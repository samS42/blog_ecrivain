<?php

namespace POO\model;

require_once('model/Manager.php');

class Adminmanager extends Manager
{
	public function check_password($pseudo, $pass_form)
	{
		$db = $this->call_db();

		$req = $db->prepare('SELECT password FROM identification WHERE pseudo=:pseudo');
		$req->execute(array('pseudo' => $pseudo));
		$hashed_password = $req->fetch();
		
		return $hashed_password;
	}

	public function getTitles()
	{
		$db = $this->call_db();
		$req = $db->query('SELECT * FROM posts ORDER BY date_creation DESC');
		
			return $req;
	}

	public function adminGetPost($id_post)
	{
		$db = $this->call_db();

		$req = $db->prepare('SELECT id, title, date_creation, content FROM posts WHERE id = ?');
		$req->execute(array($id_post));
		$display = $req->fetch();

			return $display;
	}

	public function delete_comment($idComment)
	{
		
	}
}