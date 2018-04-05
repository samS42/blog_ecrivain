<?php

namespace JeanForteroche;

class Comment
{

	private $id;
	private $post_id;
	private $author;
	private $comment;
	private $comment_date;
	private $signalComment;

	public function getId()
	{
		return $this->id;
	}

	public function getPostId()
	{
		return $this->post_id;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getComment()
	{
		return $this->comment;
	}

	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	public function getCommentDate()
	{
		return $this->comment_date;
	}

	public function getSignalComment()
	{
		return $this->signalComment;
	}

	public function setSignalComment($signalComment)
	{
		$this->signalComment = $signalComment;
	}

}