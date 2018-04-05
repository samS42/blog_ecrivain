<!-- Disconnection -->

<?php ob_start() ?>

	<div class="title-front col-xs-12 col-md-offset-1 col-md-5">
		<h1 class="title-admin"><strong>Page d'administration</strong></h1>
	</div>

	<div id="width-button" class="buttons front col-xs-offset-2 col-xs-8 col-xs-offset-2 col-md-offset-3 col-md-3 pull-right info">
		<a href="<?= ROOT; ?>/index.php?action=displayTitles" class="btn btn-primary btn-block buttons-admin button">Retour aux billets</a>
		<a href="<?= ROOT; ?>/index.php?action=index" class="btn btn-primary btn-block button">Retour au site</a>
		<a href="<?= ROOT; ?>/index.php?action=logout" class="btn btn-danger btn-block button">Déconnexion</a>
	</div>

<?php $header = ob_get_clean() ?>

<?php ob_start(); ?>

	<br>
	<div class="col-xs-12 col-md-offset-2 col-md-8 coll-md-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2>Message(s) signalé(s)</h2>
			</div>
	
	<!-- Display signaled comments -->

			<?php
			foreach($comment as $value)
			{
			?>

				<div class="list-group">
					Auteur: <strong><?= $value->getAuthor(); ?></strong><br/>
					Commentaire: <?= $value->getComment(); ?>
				</div>

				<p>
				<div class="list-group">

				<!-- Nothing button -->
					<form method="post" action="<?= ROOT; ?>/index.php?action=deleteSignal&idComment=<?= $value->getId(); ?>">
						<button class="btn btn-primary btn-block button-publish" name="neRienFaire">Ne rien faire</button>
					</form>
				<!-- Delete comment button -->
					<form method="post" action="<?= ROOT; ?>/index.php?action=adminDeleteComment&idComment=<?= $value->getId(); ?>&id=<?= $value->getPostId(); ?>">
						<button class="btn btn-danger btn-block button-publish" name="delete">Supprimer le commentaire</button>
					</form>
				</div>
				</p>

			<?php
			}
			?>
			
		</div>
	</div>

<?php $comment = ob_get_clean();

$title_post = '';
$title_page = '';
$content = '';
$title_2 = '';
$form = '';
	
require('backTemplate.php'); ?>