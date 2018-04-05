<?php

namespace JeanForteroche;

class Identification
{
	private $id;
	private $pseudo;
	private $password;

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getPassword()
	{
		return $this->password;
	}
}