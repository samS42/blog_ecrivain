<?php

namespace POO\model;

require_once('model/Manager.php');

class PostManager extends Manager
{
	const NB_POSTS = 2;

	/*Display post on the front page*/

	public function getPosts($numPage=0)
	{
		$db = $this->call_db();
		$entry_db = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation FROM posts ORDER BY date_creation DESC LIMIT ?,?');
		$entry_db->execute(array($numPage, self::NB_POSTS));

			return $entry_db;
	}

	/*Display selected post*/

	public function getPost($id_post)
	{
		$db = $this->call_db();

		$db1 = $db->prepare('SELECT id, title, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, content FROM posts WHERE id = ?');
		$db1->execute(array($id_post));
		$db2 = $db1->fetch();

			return $db2;
	}

	public function getNumPosts()
	{
		$db = $this->call_db();
		$entry_db = $db->query("SELECT COUNT(*) AS date_creation FROM posts");
		$nbPosts = $entry_db->fetchColumn();

		return $nbPosts;
	}
}