<?php

namespace Acme;

class AdminManagerPDO extends Manager
{
	/*Admin's page connexion*/
	public function check_password($pseudo, $pass_form)
	{
		$db = $this->call_db();

		$req = $db->prepare('SELECT password FROM identification WHERE pseudo=:pseudo');
		$req->execute(array('pseudo' => $pseudo));
		$hashed_password = $req->fetch();
		
			return $hashed_password;
	}

	/*Display admin's page*/
	public function getTitles()
	{
		$db = $this->call_db();

		$req = $db->query('SELECT * FROM posts ORDER BY id DESC');

		$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Post');

		$titles = $req->fetchAll();

		$req->closeCursor();
		
			return $titles;
	}

	public function adminGetPost($id_post)
	{
		$db = $this->call_db();

		$req = $db->prepare('SELECT id, title, DATE_FORMAT(date_creation, \'%d/%m/%Y\') AS date_creation, content FROM posts WHERE id = ?');

		$req->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Post');

		$req->execute(array($id_post));

		$post = $req->fetchAll();

		$req->closeCursor();

			return $post;
	}

		public function adminGetComments($id_post)
	{
		$db = $this->call_db();

		$displayComment = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');

		$displayComment->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$displayComment->execute(array($id_post));

		$comments = $displayComment->fetchAll();
	
			return $comments;
	}

	public function adminDeletePost($id_post)
	{
		$db = $this->call_db();

		$deletePost = $db->prepare('DELETE FROM posts WHERE id=:id');

		$deletePost->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$deletePost->execute(array('id' => $id_post));

			return $deletePost;
	}

	/*Delete comments from deleted post*/
	public function adminDeleteComments($id_post)
	{
		$db = $this->call_db();

		$deleteComments = $db->prepare('DELETE FROM comments WHERE post_id=:id_post');

		$deleteComments->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$deleteComments->execute(array('id_post' => $id_post));

			return $deleteComments;
	}

	/*Delete signaled comment*/
	public function adminDeleteComment($id_comment)
	{
		$db = $this->call_db();

		$deleteComment = $db->prepare('DELETE FROM comments WHERE id=:id');

		$deleteComment->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$deleteComment->execute(array('id' => $id_comment));

			return $deleteComment;
	}

	public function adminAddPost($title, $content)
	{
		$db = $this->call_db();

		$addPost = $db->prepare('INSERT INTO posts(title, content, date_creation) VALUES (?, ?, NOW())');

		$addPost->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Post');

		$addPost->execute(array($title, $content));

			return $addPost;
	}

	public function adminUpdatePost($id_post, $title, $content)
	{
		$db = $this->call_db();

		$updatePost = $db->prepare('UPDATE posts SET title= :title, content= :content WHERE id=:id');

		$updatePost->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Post');

		$updatePost->execute(array('title' => $title, 'content' => $content, 'id' => $id_post,));

			return $updatePost;
	}

	/*Display signaled comment in the db*/
	public function adminSignalcomment($id_comment)
	{
		$db = $this->call_db();

		$signalComment = $db->prepare('UPDATE comments SET signalComment= :sc WHERE id=:id');

		$signalComment->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$signalComment->execute(array('sc' => 'YES', 'id' => $id_comment));

		$comments = $signalComment->fetchAll();

			return $comments;
	}

	public function adminDisplaySignalComment()
	{
		$db = $this->call_db();

		$displaySignalComment = $db->query('SELECT * FROM comments WHERE signalComment = \'YES\'');

		$displaySignalComment->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$comment = $displaySignalComment->fetchAll();
		
			return $comment;
	}

	public function adminDeleteSignalcomment($id_comment)
	{
		$db = $this->call_db();

		$signalComment = $db->prepare('UPDATE comments SET signalComment= :sc WHERE id=:id');

		$signalComment->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Acme\Comment');

		$signalComment->execute(array('sc' => '', 'id' => $id_comment));

		$sComment = $signalComment->fetchAll();

			return $sComment;
	}
}