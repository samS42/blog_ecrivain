<?php

namespace POO\model;

require_once('model/Manager.php');

class Postmanager extends Manager
{
	/*Display post on the front page*/
	public function getPosts()
	{
		$db = $this->call_db();
		$entry_db = $db->query('SELECT * FROM posts ORDER BY date_creation DESC LIMIT 0,4');
		
			return $entry_db;
	}

	/*Display selected post*/

	public function getPost($id_post)
	{
		$db = $this->call_db();

		$db1 = $db->prepare('SELECT id, title, date_creation, content FROM posts WHERE id = ?');
		$db1->execute(array($id_post));
		$db2 = $db1->fetch();

			return $db2;
	}
}