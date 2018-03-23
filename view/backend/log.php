<?php
	session_start();

	/*Disconnection*/

	if(isset($_GET['logout']) AND is_numeric($_GET['logout']) AND $_GET['logout'] == 1)
	{
		session_destroy();
		
		header('Location: /tests/blog_mvc/tests/POO/index.php');
	}
	else
	{
		throw new Exception('Impossible de se déconnecter');
	}