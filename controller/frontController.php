<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

/*Display front page (index.php)*/

function listPosts($page=1)
{
	$postManager = new \POO\model\PostManager();
		$pages = $postManager->getNumPosts();
	$entry_db = $postManager->getPosts($page);

	$perPage = $postManager::NB_POSTS;

	require('view/frontend/listPostsView.php');
}

function post($id_post)
{
	$postManager = new \POO\model\PostManager();
	$commentManager = new \POO\model\CommentManager();

	$db2 = $postManager->getPost($id_post);
	$db1 = $commentManager->getComments($id_post);

	require('view/frontend/post_view.php');
}

function addComment($id_post, $pseudo, $comment)
{
	$commentManager = new \POO\model\CommentManager();

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