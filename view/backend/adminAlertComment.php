<!-- Disconnection -->
<?php ob_start() ?>
<div class="col-md-offset-1 col-md-4">
<h1>Page d'administration</h1>
</div>
<div class="col-md-offset-5 col-md-2">

<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles" class="btn btn-info btn-block">Retour aux billets</a>
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-warning btn-block">Retour au site</a>
<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>

</div>
<?php $header = ob_get_clean() ?>

<?php $title_page = '<h2>Message(s) signalé(s)</h2>'; ?>

<?php ob_start(); ?>

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
	<div class="row col-md-offset-1">
		Auteur: <strong><?= $display['author'] ?></strong><br/>
		Commentaire: <?= $display['comment'] ?>
</p>
<p>

			<div class="pull-left">

				<!-- Nothing button -->
				<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deleteSignal&idComment=<?= $display['id'] ?>">
			<button class="btn btn-secondary btn-block" name="neRienFaire">Ne rien faire</button>
		</form>
		
		<!-- Delete comment button -->
		<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=adminDeleteComment&idComment=<?= $display['id'] ?>&id=<?= $display['post_id'] ?>">
			<button class="btn btn-danger btn-block" name="delete">Supprimer le commentaire</button>
		</form><br/>

		</div>
</p>
</div>
	<?php
		}
	}
$comment = ob_get_clean();

  $title_post = '';
  $content = '';
  $title_2 = '';
  $form = '';
	
require('backTemplate.php'); ?>

	