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

	<!-- Modify post button -->
	
	<?php ob_start() ?>
	<div class="form-group">

	<div class="col-md-offset-2 col-md-3 col-md-offset-2">
	<form method="post" action="/tests/blog_mvc/tests/POO/view/backend/adminUpdatePost.php?action=updatePost&id=<?= $display['id']; ?>&title=<?= $display['title'] ?>&content=<?= $display['content'] ?>">
		<input type="submit" name="update" value="Modifier le billet" class="btn btn-success btn-block btn-lg">
	</form>
</div>

	<!-- Delete post button -->
			<div class="col-md-offset-2 col-md-3">
	<form method="post" action="/tests/blog_mvc/tests/POO/index.php?action=deletePost&idPost=<?= $display['id'] ?>">
		<button class="btn btn-danger btn-block btn-lg" name="delete">Supprimer le billet</button>
	</form>
</div>
	</div>

	<?php $form = ob_get_clean() ?>

	<!-- Display post -->
<?php ob_start(); ?>


	<h2><?= $display['title'] ?></h2>
	le: <strong><?= $display['date_creation'] ?></strong><br/>
<p>	
	<?= $display['content'] ?><?php $display['id']; ?>
</p>

<?php $content = ob_get_clean(); ?>

<?php $title_2 = '<h3>Commentaires</h3>' ?>

<!-- Display comments -->

<?php ob_start();

while ($comments = $displayComments->fetch())
{
?>


	<h5><strong><?= $comments['author']; ?></strong></h5> 
	<p>a publié le: <?= $comments['comment_date']; ?></p>
	<p><?= $comments['comment']; ?></p>

	<a href="/tests/blog_mvc/tests/POO/index.php?action=deleteComment&idComment=<?= $comments['id'] ?>&id=<?= $comments['post_id'] ?>" >Supprimer le commentaire</a>

<?php
}
$comment = ob_get_clean();

$title_post = '';
$title_page = '';

require('view/backend/backTemplate.php');
?>