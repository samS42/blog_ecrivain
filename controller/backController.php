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
	$displayComments = $adminManager->adminGetComments($id_post);

	require('view/backend/adminViewPost.php');
}

function deletePost($id_post)
{
	$adminManager = new \POO\model\Adminmanager();
	$deletePost = $adminManager->adminDeletePost($id_post);
	$deleteComments = $adminManager->adminDeleteComments($id_post);

	listTitles();

	header('Location: /tests/blog_mvc/tests/POO/index.php?action=displayTitles');
}

function deleteComment($id_comment, $id_post)
{
	$adminManager = new \POO\model\Adminmanager();
	$deleteComment = $adminManager->adminDeleteComment($id_comment);

	header('Location: /tests/blog_mvc/tests/POO/index.php?action=adminPost&id=' . $id_post);
}