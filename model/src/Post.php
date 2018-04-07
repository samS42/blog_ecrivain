<?php

namespace JeanForteroche;

class Post
{

	private $_id;
	private $_title;
	private $_content;
	private $_date_creation;

	public function getId()
	{
		return $this->_id;
	}

	public function getTitle()
	{
		return $this->_title;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}

	public function getContent()
	{
		return $this->_content;
	}

	public function setContent($content)
	{
		$this->_content = $content;
	}

	public function getDateCreation()
	{
		return $this->_date_creation;
	}

	public function setDateCreation($date_creation)
	{
		$this->_date_creation = $date_creation;
	}

}