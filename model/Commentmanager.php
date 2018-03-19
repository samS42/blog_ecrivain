<?php

namespace POO\model;

require_once('model/Manager.php');

class CommentManager extends Manager
{
	/*Display comments from the selected post*/

	public function getComments($id_post)
	{
	$db = $this->call_db();

	$db1 = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	$db1->execute(array($id_post));
	
		return $db1;
	}

	/*add comment*/

	public function comment($id_post, $pseudo, $comment)
	{
		$db = $this->call_db();
	
		$dbcomm = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, signalComment) VALUES (?,?,?, NOW(),\'\')');
		$recComm = $dbcomm->execute(array($id_post, $pseudo, $comment));

			return $recComm;
	}
}