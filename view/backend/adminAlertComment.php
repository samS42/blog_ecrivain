<?php session_start(); ?>

<form method="post" action="view/backend/log.php">
	<input type="submit" name="logout" value="Déconnexion">
</form>

<a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a><br/>
<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles">Accueil page d'administration</a>

<h1>Message(s) signalé(s)</h1>

<p>
	<?php
	while($display = $displaySignalComment->fetch())
	{
	?>
	<p>
		Auteur: <?= $display['author'] ?><br/>
		Commentaire: <?= $display['comment'] ?>

		<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deleteComment&idComment=<?= $display['id'] ?>&id=<?= $display['post_id'] ?>">
			<input type="submit" name="delete" value="Supprimer le commentaire">
		</form>

Faire la création du bouton pour effacer le "OK" dans la db!

		<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deleteComment&idComment=<?= $display['id'] ?>&id=<?= $display['post_id'] ?>">
			<input type="submit" name="neRienFaire" value="Ne rien faire">
		</form>
	</p>
	<?php
	}
	?>
</p>

	