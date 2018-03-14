<?php

require('controller/frontController.php');
require('controller/backController.php');

try{
if(isset($_GET['action']))
{
	if($_GET['action'] == 'listPosts')
	{
		listPosts();
	}

	elseif ($_GET['action'] == 'post')
	{
		if(isset($_GET['id']) AND $_GET['id'] > 0)
		{
			post();
		}
		else
		{
			throw new Exception('Aucun identifiant de billet envoyé');
		}
	}
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
	elseif ($_GET['action'] == 'modifyComment')
	{
		if(isset($_GET['idCom']) AND $_GET['idCom']>0 AND isset($_GET['idPost']) AND $_GET['idPost']>0)
		{
			if(!empty($_POST['pseudo1']) AND !empty($_POST['comment1']))
			{
				modifComment($_GET['idCom'], $_GET['idPost'], $_POST['pseudo1'], $_POST['comment1']);
			}
			else
			{
				throw new Exception('Toutes les données n\'ont pas été renseignées');
			}
		}
		else
		{
			throw new Exception('Le billet ou le commentaire n\'est pas reconnu');
		}
	}

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

	elseif ($_GET['action'] == 'displayTitles') {
		listTitles();
	}

	elseif (isset($_GET['action']) AND $_GET['action'] == 'adminPost')
	{
		if(isset($_GET['id']))
		{
			displayPost($_GET['id']);
		}
		
	}
}
	
else
{
	listPosts();
}

}
catch(Exception $e){

	 echo 'Erreur : ' . $e->getMessage();
}
