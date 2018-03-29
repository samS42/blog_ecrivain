<!-- Disconnection -->
<?php ob_start() ?>
<div class="title-front col-xs-12 col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-5">
<h1 class="title-admin"><strong>Page d'administration</strong></h1>
</div>

<div id="width-button" class="buttons front col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-3 col-sm-4 col-md-offset-3 col-md-3 pull-right info">

<a href="/tests/blog_mvc/tests/POO/index.php?action=displayTitles" class="btn btn-primary btn-block buttons-admin">Retour aux billets</a>
<a href="/tests/blog_mvc/tests/POO/index.php" class="btn btn-primary btn-block">Retour au site</a>
<a href="view/backend/log.php?logout=1" class="btn btn-danger btn-block">Déconnexion</a>

</div>
<?php $header = ob_get_clean() ?>

	<!-- Modify post button -->
	
	<?php ob_start() ?>
	<div id="add-signal-post" class="form-group">

	<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-2 col-sm-3  col-md-offset-2 col-md-3">
	<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminUpdatePost.php?action=updatePost&id=<?= $display['id']; ?>&title=<?= $display['title'] ?>&content=<?= $display['content'] ?>">
		<input type="submit" name="update" value="Modifier le billet" class="btn btn-primary btn-block btn-lg">
	</form>
</div>

	<!-- Delete post button -->
			<div class="col-xs-offset-3 col-xs-6 col-xs-offset-3 col-sm-offset-2 col-sm-3 col-sm-offset-2  col-md-offset-2 col-md-3 col-md-offset-2">
	<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deletePost&idPost=<?= $display['id'] ?>">
		<button class="btn btn-danger btn-block btn-lg" name="delete">Supprimer le billet</button>
	</form>
</div>
	</div>

	<?php $form = ob_get_clean() ?>

	<!-- Display post -->
<?php ob_start(); ?>
<br/>
<div class="col-md-offset-2 col-md-8 coll-md-offset-2">
<div class="panel panel-info">
	<div id="panel-heading" class="panel-heading">
		<h2 id="title-center"><?= $display['title'] ?></h2>
		le: <strong><?= $display['date_creation'] ?></strong>
	</div>

<div class="list-group">
	<?= $display['content'] ?><?php $display['id']; ?>
</div>
</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php ob_start(); ?>

<div class="col-md-offset-2 col-md-8 coll-md-offset-2">
	<div class="panel panel-info">
	<div id="panel-heading" class="panel-heading">
<h3 id="title-center">Commentaires</h3>
</div>

<!-- Display comments -->

<?php

while ($comments = $displayComments->fetch())
{
?>
<div class="list-group">

	<h5><strong><?= $comments['author']; ?></strong></h5> 
	<p>a publié le: <?= $comments['comment_date']; ?></p>
	<p><?= $comments['comment']; ?></p>

	<a href="/tests/blog_mvc/tests/POO/index.php?action=deleteComment&idComment=<?= $comments['id'] ?>&id=<?= $comments['post_id'] ?>" >Supprimer le commentaire</a>
	</div>

<?php
} ?>
</div>
<?php
$comment = ob_get_clean();

$title_post = '';
$title_page = '';
$title_2 = '';

require('view/backend/backTemplate.php');
?>