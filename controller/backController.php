<?php

require_once('model/Adminmanager.php');

function connexionAdmin($pseudo, $pass_form)
{
	session_start();
	$adminManager = new \POO\model\Adminmanager();

	$hashed_password = $adminManager->check_password($pseudo, $pass_form);

		if (password_verify($pass_form, $hashed_password['password']))
		{
			$_SESSION['pseudo'] = $pseudo;

			listTitles();
		}
		else
		{
			throw new Exception('Impossible de se connecter');	
		}
}

function listTitles()
{
	$adminManager = new \POO\model\Adminmanager();
	$req = $adminManager->getTitles();

	require('view/backend/adminView.php');
}

function displayPost($id_post)
{
	$adminManager = new \POO\model\Adminmanager();
	$display = $adminManager->adminGetPost($id_post);

	require('view/backend/adminViewPost.php');
}