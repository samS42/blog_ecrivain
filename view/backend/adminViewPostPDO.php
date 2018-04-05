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

<!-- Modify post button -->
	
<?php ob_start();

foreach ($post as $value)
{
	?>

	<div id="add-signal-post" class="form-group">
		<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
			<form method="post" action="<?= ROOT; ?>/index.php?action=displayUpdatePost&id=<?= $value->getId(); ?>">
				<input type="submit" name="update" value="Modifier le billet" class="btn btn-primary btn-block btn-lg button">
			</form>
		</div>

	<!-- Delete post button -->

		<div class="col-xs-12 col-md-offset-3 col-md-6 col-md-offset-3">
			<form method="post" action="index.php?action=deletePost&idPost=<?= $value->getId(); ?>">
				<button class="btn btn-danger btn-block btn-lg button" name="delete">Supprimer le billet</button>
			</form>
		</div>
	</div>

<?php $form = ob_get_clean() ?>

<!-- Display post -->

<?php ob_start(); ?>


	<br/>
		<div class="col-xs-12 col-md-offset-2 col-md-8 coll-md-offset-2">
			<div class="panel panel-info">
				<div id="panel-heading" class="panel-heading">
					<h2 id="title-center"><?= $value->getTitle(); ?></h2>
					le: <strong><?= $value->getDateCreation(); ?></strong>
				</div>

				<div class="list-group">
					<?= $value->getContent(); ?><?php $value->getId(); ?>
				</div>
			</div>
		</div>
<?php	
}
?>

<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>

	<div class="col-xs-12 col-md-offset-2 col-md-8 coll-md-offset-2">
		<div class="panel panel-info">
			<div id="panel-heading" class="panel-heading">
				<h3 id="title-center">Commentaires</h3>
			</div>

<!-- Display comments -->

			<?php
			foreach($comments as $newValue)
			{
			?>

				<div class="list-group">
					<h5><strong><?= $newValue->getAuthor(); ?></strong></h5> 
					<p>a publié le: <?= $newValue->getCommentDate(); ?></p>
					<p><?= $newValue->getComment(); ?></p>
					<a href="/index.php?action=deleteComment&idComment=<?= $newValue->getId(); ?>&id=<?= $newValue->getPostId(); ?>" >Supprimer le commentaire</a>
				</div>

			<?php
			}
			?>
		</div>
	</div>
	
<?php $comment = ob_get_clean();

$title_post = '';
$title_page = '';
$title_2 = '';

require('view/backend/backTemplate.php');
?>