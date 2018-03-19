<?php
ob_start();

	if(isset($_SESSION['pseudo']))
	{
		echo 'Bonjour ' . $_SESSION['pseudo'];
?>
		<a href="index.php?action=displayTitles">Page d'administration</a>
		<br/>
		<form method="post" action="view/backend/log.php">
			<input type="submit" name="logout" value="Déconnexion">
		</form>

		<a href="/tests/blog_mvc/tests/POO/index.php?action=listPosts">Accueil</a>
<?php
	}
	else
{
?>
		<!-- Display form for the connexion -->

		<form method="post" action="index.php?action=connexion&action2=displayTitles">
			<label>Identifiant: </label><input type="text" name="id" id="id">
			<label>Mots de passe: </label><input type="password" name="pass" id="pass">
			<input type="submit" name="envoyer"/>
		</form>
		<a href="/tests/blog_mvc/tests/POO/index.php?action=listPosts">Accueil</a>

<?php
}

	$form = ob_get_clean() ?>
<?php $title = 'Mon article' ?>

<?php ob_start(); ?>
<h1>Mon article</h1>
<p>
	<!-- Get data from post-->

 <?= $db2['title'] ?>				le: <?= $db2['date_creation'] ?><br/>
 <?= $db2['content'] ?>
</p>

	<h3>Les commentaires</h3>
	<p>
	<?php

	/*Get comments from post*/

	while($db3 = $db1->fetch())
	{ ?>
		 <?= $db3['author'] ?>				le: <?= $db3['comment_date'] ?><br/>
		 <?= $db3['comment'] ?> <a href="/tests/blog_mvc/tests/POO/index.php?action=signalComment&idComment=<?= $db3['id'] ?>&id=<?= $db2['id'] ?>">(Signaler)</a>
	</p> 
	<?php } ?>
	
	<p>
		<!-- comment add form -->

		<form method="POST" action="/tests/blog_mvc/tests/POO/index.php?action=addComment&id=<?= $db2['id'] ?>">
			<label>Pseudo</label><input type="text" name="pseudo" id="pseudo"><br>
			<label>Commentaire</label><input type="text" name="comment" id="comment"><br>
			<input type="submit"/>
		</form>
	</p>
	<?php $db1->closeCursor(); ?>

	<?php $content = ob_get_clean(); ?>
	<?php require('view/frontend/template.php'); ?>