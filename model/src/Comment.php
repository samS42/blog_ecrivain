<?php

namespace JeanForteroche;

class Comment
{

	private $_id;
	private $_post_id;
	private $_author;
	private $_comment;
	private $_comment_date;
	private $_signalComment;

	public function getId()
	{
		return $this->_id;
	}

	public function getPostId()
	{
		return $this->_post_id;
	}

	public function getAuthor()
	{
		return $this->_author;
	}

	public function getComment()
	{
		return $this->_comment;
	}

	public function setComment($comment)
	{
		$this->_comment = $comment;
	}

	public function getCommentDate()
	{
		return $this->_comment_date;
	}

	public function getSignalComment()
	{
		return $this->_signalComment;
	}

	public function setSignalComment($signalComment)
	{
		$this->_signalComment = $signalComment;
	}

}