<?php

require('model/vendor/autoload.php');

use JeanForteroche\PostManagerPDO;
use JeanForteroche\CommentManagerPDO;

/*Come back to the home page*/
function index()
{
	require('view/frontend/homePage.php');
}

/*Display front page (index.php)*/
function listPosts($page=1)
{
	/*$postManager = new PostManager();*/
	$postManager = new PostManagerPDO();
	$total_posts = $postManager->getNumPosts();
	$perPage = $postManager::NB_POSTS;
	$nb_pages = ceil($total_posts / $perPage);
	/*$entry_db = $postManager->getPosts($page);*/
	$listPosts = $postManager->getPosts($page);

	/*require('view/frontend/listPostsView.php');*/
	require('view/frontend/listPostsViewPDO.php');
}

function post($id_post)
{
	$postManager = new PostManagerPDO();
	$commentManager = new CommentManagerPDO();

	$db2 = $postManager->getPost($id_post);
	$listComments = $commentManager->getComments($id_post);

	require('view/frontend/postViewPDO.php');
}

function addComment($id_post, $pseudo, $comment)
{
	$commentManager = new CommentManagerPDO();

	$dbComm = $commentManager->comment($id_post, $pseudo, $comment);

	if($dbComm == false)
	{
		throw new Exception('Impossible d\'ajouter le commentaire');
	}
	else
	{
		header('Location: index.php?action=post&id=' . $_GET['id']);
	}
}