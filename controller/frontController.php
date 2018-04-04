<?php

require('model/vendor/autoload.php');

use Acme\PostManagerPDO;
use Acme\CommentManager;

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
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$db2 = $postManager->getPost($id_post);
	$db1 = $commentManager->getComments($id_post);

	require('view/frontend/post_view.php');
}

function addComment($id_post, $pseudo, $comment)
{
	$commentManager = new CommentManager();

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