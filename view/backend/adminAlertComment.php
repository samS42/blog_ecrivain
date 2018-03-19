<!-- Disconnection -->

<form method="post" action="view/backend/log.php">
	<input type="submit" name="logout" value="Déconnexion">
</form>

<a href="/tests/blog_mvc/tests/POO/index.php">Retour au site</a><br/>
<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles">Accueil page d'administration</a>

<h1>Message(s) signalé(s)</h1>

<p>
	<?php

	/*Display signaled comments*/

	while($display = $displaySignalComment->fetch())
	{
		if(empty($display['author']))
		{
	?>
		Aucun commentaire n'a été signalé.
	<?php
		}
		else
		{
	?>
		Auteur: <?= $display['author'] ?><br/>
		Commentaire: <?= $display['comment'] ?>
		

		<!-- Delete comment button -->

		<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=adminDeleteComment&idComment=<?= $display['id'] ?>&id=<?= $display['post_id'] ?>">
			<input type="submit" name="delete" value="Supprimer le commentaire">
		</form>

		<!-- Nothing button -->

		<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deleteSignal&idComment=<?= $display['id'] ?>">
			<input type="submit" name="neRienFaire" value="Ne rien faire">
		</form>
	<?php
		}
	}
	?>
</p>

	