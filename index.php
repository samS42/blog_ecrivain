<?php

require('controller/controller.php');

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
		if(isset($_GET['id']) AND $_GET['id']>0)
		{
			if(!empty($_POST['pseudo']) AND !empty($_POST['comment']))
			{
				modifComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
			}
			else
			{
				throw new Exception('Toutes les données n\'ont pas été renseignées');
			}
		}
		else
		{
			throw new Exception('Le billet n\'est pas reconnu');
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
