<?php

require_once('model/Postmanager.php');
require_once('model/Commentmanager.php');
require_once('model/Adminmanager.php');

function listPosts()
{
	$postManager = new \POO\model\Postmanager();
	$entry_db = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new \POO\model\Postmanager();
	$commentManager = new \POO\model\Commentmanager();

	$getid = $_GET['id'];

	$db2 = $postManager->getPost($getid);
	$db1 = $commentManager->getComments($getid);

	require('view/frontend/post_view.php');
}

function addComment($id_post, $pseudo, $comment)
{
	$commentManager = new \POO\model\Commentmanager();

	$recComm = $commentManager->comment($id_post, $pseudo, $comment);

	if($recComm === false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $_GET['id']);
	}
}

function modifComment($id_comment, $idPost, $pseudo1, $comment1)
{
	$commentManager = new \POO\model\Commentmanager();

	$modifyCom = $commentManager->modifyComment($id_comment, $idPost, $pseudo1, $comment1);

	if($modifyCom == false)
	{
		throw new Exception('Impossible de modifier le commentaire');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $idPost);
	}
}