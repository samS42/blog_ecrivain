<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function connexionAdmin($pseudo, $pass_form)
{
	$adminManager = new \POO\model\AdminManager();

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

/*Display frontpage admin*/

function listTitles()
{
	$adminManager = new \POO\model\AdminManager();
	$req = $adminManager->getTitles();

	require('view/backend/adminView.php');
}

function displayPost($id_post)
{
	$adminManager = new \POO\model\AdminManager();
	$display = $adminManager->adminGetPost($id_post);
	$displayComments = $adminManager->adminGetComments($id_post);

	require('view/backend/adminViewPost.php');
}

/*Delete post and the corresponding comments*/

function deletePost($id_post)
{
	$adminManager = new \POO\model\AdminManager();
	$deletePost = $adminManager->adminDeletePost($id_post);
	$deleteComments = $adminManager->adminDeleteComments($id_post);

	listTitles();

	header('Location: /index.php?action=displayTitles');
}

/*Delete signaled comment*/

function deleteComment($id_comment, $id_post)
{
	$adminManager = new \POO\model\AdminManager();
	$deleteComment = $adminManager->adminDeleteComment($id_comment);

	header('Location: /index.php?action=adminPost&id=' . $id_post);
}

function addPost($title, $content)
{
	$adminManager = new \POO\model\AdminManager();
	$addPost = $adminManager->adminAddPost($title, $content);

	header('Location: index.php?action=displayTitles');
}

function displayUpdatePost($id_post)
{
	$postManager = new \POO\model\PostManager();
	$db2 = $postManager->getPost($id_post);

	require('view/backend/adminUpdatePost.php');
}

function updatePost($id_post, $title, $content)
{
	$adminManager = new \POO\model\AdminManager();
	$updatePost = $adminManager->adminUpdatePost($id_post, $title, $content);

	header('Location: index.php?action=adminPost&id=' . $id_post);
}

function signalComment($id_comment, $id_post)
{
	$adminManager = new \POO\model\AdminManager();
	$signalComment = $adminManager->adminSignalComment($id_comment);

	header('Location: index.php?action=post&id=' . $id_post);

}

function displayAddPost()
{
	require('view/backend/adminAddPost.php');
}

function displaySignalComment()
{
	$adminManager = new \POO\model\AdminManager();
	$displaySignalComment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertComment.php');
}

function deleteSignalcomment($id_comment)
{
	$adminManager = new \POO\model\AdminManager();
	$deleteSignalcomment = $adminManager->adminDeleteSignalcomment($id_comment);
	$displaySignalComment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertComment.php');
}

function deleteCommentSignaled($id_comment, $id_post)
{
	$adminManager = new \POO\model\AdminManager();
	$deleteComment = $adminManager->adminDeleteComment($id_comment);
	$displaySignalComment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertComment.php');
}