<?php

namespace JeanForteroche;

class PostManagerPDO extends ManagerPDO
{
	/*Number of posts per page*/
	const NB_POSTS = 4;

	/*Display post on the front page*/
	public function getPosts($numPage=1)
	{   
        $starting_post = ($numPage - 1) * self::NB_POSTS;
        
	    $db = $this->call_db();

		$entry_db = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_creation, \'%d/%m/%Y\') 
            AS date_creation FROM posts ORDER BY id DESC LIMIT :post,:length');

		$entry_db->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'JeanForteroche\Post');

		$entry_db->bindValue('post', $starting_post, \PDO::PARAM_INT);
		$entry_db->bindValue('length', self::NB_POSTS, \PDO::PARAM_INT);
		$entry_db->execute();
		

		$listPosts = $entry_db->fetchAll();

		$entry_db->closeCursor();

		return $listPosts;
	}

	/*Display selected post*/
	public function getPost($id_post)
	{
		$db = $this->call_db();

		$db1 = $db->prepare('SELECT id, title, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, content FROM posts WHERE id = ?');

		$db1->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'JeanForteroche\Post');

		$db1->execute(array($id_post));
		$db2 = $db1->fetchAll();

		$db1->closeCursor();

			return $db2;
	}

	public function getNumPosts()
	{
		$db = $this->call_db();
		
		$entry_db = $db->query("SELECT COUNT(*) AS date_creation FROM posts");

		$nbPosts = $entry_db->fetchColumn();

		$entry_db->closeCursor();

			return $nbPosts;
	}
}