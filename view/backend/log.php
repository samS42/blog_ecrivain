<?php
	session_start();

	if(isset($_POST['logout']))
	{
		session_destroy();
		
		header('Location: /tests/blog_mvc/tests/POO/index.php');
	}
?>