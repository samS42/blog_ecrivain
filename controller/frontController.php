<?php

require_once('model/Postmanager.php');
require_once('model/Commentmanager.php');
require_once('model/Adminmanager.php');

/*Display front page (index.php)*/

function listPosts()
{
	$postManager = new \POO\model\Postmanager();
	$entry_db = $postManager->getPosts();

	require('view/frontend/listPostsView.php');
}

function post($id_post)
{
	$postManager = new \POO\model\Postmanager();
	$commentManager = new \POO\model\Commentmanager();

	$db2 = $postManager->getPost($id_post);
	$db1 = $commentManager->getComments($id_post);

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