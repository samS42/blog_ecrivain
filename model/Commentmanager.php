<?php

require_once('model/Manager.php');

class Commentmanager extends Manager
{

public function getComments($id_post)
{
	$db = $this->call_db();

	$db1 = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
	$db1->execute(array($id_post));
	

		return $db1;
}

public function comment($id_post, $pseudo, $comment)
{
	$db = $this->call_db();
	$dbcomm = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (?,?,?, NOW())');
	$recComm = $dbcomm->execute(array($id_post, $pseudo, $comment));

		return $recComm;
}

public function modifyComment($id_comment, $idPost, $pseudo1, $comment1)
{
	$db = $this->call_db();
	$dbModifyComment = $db->prepare('UPDATE comments SET author=:author, comment=:comment WHERE id=:id');
	$modifyCom = $dbModifyComment->execute(array('author'=>$pseudo1, 'comment'=>$comment1, 'id'=>$id_comment));

		return $modifyCom;
}
}