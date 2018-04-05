<?php

namespace JeanForteroche;

class CommentManagerPDO extends ManagerPDO
{

	/*Display comments from the selected post*/
	public function getComments($id_post)
	{
		$db = $this->call_db();

		$db1 = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

		$db1->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'JeanForteroche\Comment');

		$db1->execute(array($id_post));

		$listComments = $db1->fetchAll();

		$db1->closeCursor();
	
			return $listComments;
	}

	/*add comment*/
	public function comment($id_post, $pseudo, $comment)
	{
		$db = $this->call_db();
	
		$dbComm = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, signalComment) VALUES (?,?,?, NOW(),\'\')');

		$dbComm->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'JeanForteroche\Comment');

		$dbComm->execute(array($id_post, $pseudo, $comment));

		$dbComm->closeCursor();

			return $dbComm;
	}
}