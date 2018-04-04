<?php

require('model/vendor/autoload.php');

use Acme\AdminManagerPDO;
use Acme\PostManagerPDO;

function connexionAdmin($pseudo, $pass_form)
{
	$adminManager = new AdminManager();

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
	$adminManager = new AdminManagerPDO();
	$titles = $adminManager->getTitles();

	require('view/backend/adminViewPDO.php');
}

function displayPost($id_post)
{
	$adminManager = new AdminManagerPDO();
	$post = $adminManager->adminGetPost($id_post);
	$comments = $adminManager->adminGetComments($id_post);

	require('view/backend/adminViewPostPDO.php');
}

/*Delete post and the corresponding comments*/
function deletePost($id_post)
{
	$adminManager = new AdminManagerPDO();
	$deletePost = $adminManager->adminDeletePost($id_post);
	$deleteComments = $adminManager->adminDeleteComments($id_post);

	listTitles();

	header('Location: /index.php?action=displayTitles');
}

/*Delete signaled comment*/
function deleteComment($id_comment, $id_post)
{
	$adminManager = new AdminManagerPDO();
	$deleteComment = $adminManager->adminDeleteComment($id_comment);

	header('Location: /index.php?action=adminPost&id=' . $id_post);
}

function addPost($title, $content)
{
	$adminManager = new AdminManagerPDO();
	$addPost = $adminManager->adminAddPost($title, $content);

	header('Location: index.php?action=displayTitles');
}

function displayUpdatePost($id_post)
{
	$postManager = new PostManagerPDO();
	$db2 = $postManager->getPost($id_post);

	require('view/backend/adminUpdatePostPDO.php');
}

function updatePost($id_post, $title, $content)
{
	$adminManager = new AdminManagerPDO();
	$updatePost = $adminManager->adminUpdatePost($id_post, $title, $content);

	header('Location: index.php?action=adminPost&id=' . $id_post);
}

function signalComment($id_comment, $id_post)
{
	$adminManager = new AdminManagerPDO();
	$comment = $adminManager->adminSignalComment($id_comment);

	header('Location: index.php?action=post&id=' . $id_post);
}

function displayAddPost()
{
	require('view/backend/adminAddPost.php');
}

function displaySignalComment()
{
	$adminManager = new AdminManagerPDO();
	$comment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertCommentPDO.php');
}

function deleteSignalcomment($id_comment)
{
	$adminManager = new AdminManagerPDO();
	$sComment = $adminManager->adminDeleteSignalcomment($id_comment);
	$comment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertCommentPDO.php');
}

function deleteCommentSignaled($id_comment, $id_post)
{
	$adminManager = new AdminManagerPDO();
	$deleteComment = $adminManager->adminDeleteComment($id_comment);
	$comment = $adminManager->adminDisplaySignalComment();

	require('view/backend/adminAlertCommentPDO.php');
}