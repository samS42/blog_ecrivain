<?php

require('controller/frontController.php');
require('controller/backController.php');

try{
if(isset($_GET['action']))
{
	/*Display listPostsView.php*/

	if($_GET['action'] == 'listPosts')
	{
		listPosts();
	}

	/*Display post_view.php*/

	elseif ($_GET['action'] == 'post')
	{
		if(isset($_GET['id']) AND $_GET['id'] > 0)
		{
			post($_GET['id']);
		}
		else
		{
			throw new Exception('Aucun identifiant de billet envoyé');
		}
	}

	/*add a comment*/

	elseif ($_GET['action'] == 'addComment')
	{
		if (isset($_GET['id']) AND $_GET['id']>0)
		{
			if(!empty($_POST['pseudo']) AND !empty($_POST['comment']))
			{
				addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
			}
			else
			{
				throw new Exception('Toutes les données n\'ont pas été renseignées');
			}
		}
		else
		{
			throw new Exception('Aucun identifiant de billet envoyé');
		}
	}

	/*Connexion admin's section*/

	elseif ($_GET['action'] == 'connexion' AND $_GET['action2'] == 'displayTitles')
	{
		if(isset($_POST['id']) AND isset($_POST['pass']))
		{
			connexionAdmin($_POST['id'], $_POST['pass']);

		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Display titles in admin's page*/

	elseif ($_GET['action'] == 'displayTitles')
	{
		listTitles();
	}

	/*Go to selected post in admin's page*/

	elseif ($_GET['action'] == 'adminPost')
	{
		if(isset($_GET['id']))
		{
			displayPost($_GET['id']);
		}
		
	}

	/*Delete selected post*/

	elseif (isset($_GET['idPost']))
	{
		if ($_GET['action'] == 'deletePost')
		{
			deletePost($_GET['idPost']);
		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Delete selected comment*/

	elseif ($_GET['action'] == 'deleteComment')
	{
		if(isset($_GET['idComment']) AND isset($_GET['id']))
		{
			deleteComment($_GET['idComment'], $_GET['id']);
		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Delete signaled comment*/

	elseif ($_GET['action'] == 'adminDeleteComment')
	{
		if(isset($_GET['idComment']) AND isset($_GET['id']))
		{
			deleteCommentSignaled($_GET['idComment'], $_GET['id']);
		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Add post*/

	elseif ($_GET['action'] == 'addPost')
	{
		if(!empty($_POST['myTitle']) AND !empty($_POST['myTextarea']))
		{
			addPost($_POST['myTitle'], $_POST['myTextarea']);
		}
		else
		{
			throw new Exception('Touts les champs n\'ont pas été renseignées');
		}
	}

	/*Update post*/

	elseif ($_GET['action'] == 'updatePost')
	{
		if (isset($_GET['id']) AND isset($_POST['myTitle']) AND isset($_POST['myTextarea']))
		{
			updatePost($_GET['id'], $_POST['myTitle'], $_POST['myTextarea']);
		}
		else
		{
			throw new Exception('Touts les champs n\'ont pas été renseignées');
		}
	}

	/*User signal comment*/

	elseif ($_GET['action'] == 'signalComment')
	{
		if(isset($_GET['idComment']) AND isset($_GET['id']))
		{
			signalComment($_GET['idComment'], $_GET['id']);
		}
		else
		{
			throw new Exception('Le signalement n\' pas été effectué');
		}
	}

	/*Display signaled comment*/

	elseif ($_GET['action'] == 'displaySignalComment')
	{
		displaySignalComment();
	}

	/*Signal deleted but the comment is still visible on the post*/

	elseif (isset($_GET['action']) AND $_GET['action'] == 'deleteSignal')
	{
		if(isset($_GET['idComment']))
		{
			deleteSignalComment($_GET['idComment']);
		}
		else
		{
			throw new Exception('Le signalement n\' pas été supprimé');
		}
	}
}
	
/*Comeback index.php*/

else
{
	listPosts();
}

}
catch(Exception $e){

	 echo 'Erreur : ' . $e->getMessage();
}
