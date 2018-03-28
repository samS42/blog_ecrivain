<?php
session_start();

require('controller/frontController.php');
require('controller/backController.php');

try{
if(isset($_GET['action']))
{

	/*Display post_view.php*/

	if ($_GET['action'] == 'post')
	{
		if(isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['id'] > 0)
		{
			post(htmlspecialchars($_GET['id']));
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
			$_GET['id'] = (int) $_GET['id'];

			if(!empty($_POST['pseudo']) AND !empty($_POST['comment']))
			{
				addComment(htmlspecialchars($_GET['id']), htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['comment']));
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

	elseif ($_GET['action'] == 'connexion' AND isset($_GET['action2']) AND $_GET['action2'] == 'displayTitles')
	{
		if(isset($_POST['id']) AND is_string($_POST['id']) AND isset($_POST['pass']) AND is_string($_POST['pass']))
		{
			connexionAdmin(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['pass']));
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
		if(isset($_GET['id']) AND $_GET['id']>0)
		{
			$_GET['id'] = (int) $_GET['id'];
			displayPost(htmlspecialchars($_GET['id']));
		}
		
	}

	/*Delete selected post*/

	elseif (isset($_GET['idPost']) AND $_GET['idPost']>0)
	{
		$_GET['idPost'] = (int) $_GET['idPost'];
		if ($_GET['action'] == 'deletePost')
		{
			deletePost(htmlspecialchars($_GET['idPost']));
		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Delete selected comment*/

	elseif ($_GET['action'] == 'deleteComment')
	{
		if(isset($_GET['idComment']) AND $_GET['idComment']>0 AND isset($_GET['id']) AND $_GET['id']>0)
		{
			$_GET['idComment'] = (int) $_GET['idComment'];
			$_GET['id'] = (int) $_GET['id'];
			deleteComment(htmlspecialchars($_GET['idComment']), htmlspecialchars($_GET['id']));
		}
		else
		{
			throw new Exception('Toutes les données n\'ont pas été renseignées');
		}
	}

	/*Delete signaled comment*/

	elseif ($_GET['action'] == 'adminDeleteComment')
	{
		if(isset($_GET['idComment']) AND $_GET['idComment']>0 AND isset($_GET['id']) AND $_GET['id']>0)
		{
			$_GET['idComment'] = (int) $_GET['idComment'];
			$_GET['id'] = (int) $_GET['id'];
			deleteCommentSignaled(htmlspecialchars($_GET['idComment']), htmlspecialchars($_GET['id']));
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
		if (isset($_GET['id']) AND $_GET['id']>0 AND isset($_POST['myTitle']) AND isset($_POST['myTextarea']))
		{
			$_GET['id'] = (int) $_GET['id'];
			updatePost(htmlspecialchars($_GET['id']), $_POST['myTitle'], $_POST['myTextarea']);
		}
		else
		{
			throw new Exception('Touts les champs n\'ont pas été renseignées');
		}
	}

	/*User signal comment*/

	elseif ($_GET['action'] == 'signalComment')
	{
		if(isset($_GET['idComment']) AND $_GET['idComment']>0 AND isset($_GET['id']) AND $_GET['id']>0)
		{
			$_GET['idComment'] = (int) $_GET['idComment'];
			$_GET['id'] = (int) $_GET['id'];
			signalComment(htmlspecialchars($_GET['idComment']), htmlspecialchars($_GET['id']));
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

	elseif ($_GET['action'] == 'deleteSignal')
	{
		if(isset($_GET['idComment']) AND $_GET['idComment']>0)
		{
			$_GET['idComment'] = (int) $_GET['idComment'];
			deleteSignalComment(htmlspecialchars($_GET['idComment']));
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
	if (isset($_GET['page']) AND  is_numeric($_GET['page']))
	{
			listPosts($_GET['page']);
	}
	else
	{
		listPosts();
	}
	
}

}
catch(Exception $e){

	 echo 'Erreur : ' . $e->getMessage();
}
