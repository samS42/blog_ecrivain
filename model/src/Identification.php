<?php

namespace JeanForteroche;

class Identification
{
	private $_id;
	private $_pseudo;
	private $_password;

	public function getPseudo()
	{
		return $this->_pseudo;
	}

	public function getPassword()
	{
		return $this->_password;
	}
}