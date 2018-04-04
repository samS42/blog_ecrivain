<?php

namespace Acme;

class Post
{

	private $id;
	private $title;
	private $content;
	private $date_creation;

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function getDateCreation()
	{
		return $this->date_creation;
	}

	public function setDateCreation($date_creation)
	{
		$this->date_creation = $date_creation;
	}

}