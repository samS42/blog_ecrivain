<!-- Disconnection -->

<?php ob_start(); ?>

	<div class="title-front col-xs-12 col-md-offset-1 col-md-5">
		<h1 class="title-admin"><strong>Page d'administration</strong></h1>
	</div>

	<div id="width-button" class="buttons front col-xs-offset-2 col-xs-8 col-xs-offset-2 col-md-offset-3 col-md-3 pull-right info">
		<a href="<?= ROOT; ?>/index.php?action=index" class="btn btn-primary btn-block buttons-admin button">Retour au site</a>
		<a href="<?= ROOT; ?>/index.php?action=logout" class="btn btn-danger btn-block button">Déconnexion</a>
	</div>

<?php $header = ob_get_clean(); ?>

<!-- Display add post button -->

<?php ob_start(); ?>

	<div id="add-signal-post" class="form-group">
		<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
			<form class="button-admin-view" method="post" action="<?= ROOT; ?>/index.php?action=displayAddPost" >
				<button class="btn btn-primary btn-block btn-lg button" name="add">Ajouter un billet</button>
			</form>
		</div>

<!-- Display signaled comments button -->

		<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
			<form class="button-admin-view" method="post" action="<?= ROOT; ?>/index.php?action=displaySignalComment" >
				<input type="submit" name="signal" value="Commentaire(s) signalé(s)" class="btn btn-primary btn-block btn-lg btn button">
			</form>
		</div>
	</div>

<?php $form = ob_get_clean(); ?>

<!-- Get and Display titles from posts -->

<?php ob_start(); ?>

	<br>
	<div class="col-xs-12 col-md-offset-2 col-md-8 coll-md-offset-2">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h2 id="title-center">Mes billets</h2>
			</div>

			<?php
			foreach($titles AS $value)
			{
			?>
				<div class="list-group">
					<a href="<?= ROOT; ?>/index.php?action=adminPost&id=<?= $value->getId(); ?>" class="list-group-item"><?= $value->getTitle(); ?></a>
				</div>
			<?php 
			} ?>
		</div>
	</div>

<?php $content = ob_get_clean();

$comment = '';
$title_2 = '';
$title_page = '';
$title_post = '';

require('view/backend/backTemplate.php');
?>